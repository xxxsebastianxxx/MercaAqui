<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\producto;

class ventas extends Model
{
    // use HasFactory;
    public function ventaProducto()
    {
        return $this->belongsToMany(producto::class);
    }
}
