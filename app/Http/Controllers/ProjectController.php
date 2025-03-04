<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Project;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = Project::all();

        return view('pages.project.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function saveImg($file, $route, $nombreImagen)
    {
        $manager = new ImageManager(new Driver());
        $img =  $manager->read($file);


        if (!file_exists($route)) {
        mkdir($route, 0777, true); // Se crea la ruta con permisos de lectura, escritura y ejecución
        }

        $img->save($route . $nombreImagen);
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
          ]);
      
         
          try {
            $project = new Project();

            $project->titulo = $request->titulo;
            $project->descripcion = $request->descripcion;
            $project->steps = $request->steps;

            if ($request->hasFile("imagen")) {
              $file = $request->file('imagen');
              $routeImg = 'storage/images/project/';
              $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();
      
              $this->saveImg($file, $routeImg, $nombreImagen);
      
              $project->imagen = $routeImg . $nombreImagen;
            }

            $project->save();
          
            if ($request->has('ingredients')) {
                foreach ($request->ingredients as $ingredientData) {
                    $ingredient = new Ingredient();
                    $ingredient->project_id = $project->id; // Asociar al proyecto
                    $ingredient->titulo = $ingredientData['titulo'];
    
                    // Guardar la imagen si se proporciona
                    if (isset($ingredientData['imagen']) && $ingredientData['imagen']->isValid()) {
                        $file = $ingredientData['imagen'];
                        $routeImg = 'storage/images/ingredients/';
                        $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();
    
                        $this->saveImg($file, $routeImg, $nombreImagen);
    
                        $ingredient->imagen = $routeImg . $nombreImagen;
                    }
    
                    $ingredient->save();
                }
            }
      
            return redirect()->route('project.index')->with('success', 'Receta creada exitosamente.');
          } catch (\Throwable $th) {
            return response()->json(['messge' => 'Verifique sus datos '], 400);
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::with('ingredients')->find($id);

        return view('pages.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $request->validate([
                'titulo' => 'required',
            ]);
              
            try {
                  $project = Project::find($id); 
                   
                  if ($request->hasFile("imagen")) {
                      $file = $request->file('imagen');
                      $routeImg = 'storage/images/project/';
                      $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();
      
                      $this->saveImg($file, $routeImg, $nombreImagen);
          
                      $project->imagen = $routeImg.$nombreImagen;
                      // $aboutUs->name_image = $nombreImagen;
                  }
          
                  $project->titulo = $request->titulo;
                  $project->descripcion = $request->descripcion;
                  $project->steps = $request->steps;
                  $project->save();
                
                
                  // Actualizar o crear ingredientes
                if ($request->has('ingredients')) {
                    
                    $existingIngredients = Ingredient::where('project_id', $project->id)->get();
                    $ingredientIdsInRequest = collect($request->ingredients)->pluck('id')->filter()->toArray();

                    // Recorrer los ingredientes existentes
                    foreach ($existingIngredients as $existingIngredient) {
                        // Si el ingrediente no está en el request, eliminarlo
                        if (!in_array($existingIngredient->id, $ingredientIdsInRequest)) {
                            // Eliminar la imagen si existe
                            if ($existingIngredient->imagen && file_exists(public_path($existingIngredient->imagen))) {
                                unlink(public_path($existingIngredient->imagen));
                            }
                            // Eliminar el ingrediente de la base de datos
                            $existingIngredient->delete();
                        }
                    }

                    foreach ($request->ingredients as $ingredientData) {
                        // Si el índice es numérico, es un ingrediente existente
                        if (isset($ingredientData['id']) && $ingredientData['id']) {
                            $ingredient = Ingredient::find($ingredientData['id']);
                            if (!$ingredient) {
                                continue; // Si no existe, saltar
                            }
                        } else {
                            // Si no es numérico, es un nuevo ingrediente
                            $ingredient = new Ingredient();
                            $ingredient->project_id = $project->id;
                        }
                        
                        $ingredient->titulo = $ingredientData['titulo'];

                        if (isset($ingredientData['imagen']) && $ingredientData['imagen']->isValid()) {

                            if ($ingredient->imagen && file_exists(public_path($ingredient->imagen))) {
                                unlink(public_path($ingredient->imagen));
                            }

                            $file = $ingredientData['imagen'];
                            $routeImg = 'storage/images/ingredients/';
                            $nombreImagen = Str::random(10) . '_' . $file->getClientOriginalName();
                            $this->saveImg($file, $routeImg, $nombreImagen);
                            $ingredient->imagen = $routeImg . $nombreImagen;
                        }

                        $ingredient->save();
                    }
                }

                return redirect()->route('project.index')->with('success', 'Receta actualizada exitosamente.');

            } catch (\Throwable $th) {
                  return response()->json(['messge' => 'Verifique sus datos '], 400); 
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }

    public function borrar(Request $request)
    {
      $project = Project::find($request->id);
  
          
          if ($project->imagen && file_exists($project->imagen)) {
              unlink($project->imagen);
          }
  
          $project->delete();
          return response()->json(['message'=>'Receta eliminada']);
    }
  
    public function updateVisible(Request $request)
    {
      
      $id = $request->id;
      $stauts = $request->status;
      $staff = Project::find($id);
      $staff->status = $stauts;
  
      $staff->save();
      return response()->json(['message' => 'Receta actualizada']);
    }
}
