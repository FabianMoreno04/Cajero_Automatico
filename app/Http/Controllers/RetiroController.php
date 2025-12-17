<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Retiro;
use Carbon\Carbon;

class RetiroController extends Controller
{
    /**
     * 1️⃣ Mostrar lista de usuarios para seleccionar
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('retiros.usuarios', compact('usuarios'));
    }

    /**
     * 2️⃣ Mostrar formulario de retiro del usuario seleccionado
     */
    public function create($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('retiros.create', compact('usuario'));
    }

    /**
     * 3️⃣ Guardar retiro
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'monto' => 'required|numeric|min:1000|max:2000000',
        ]);

        $usuario = Usuario::findOrFail($request->usuario_id);

        // Validar saldo disponible
        if ($request->monto > $usuario->saldo_bancario) {
            return back()->withErrors([
                'monto' => 'Saldo insuficiente para realizar el retiro'
            ])->withInput();
        }

        // Registrar retiro
        Retiro::create([
            'usuario_id' => $usuario->id,
            'monto' => $request->monto,
            'fecha_retiro' => Carbon::now(),
        ]);

        // Actualizar saldo del usuario
        $usuario->saldo_bancario -= $request->monto;
        $usuario->save();

        // Redirigir con mensaje de éxito
        return redirect()
            ->route('retiros.index')
            ->with('success', 'Retiro realizado con éxito');
    }
}
