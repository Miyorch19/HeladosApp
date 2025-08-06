<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\TipoProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Producto::with('tipoProducto');
        
        // Filtrar por tipo de producto si se especifica
        if ($request->has('tipo_producto_id') && $request->tipo_producto_id) {
            $query->where('tipo_producto_id', $request->tipo_producto_id);
        }
        
        $productos = $query->paginate(12);
        $tiposProductos = TipoProducto::all();
        
        return view('admin.productos.productos', compact('productos', 'tiposProductos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiposProductos = TipoProducto::all();
        return view('admin.productos.create', compact('tiposProductos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Producto::class);
        
        try {
            $validated = $request->validate([
                'nombre' => 'required|string|max:255',
                'descripcion' => 'nullable|string|max:1000',
                'precio' => 'required|numeric|min:0',
                'tipo_producto_id' => 'required|exists:tipos_productos,id',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $producto = new Producto($validated);
            
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $nombreImagen = Str::slug($validated['nombre']) . '_' . time() . '.' . $imagen->getClientOriginalExtension();
                $rutaImagen = $imagen->storeAs('productos', $nombreImagen, 'public');
                $producto->imagen = $rutaImagen;
            }

            $producto->save();

            // Si es una petición AJAX, retornar JSON
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Producto creado exitosamente.',
                    'producto' => $producto->load('tipoProducto')
                ]);
            }

            return redirect()->back()->with('success', 'Producto creado exitosamente.');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error de validación',
                    'errors' => $e->errors()
                ], 422);
            }
            
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error inesperado al crear el producto.'
                ], 500);
            }
            
            return redirect()->back()->with('error', 'Error inesperado al crear el producto.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        $this->authorize('view', $producto);
        
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'producto' => $producto->load('tipoProducto')
            ]);
        }
        
        return view('admin.productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        $this->authorize('update', $producto);
        
        if (request()->ajax()) {
            $tiposProductos = TipoProducto::all();
            return response()->json([
                'success' => true,
                'producto' => $producto->load('tipoProducto'),
                'tiposProductos' => $tiposProductos
            ]);
        }
        
        $tiposProductos = TipoProducto::all();
        return view('admin.productos.edit', compact('producto', 'tiposProductos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $this->authorize('update', $producto);
        
        try {
            $validated = $request->validate([
                'nombre' => 'required|string|max:255',
                'descripcion' => 'nullable|string|max:1000',
                'precio' => 'required|numeric|min:0',
                'tipo_producto_id' => 'required|exists:tipos_productos,id',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('imagen')) {
                // Eliminar imagen anterior si existe
                if ($producto->imagen && Storage::disk('public')->exists($producto->imagen)) {
                    Storage::disk('public')->delete($producto->imagen);
                }
                
                $imagen = $request->file('imagen');
                $nombreImagen = Str::slug($validated['nombre']) . '_' . time() . '.' . $imagen->getClientOriginalExtension();
                $rutaImagen = $imagen->storeAs('productos', $nombreImagen, 'public');
                $validated['imagen'] = $rutaImagen;
            }

            $producto->update($validated);

            // Si es una petición AJAX, retornar JSON
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Producto actualizado exitosamente.',
                    'producto' => $producto->load('tipoProducto')
                ]);
            }

            return redirect()->back()->with('success', 'Producto actualizado exitosamente.');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error de validación',
                    'errors' => $e->errors()
                ], 422);
            }
            
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error inesperado al actualizar el producto.'
                ], 500);
            }
            
            return redirect()->back()->with('error', 'Error inesperado al actualizar el producto.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $this->authorize('delete', $producto);
        
        try {
            // Eliminar imagen si existe
            if ($producto->imagen && Storage::disk('public')->exists($producto->imagen)) {
                Storage::disk('public')->delete($producto->imagen);
            }

            $producto->delete();

            // Si es una petición AJAX, retornar JSON
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Producto eliminado exitosamente.'
                ]);
            }

            return redirect()->back()->with('success', 'Producto eliminado exitosamente.');
            
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error inesperado al eliminar el producto.'
                ], 500);
            }
            
            return redirect()->back()->with('error', 'Error inesperado al eliminar el producto.');
        }
    }

    /**
     * Vista específica para productos de helados
     */
    public function helados()
    {
        $this->authorize('viewAny', Producto::class);
        
        // Buscar la categoría "Helados" (ajusta el nombre según tu BD)
        $tipoProducto = TipoProducto::where('nombre', 'like', '%helado%')->first();
        
        if (!$tipoProducto) {
            return redirect()->route('admin.productos.index')
                           ->with('error', 'Categoría de helados no encontrada.');
        }
        
        $productos = $tipoProducto->productos()->paginate(12);
        $tiposProductos = TipoProducto::all();
        
        return view('admin.productos.helados', compact('productos', 'tipoProducto', 'tiposProductos'));
    }
    
    /**
     * Vista específica para productos de malteadas
     */
    public function malteadas()
    {
        $this->authorize('viewAny', Producto::class);
        
        // Buscar la categoría "Malteadas" (ajusta el nombre según tu BD)
        $tipoProducto = TipoProducto::where('nombre', 'like', '%malteada%')->first();
        
        if (!$tipoProducto) {
            return redirect()->route('admin.productos.index')
                           ->with('error', 'Categoría de malteadas no encontrada.');
        }
        
        $productos = $tipoProducto->productos()->paginate(12);
        $tiposProductos = TipoProducto::all();
        
        return view('admin.productos.malteadas', compact('productos', 'tipoProducto', 'tiposProductos'));
    }
    
    /**
     * Vista específica para productos de paletas
     */
    public function paletas()
    {
        $this->authorize('viewAny', Producto::class);
        
        // Buscar la categoría "Paletas" (ajusta el nombre según tu BD)
        $tipoProducto = TipoProducto::where('nombre', 'like', '%paleta%')->first();
        
        if (!$tipoProducto) {
            return redirect()->route('admin.productos.index')
                           ->with('error', 'Categoría de paletas no encontrada.');
        }
        
        $productos = $tipoProducto->productos()->paginate(12);
        $tiposProductos = TipoProducto::all();
        
        return view('admin.productos.paletas', compact('productos', 'tipoProducto', 'tiposProductos'));
    }
}