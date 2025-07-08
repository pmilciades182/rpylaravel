<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use App\Services\FirebaseService;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    private $firebaseService;
    
    public function __construct(FirebaseService $firebaseService)
    {
        $this->firebaseService = $firebaseService;
    }
    
    public function index()
    {
        try {
            $documents = $this->firebaseService->getAllDocuments('recetas');
            $recetas = [];
            
            foreach ($documents as $document) {
                if ($document->exists()) {
                    $data = $document->data();
                    $data['id'] = $document->id();
                    $recetas[] = new Receta($data);
                }
            }
            
            return view('recetas.index', compact('recetas'));
        } catch (\Exception $e) {
            return back()->with('error', 'Error al cargar las recetas: ' . $e->getMessage());
        }
    }
    
    public function create()
    {
        return view('recetas.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ingredientes' => 'required|array',
            'instrucciones' => 'required|string',
            'tiempo_preparacion' => 'required|string',
            'dificultad' => 'required|in:Fácil,Intermedio,Difícil',
            'categoria' => 'required|string'
        ]);
        
        try {
            $receta = new Receta([
                'nombre' => $request->nombre,
                'ingredientes' => array_filter($request->ingredientes),
                'instrucciones' => $request->instrucciones,
                'tiempo_preparacion' => $request->tiempo_preparacion,
                'dificultad' => $request->dificultad,
                'categoria' => $request->categoria,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ]);
            
            $this->firebaseService->createDocument('recetas', $receta->toArray());
            
            return redirect()->route('recetas.index')->with('success', 'Receta creada exitosamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al crear la receta: ' . $e->getMessage());
        }
    }
    
    public function show($id)
    {
        try {
            $document = $this->firebaseService->getDocument('recetas', $id);
            
            if (!$document->exists()) {
                return redirect()->route('recetas.index')->with('error', 'Receta no encontrada');
            }
            
            $data = $document->data();
            $data['id'] = $document->id();
            $receta = new Receta($data);
            
            return view('recetas.show', compact('receta'));
        } catch (\Exception $e) {
            return back()->with('error', 'Error al cargar la receta: ' . $e->getMessage());
        }
    }
    
    public function edit($id)
    {
        try {
            $document = $this->firebaseService->getDocument('recetas', $id);
            
            if (!$document->exists()) {
                return redirect()->route('recetas.index')->with('error', 'Receta no encontrada');
            }
            
            $data = $document->data();
            $data['id'] = $document->id();
            $receta = new Receta($data);
            
            return view('recetas.edit', compact('receta'));
        } catch (\Exception $e) {
            return back()->with('error', 'Error al cargar la receta: ' . $e->getMessage());
        }
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ingredientes' => 'required|array',
            'instrucciones' => 'required|string',
            'tiempo_preparacion' => 'required|string',
            'dificultad' => 'required|in:Fácil,Intermedio,Difícil',
            'categoria' => 'required|string'
        ]);
        
        try {
            $data = [
                'nombre' => $request->nombre,
                'ingredientes' => array_filter($request->ingredientes),
                'instrucciones' => $request->instrucciones,
                'tiempo_preparacion' => $request->tiempo_preparacion,
                'dificultad' => $request->dificultad,
                'categoria' => $request->categoria,
                'updated_at' => now()->toDateTimeString()
            ];
            
            $this->firebaseService->updateDocument('recetas', $id, $data);
            
            return redirect()->route('recetas.index')->with('success', 'Receta actualizada exitosamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al actualizar la receta: ' . $e->getMessage());
        }
    }
    
    public function destroy($id)
    {
        try {
            $this->firebaseService->deleteDocument('recetas', $id);
            return redirect()->route('recetas.index')->with('success', 'Receta eliminada exitosamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al eliminar la receta: ' . $e->getMessage());
        }
    }
}