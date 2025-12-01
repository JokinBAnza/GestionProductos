<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoProveedor extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['producto_id', 'proveedor_id'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
}
