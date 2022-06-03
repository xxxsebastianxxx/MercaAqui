<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ventas;

class producto extends Model
{
    // use HasFactory;
    public function Productoventa()
    {
        return $this->belongsToMany(ventas::class);
    }
}
