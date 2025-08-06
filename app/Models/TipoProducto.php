<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TipoProducto extends Model
{
    use HasFactory;
    
    /**
     * Nombre de la tabla en la base de datos
     */
    protected $table = 'tipos_productos';
    
    /**
     * Los atributos que se pueden asignar masivamente
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen',
    ];
    
    /**
     * Relación uno a muchos con Producto
     */
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
    
    /**
     * Accessor para obtener la URL completa de la imagen
     */
    public function getImagenUrlAttribute()
    {
        if ($this->imagen) {
            return Storage::url($this->imagen);
        }
        return null;
    }
    
    /**
     * Obtiene la ruta específica para ver productos de esta categoría
     */
    public function getRouteName()
    {
        $nombreLower = strtolower($this->nombre);
        
        if (str_contains($nombreLower, 'helado')) {
            return 'admin.productos.helados';
        } elseif (str_contains($nombreLower, 'malteada')) {
            return 'admin.productos.malteadas';
        } elseif (str_contains($nombreLower, 'paleta')) {
            return 'admin.productos.paletas';
        }
        
        // Fallback a la ruta genérica con ID
        return 'admin.productos.index';
    }
    
    /**
     * Eliminar imagen del storage cuando se elimina el registro
     */
    public function delete()
    {
        // Eliminar imagen si existe
        if ($this->imagen && Storage::disk('public')->exists($this->imagen)) {
            Storage::disk('public')->delete($this->imagen);
        }
        
        return parent::delete();
    }
}