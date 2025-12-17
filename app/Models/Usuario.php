<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'codigo',
        'nombre',
        'apellido',
        'saldo_bancario'
    ];

    // 👇 Alias para usar $usuario->saldo
    public function getSaldoAttribute()
    {
        return $this->saldo_bancario;
    }

    // Relación con retiros
    public function retiros()
    {
        return $this->hasMany(Retiro::class, 'usuario_id');
    }
}
