<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function reporteRetiros()
    {
        $reporte = Usuario::select(
                'usuarios.nombre',
                DB::raw('COUNT(retiros.id) as total_retiros'),
                DB::raw('AVG(retiros.monto) as promedio_retiros'),
                DB::raw('SUM(retiros.monto) as suma_retiros'),
                DB::raw('MAX(retiros.fecha_retiro) as ultimo_retiro')
            )
            ->join('retiros', 'usuarios.id', '=', 'retiros.usuario_id')
            ->groupBy('usuarios.nombre')
            ->get();

        // 👇 Se retorna la vista y no JSON
        return view('reportes.retiros', compact('reporte'));
    }
}
