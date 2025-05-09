<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Throwable;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $subcategories = SubCategory::where('status', true)
        ->orderBy('order', 'asc')
        ->get();

        return view('pages.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::where('status', true)->get();
        return view('pages.subcategories.save')
            ->with('categories', $categories)
            ->with('subcategory', new SubCategory());
    }

    public function edit($id)
    {
        $subcategory = SubCategory::find($id);
        $categories = Category::where('status', true)->get();
        return view('pages.subcategories.save')
            ->with('categories', $categories)
            ->with('subcategory', $subcategory);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request)
    {   
       
        $body = $request->all();
        $body['slug'] = strtolower(str_replace(' ', '-', $request->name));
        $body['destacar'] = isset($request->destacar);
        $body['order'] = $request->order;

        if ($request->hasFile("imagen")) {

            $manager = new ImageManager(Driver::class);

            $nombreImagen = Str::random(10) . '_' . $request->file('imagen')->getClientOriginalName();

            $img =  $manager->read($request->file('imagen'));

            // Obtener las dimensiones de la imagen que se esta subiendo
            // $img->coverDown(640, 640, 'center');

            $ruta = 'storage/images/subcategories/';

            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true); // Se crea la ruta con permisos de lectura, escritura y ejecución
            }

            $img->save($ruta . $nombreImagen);

            $body['url_image'] = $ruta;
            $body['name_image'] = $nombreImagen;
          
        }

        $jpa = SubCategory::find($request->id);
        if (!$jpa) {
            $body['status'] = true;
            SubCategory::create($body);
        } else {
            $jpa->update($body);
        }

        return redirect()->route('subcategories.index')->with('success', 'Categoria guardara');
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $category = SubCategory::findOrfail($id);

        $category->status = false;

        $category->save();

        return response()->json(['message' => 'Categoría eliminada']);
    }



    public function update(Request $request)
    {
        $body = $request->all();
        try {
            if ($request->field == 'destacar') {
                $countDestacados = SubCategory::where('destacar', true)->count();
                if ($countDestacados >= 10000) {
                    return response([
                        'status' => 409,
                        'message' => 'Solo puedes destacar 10000 categorias'
                    ], 409);
                }
            }

            unset($body['_token']);
            unset($body['field']);

            $jpa = SubCategory::find($request->id);
            $jpa->update($body);

            return response([
                'status' => 200,
                'message' => 'Categoría modificada'
            ]);
        } catch (Throwable $th) {
            return response([
                'status' => 400,
                'message' => $th->getMessage()
            ], 400);
        }
        $countDestacados = SubCategory::where('destacar', true)->count();

        if ($countDestacados >= 10000) {
            return response([
                'status' => 409,
                'message' => 'Solo puedes destacar 10000 categorias'
            ], 409);
        }


        $id = $request->id;

        $field = $request->field;

        $status = $request->status;

        // Actualizar el estado de la categoría
        $category = SubCategory::findOrFail($id);

        $category->$field = $status;

        $category->save();

        $cantidad = $this->contarCategoriasDestacadas();


        return response()->json(['message' => 'Categoría modificada',  'cantidad' => $cantidad]);
    }
}
