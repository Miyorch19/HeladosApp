<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TipoProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TipoProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', TipoProducto::class);
        
        $tiposProductos = TipoProducto::withCount('productos')->paginate(12);
        
        return view('admin.productos.productos', compact('tiposProductos'));
    }

    /**
     * Show the form for creating a new resource.
     * Ya no necesitamos este método porque usamos modales
     */
    public function create()
    {
        $this->authorize('create', TipoProducto::class);
        
        // Redirigir a la vista principal si alguien intenta acceder directamente
        return redirect()->route('admin.tipos-productos.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', TipoProducto::class);
        
        try {
            $validated = $request->validate([
                'nombre' => 'required|string|max:255|unique:tipos_productos,nombre',
                'descripcion' => 'nullable|string|max:1000',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $tipoProducto = new TipoProducto($validated);

            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $nombreImagen = Str::slug($validated['nombre']) . '_' . time() . '.' . $imagen->getClientOriginalExtension();
                $rutaImagen = $imagen->storeAs('tipos-productos', $nombreImagen, 'public');
                $tipoProducto->imagen = $rutaImagen;
            }

            $tipoProducto->save();

            return redirect()->route('admin.productos.productos')
                            ->with('success', 'Categoría creada exitosamente.');
                            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('admin.productos.productos')
                           ->withErrors($e->validator)
                           ->withInput()
                           ->with('error', 'Error al crear la categoría. Verifica los datos.');
        } catch (\Exception $e) {
            return redirect()->route('admin.productos.productos')
                           ->with('error', 'Error inesperado al crear la categoría.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoProducto $tipoProducto)
    {
        $this->authorize('view', $tipoProducto);
        
        $productos = $tipoProducto->productos()->paginate(12);
        
        // Como no tenemos vista show, redirigir a productos de esa categoría
        return redirect()->route('admin.productos.productos', ['tipo_producto_id' => $tipoProducto->id]);
    }

    /**
     * Show the form for editing the specified resource.
     * Ya no necesitamos este método porque usamos modales
     */
    public function edit(TipoProducto $tipoProducto)
    {
        $this->authorize('update', $tipoProducto);
        
        // Redirigir a la vista principal si alguien intenta acceder directamente
        return redirect()->route('admin.tipos-productos.index');
    }

/**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoProducto $tipoProducto)
    {
        $this->authorize('update', $tipoProducto);
        
        try {
            // Solo validamos descripción e imagen, el nombre no se puede cambiar
            $validated = $request->validate([
                'descripcion' => 'nullable|string|max:1000',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('imagen')) {
                // Eliminar imagen anterior si existe
                if ($tipoProducto->imagen && Storage::disk('public')->exists($tipoProducto->imagen)) {
                    Storage::disk('public')->delete($tipoProducto->imagen);
                }

                $imagen = $request->file('imagen');
                $nombreImagen = Str::slug($tipoProducto->nombre) . '_' . time() . '.' . $imagen->getClientOriginalExtension();
                $rutaImagen = $imagen->storeAs('tipos-productos', $nombreImagen, 'public');
                $validated['imagen'] = $rutaImagen;
            }

            $tipoProducto->update($validated);

            return redirect()->route('admin.productos.productos')
                            ->with('success', 'Categoría actualizada exitosamente.');
                            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('admin.productos.productos')
                           ->withErrors($e->validator)
                           ->withInput()
                           ->with('error', 'Error al actualizar la categoría. Verifica los datos.');
        } catch (\Exception $e) {
            return redirect()->route('admin.productos.productos')
                           ->with('error', 'Error inesperado al actualizar la categoría.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoProducto $tipoProducto)
    {
        $this->authorize('delete', $tipoProducto);
        
        try {
            // Verificar si tiene productos asociados
            if ($tipoProducto->productos()->count() > 0) {
                return redirect()->route('admin.productos.productos')
                               ->with('error', 'No se puede eliminar esta categoría porque tiene productos asociados.');
            }

            // Eliminar imagen si existe
            if ($tipoProducto->imagen && Storage::disk('public')->exists($tipoProducto->imagen)) {
                Storage::disk('public')->delete($tipoProducto->imagen);
            }

            $tipoProducto->delete();

            return redirect()->route('admin.productos.productos')
                            ->with('success', 'Categoría eliminada exitosamente.');
                            
        } catch (\Exception $e) {
            return redirect()->route('admin.productos.productos')
                           ->with('error', 'Error inesperado al eliminar la categoría.');
        }
    }
}