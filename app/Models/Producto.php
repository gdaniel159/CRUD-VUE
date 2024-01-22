<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = array(
        'nombre',
        'precio',
        'id_categoria',
    );
    protected $primaryKey = 'id';
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, "id_categoria");
    }
}
