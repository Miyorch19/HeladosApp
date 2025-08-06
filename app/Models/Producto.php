<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'imagen',
        'tipo_producto_id',
    ];

    protected $casts = [
        'precio' => 'decimal:2',
    ];

    public function tipoProducto()
    {
        return $this->belongsTo(TipoProducto::class);
    }

    public function getImagenUrlAttribute()
    {
        if ($this->imagen) {
            return Storage::url($this->imagen);
        }
        return null;
    }

    public function getPrecioFormateadoAttribute()
    {
        return '$' . number_format($this->precio, 2);
    }

    public function delete()
    {
        if ($this->imagen && Storage::exists($this->imagen)) {
            Storage::delete($this->imagen);
        }
        return parent::delete();
    }
}