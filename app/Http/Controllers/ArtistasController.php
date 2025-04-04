<?php

namespace App\Http\Controllers;

use App\Models\artistas;
use App\Models\eventos;
use Illuminate\Http\Request;

class ArtistasController extends Controller
{



    
    public function index()
    {
        $artistas = artistas::all();
        return view('artistas.index', compact('artistas'));
    }

    public function toggleStatus(Request $request, $id)
    {
        $artistas = artistas::find($id);
        $artistas->estado = $artistas->estado == 'Activo' ? 'Inactivo' : 'Activo';
        $artistas->save();
        return redirect()->route('artistas.index');
    }
    public function active() 
    {
        $artistas = artistas::where('estado', 'Activo')->get();
        return view('artistas.active', compact('artistas'));
    }
   
    /**
     * Display a listing of the resource.
     */
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        $eventos = eventos::all(); // Obtener todos los eventos
        return view('artistas.create', compact('eventos')); // Pasar los eventos a la vista
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { // Validar los datos del formulario
        $request->validate([
            'idevento' => 'required|exists:eventos,id',
            'nidentidad' => 'required|string|max:50',
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'telefono' => 'required|string|max:20',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'descripcion' => 'nullable|string|max:2000',
            'fecharegistro' => 'required|date',
            'estado' => 'required|string|max:45',
        ]);
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('artistas', 'public');
        } else {
            $fotoPath = null;
        }

        // Crear el nuevo artista con la relación al evento
        $artista = artistas::create([
            'idevento' => $request->idevento,
            'nidentidad' => $request->nidentidad,
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'foto' => $fotoPath,
            'descripcion' => $request->descripcion,
            'fecharegistro' => $request->fecharegistro,
            'estado' => $request->estado,
        ]);

        // Redirigir o enviar una respuesta
        return redirect()->route('artistas.create')->with('success', 'Artista creado correctamente.');
}

    
    /**
     * Display the specified resource.
     */
    public function show(artistas $artistas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(artistas $artistas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, artistas $artistas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(artistas $artistas)
    {
        //
    }
}
