<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'idCategoria',
        'nombre',
        'precio',
        'cantidadStock',
    ];

    public function category()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }
    public function proveedores()
{
    return $this->belongsToMany(Proveedor::class, 'producto_proveedors');
}
}
