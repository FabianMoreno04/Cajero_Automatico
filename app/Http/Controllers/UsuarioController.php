<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

     /**
     * Mostrar el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'codigo'         => 'required|string|max:255|unique:usuarios,codigo',
        'nombre'         => 'required|string|max:255',
        'apellido'       => 'required|string|max:255',
        'saldo_bancario' => 'required|numeric|min:0',
    ]);

    Usuario::create([
        'codigo'         => $request->codigo,
        'nombre'         => $request->nombre,
        'apellido'       => $request->apellido,
        'saldo_bancario' => $request->saldo_bancario,
    ]);

    return redirect()
        ->route('usuarios.index')
        ->with('success', 'Usuario creado correctamente');
    }  

    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }
    
    /**
     * Actualizar un usuario existente en la base de datos.
     * Se valida la información antes de guardar los cambios.
     */
    public function update(Request $request, Usuario $usuario)
    {
    $request->validate([
        'nombre'         => 'required|string|max:255',
        'apellido'       => 'required|string|max:255',
        'saldo_bancario' => 'required|numeric|min:0',
    ]);

    $usuario->update([
        'nombre'         => $request->nombre,
        'apellido'       => $request->apellido,
        'saldo_bancario' => $request->saldo_bancario,
    ]);

    return redirect()
        ->route('usuarios.index')
        ->with('success', 'Usuario actualizado exitosamente');
    }

      /**
     * Eliminar un usuario de la base de datos.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete(); // Eliminar el usuario
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente');
    }

    public function show($id)
    {
        $usuario = Usuario::with('retiros')->findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }
}
