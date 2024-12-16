<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::where("status", "=", true)
        ->orderByDesc('created_at')
        ->get();

        return view('pages.categories.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        return view('pages.categories.save', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, $id)
    {
        $category = Category::findOrfail($id);

        return view('pages.categories.save', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
      
        $body = $request->all();

        if ($request->hasFile("imagen")) {

            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
        
            // Generar un nombre único para el archivo
            $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();
            $ruta = 'storage/images/categories/';
        
            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true); // Crear con permisos de lectura, escritura y ejecución
            }
        
            // Verificar la extensión del archivo
            if ($extension === 'svg') {
                $file->move($ruta, $nombreImagen);
            } else {
                // Manejar las imágenes rasterizadas (JPEG, PNG, etc.)
                $manager = new ImageManager(Driver::class);
                $img = $manager->read($file);
                $img->save($ruta . $nombreImagen);
            }
        
            // Guardar información del archivo en el cuerpo de la solicitud
            $body['url_image'] = $ruta;
            $body['name_image'] = $nombreImagen;
        }

        if ($request->hasFile("img_talla")) {

            $manager = new ImageManager(Driver::class);

            $nombreImagen = Str::random(10) . '_' . $request->file('img_talla')->getClientOriginalName();

            $img =  $manager->read($request->file('img_talla'));

            // Obtener las dimensiones de la imagen que se esta subiendo
            // $img->coverDown(640, 640, 'center');

            $ruta = 'storage/images/categories/';

            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true); // Se crea la ruta con permisos de lectura, escritura y ejecución
            }

            $img->save($ruta . $nombreImagen);

            $body['img_talla'] = $ruta . $nombreImagen;
            
        }

        $slug = strtolower(str_replace(' ', '-', $request->name));

        if (Category::where('slug', $slug)->exists()) {
            // Si el slug existe, agregar un número aleatorio al final
            $slug .= '-' . rand(1, 1000); // Puedes ajustar el rango según tu necesidad
        }

        $jpa = Category::find($request->id);
        if (!$jpa) {
            $body['status'] = true;
            Category::create($body);
        } else {
            $jpa->update($body);
        }

        return redirect()->route('categorias.index')->with('success', 'Categoria creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrfail($id);

        if ($request->hasFile("imagen")) {
            $file = $request->file('imagen');
            $mimeType = $file->getMimeType();
            $rutanueva = 'storage/images/categories/';
            $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();
        
            // Crear el directorio si no existe
            if (!file_exists($rutanueva)) {
                mkdir($rutanueva, 0777, true);
            }
        
            // Verificar si es SVG
            if ($mimeType === 'image/svg+xml') {
                // Si es SVG, copiar directamente
                $file->move($rutanueva, $nombreImagen);
            } else {
                // Si no es SVG, procesar con ImageManager
                $manager = new ImageManager(new Driver());
        
                // Eliminar la imagen antigua si existe
                $rutaAntigua = storage_path() . '/app/public/images/categories/' . $category->name_image;
                if (File::exists($rutaAntigua)) {
                    File::delete($rutaAntigua);
                }
        
                // Leer y guardar la nueva imagen
                $img = $manager->read($file);
                $img->save($rutanueva . $nombreImagen);
            }
        
            // Actualizar los campos en el modelo
            $category->url_image = $rutanueva;
            $category->name_image = $nombreImagen;
        }

        $slug = strtolower(str_replace(' ', '-', $request->name));

        if (Category::where('slug', $slug)->exists()) {
            // Si el slug existe, agregar un número aleatorio al final
            $slug .= '-' . rand(1, 1000); // Puedes ajustar el rango según tu necesidad
        }


        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = $slug;

        $category->save();

        return redirect()->route('categorias.index')->with('success', 'Categoria modificada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }


    public function deleteCategory(Request $request)
    {
        $id = $request->id;

        $category = Category::findOrfail($id);

        $category->status = false;

        $category->save();

        return response()->json(['message' => 'Categoría eliminada']);
    }



    public function updateVisible(Request $request)
    {
        // Lógica para manejar la solicitud AJAX
        $cantidad = $this->contarCategoriasDestacadas();


        if ($cantidad >= 4 && $request->status == 1) {
            return response()->json(['message' => 'Solo puedes destacar 4 categorias'], 409);
        }


        $id = $request->id;

        $field = $request->field;

        $status = $request->status;

        // Actualizar el estado de la categoría
        $category = Category::findOrFail($id);

        $category->$field = $status;

        $category->save();

        $cantidad = $this->contarCategoriasDestacadas();


        return response()->json(['message' => 'Categoría modificada',  'cantidad' => $cantidad]);
    }


    public function contarCategoriasDestacadas()
    {

        $cantidad = Category::where('destacar', '=', 1)->count();

        return  $cantidad;
    }
}
