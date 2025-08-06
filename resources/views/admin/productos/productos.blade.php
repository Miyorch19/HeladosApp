{{-- resources/views/admin/productos/productos.blade.php --}}
@extends('layouts.app')
@section('title', 'Productos')
@section('content')
<div class="min-h-screen bg-stone-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-stone-900">Gestión de Productos</h1>
                    <p class="mt-2 text-stone-600">Selecciona una categoría para administrar sus productos</p>
                </div>
                
                {{-- ACTIVAR EL BOTON DE AGREGAR NUEVA CATEGORIA --}}

                {{-- <button onclick="openCreateModal()" 
                class="inline-flex items-center px-4 py-2 bg-stone-800 hover:bg-stone-900 text-white font-medium rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Nueva Categoría
                </button> --}}
            </div>
        </div>

        <!-- Mensajes -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <!-- Grid de tipos de productos (categorías) -->
        @if($tiposProductos->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($tiposProductos as $tipo)
                    <div class="bg-white rounded-xl shadow-sm border border-stone-200 overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        <!-- Imagen -->
                        <div class="aspect-video bg-gradient-to-br from-stone-100 to-stone-200 relative overflow-hidden">
                            @if($tipo->imagen_url)
                                <img src="{{ $tipo->imagen_url }}" 
                                    alt="{{ $tipo->nombre }}"
                                    class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-stone-400">
                                    <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Badge con contador de productos -->
                            <div class="absolute top-4 right-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-white/90 text-stone-800 backdrop-blur-sm">
                                    {{ $tipo->productos_count }} producto{{ $tipo->productos_count != 1 ? 's' : '' }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Contenido -->
                        <div class="p-6">
                            <div class="mb-4">
                                <h3 class="text-xl font-bold text-stone-900 mb-2">{{ $tipo->nombre }}</h3>
                                @if($tipo->descripcion)
                                    <p class="text-stone-600 text-sm line-clamp-3">{{ $tipo->descripcion }}</p>
                                @endif
                            </div>
                            
                            <!-- Acciones -->
                            <div class="flex flex-col space-y-3">
                                <!-- Botón principal: Ver productos -->
                                <a href="{{ 
                                    $tipo->getRouteName() === 'admin.productos.index' 
                                    ? route($tipo->getRouteName(), ['tipo_producto_id' => $tipo->id])
                                    : route($tipo->getRouteName())
                                }}" 
                                class="w-full inline-flex justify-center items-center px-4 py-3 bg-stone-800 hover:bg-stone-900 text-white font-medium rounded-lg transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                    Ver Productos ({{ $tipo->productos_count }})
                                </a>
                                
                                <!-- Acciones secundarias -->
                                <div class="flex space-x-2">
                                    <button onclick="openEditModal({{ $tipo->id }}, '{{ addslashes($tipo->nombre) }}', '{{ addslashes($tipo->descripcion ?? '') }}', '{{ $tipo->imagen_url ?? '' }}')" 
                                    class="flex-1 inline-flex justify-center items-center px-3 py-2 text-sm font-medium text-blue-700 bg-blue-100 hover:bg-blue-200 rounded-lg transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Editar
                                    </button>
                                    @if($tipo->productos_count == 0)
                                        <button onclick="confirmDelete({{ $tipo->id }}, '{{ addslashes($tipo->nombre) }}')" 
                                                class="px-3 py-2 text-sm font-medium text-red-700 bg-red-100 hover:bg-red-200 rounded-lg transition-colors duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Paginación -->
            @if(method_exists($tiposProductos, 'hasPages') && $tiposProductos->hasPages())
                <div class="flex justify-center mt-8">
                    {{ $tiposProductos->links() }}
                </div>
            @endif
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-stone-900">No hay categorías de productos</h3>
                <p class="mt-1 text-sm text-stone-500">Comienza creando tu primera categoría de productos.</p>
                <div class="mt-6">
                    <button onclick="openCreateModal()" 
                    class="inline-flex items-center px-4 py-2 bg-stone-800 hover:bg-stone-900 text-white font-medium rounded-lg transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Nueva Categoría
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Modal para crear categoría -->
<div id="createModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 hidden">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-stone-900">Nueva Categoría de Productos</h3>
                <button onclick="closeCreateModal()" class="text-stone-400 hover:text-stone-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <form id="createForm" method="POST" action="{{ route('admin.categorias.store') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                
                <!-- Nombre -->
                <div>
                    <label for="create_nombre" class="block text-sm font-medium text-stone-700 mb-2">
                        Nombre de la categoría *
                    </label>
                    <input type="text" 
                        id="create_nombre" 
                        name="nombre" 
                        class="w-full px-3 py-2 border border-stone-300 rounded-md focus:outline-none focus:ring-2 focus:ring-stone-500"
                        placeholder="Ej: Helados Artesanales"
                        required>
                    <div id="create_nombre_error" class="text-red-600 text-sm mt-1 hidden"></div>
                </div>

                <!-- Descripción -->
                <div>
                    <label for="create_descripcion" class="block text-sm font-medium text-stone-700 mb-2">
                        Descripción
                    </label>
                    <textarea id="create_descripcion" 
                            name="descripcion" 
                            rows="3" 
                            class="w-full px-3 py-2 border border-stone-300 rounded-md focus:outline-none focus:ring-2 focus:ring-stone-500"
                            placeholder="Describe brevemente esta categoría..."></textarea>
                </div>

                <!-- Imagen -->
                <div>
                    <label for="create_imagen" class="block text-sm font-medium text-stone-700 mb-2">
                        Imagen de la categoría
                    </label>
                    <input type="file" 
                        id="create_imagen" 
                        name="imagen" 
                        accept="image/*"
                        class="w-full px-3 py-2 border border-stone-300 rounded-md focus:outline-none focus:ring-2 focus:ring-stone-500">
                    <p class="text-xs text-stone-500 mt-1">PNG, JPG, GIF hasta 2MB</p>
                </div>

                <!-- Botones -->
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" 
                            onclick="closeCreateModal()"
                            class="px-4 py-2 bg-stone-300 hover:bg-stone-400 text-stone-700 rounded-md transition-colors duration-200">
                        Cancelar
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-stone-800 hover:bg-stone-900 text-white rounded-md transition-colors duration-200">
                        Crear Categoría
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para editar categoría -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 hidden">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-stone-900">Editar Categoría</h3>
                <button onclick="closeEditModal()" class="text-stone-400 hover:text-stone-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <form id="editForm" method="POST" action="" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                
                <!-- Nombre (solo lectura) -->
                <div>
                    <label for="edit_nombre" class="block text-sm font-medium text-stone-700 mb-2">
                        Nombre de la categoría
                    </label>
                    <input type="text" 
                        id="edit_nombre" 
                        name="nombre" 
                        class="w-full px-3 py-2 border border-stone-300 rounded-md bg-stone-100 text-stone-600 cursor-not-allowed"
                        readonly>
                    <p class="text-xs text-stone-500 mt-1">El nombre de la categoría no se puede modificar para mantener la funcionalidad del sistema.</p>
                </div>

                <!-- Descripción -->
                <div>
                    <label for="edit_descripcion" class="block text-sm font-medium text-stone-700 mb-2">
                        Descripción
                    </label>
                    <textarea id="edit_descripcion" 
                            name="descripcion" 
                            rows="3" 
                            class="w-full px-3 py-2 border border-stone-300 rounded-md focus:outline-none focus:ring-2 focus:ring-stone-500"></textarea>
                </div>

                <!-- Imagen actual -->
                <div id="current_image_section" class="hidden">
                    <label class="block text-sm font-medium text-stone-700 mb-2">Imagen actual</label>
                    <img id="current_image" src="" alt="" class="w-24 h-24 object-cover rounded-md border border-stone-300">
                </div>

                <!-- Nueva imagen -->
                <div>
                    <label for="edit_imagen" class="block text-sm font-medium text-stone-700 mb-2">
                        <span id="image_label">Cambiar imagen</span>
                    </label>
                    <input type="file" 
                        id="edit_imagen" 
                        name="imagen" 
                        accept="image/*"
                        class="w-full px-3 py-2 border border-stone-300 rounded-md focus:outline-none focus:ring-2 focus:ring-stone-500">
                    <p class="text-xs text-stone-500 mt-1">PNG, JPG, GIF hasta 2MB</p>
                </div>

                <!-- Botones -->
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" 
                            onclick="closeEditModal()"
                            class="px-4 py-2 bg-stone-300 hover:bg-stone-400 text-stone-700 rounded-md transition-colors duration-200">
                        Cancelar
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md transition-colors duration-200">
                        Actualizar Categoría
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de confirmación para eliminar -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.962-.833-2.732 0L3.232 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mt-2">Confirmar eliminación</h3>
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500">
                    ¿Estás seguro de eliminar la categoría "<span id="delete_category_name"></span>"? 
                    Esta acción no se puede deshacer.
                </p>
            </div>
            <div class="items-center px-4 py-3">
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-center space-x-3">
                        <button type="button" 
                                onclick="closeDeleteModal()"
                                class="px-4 py-2 bg-stone-300 hover:bg-stone-400 text-stone-700 rounded-md transition-colors duration-200">
                            Cancelar
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md transition-colors duration-200">
                            Eliminar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Funciones para el modal de crear
function openCreateModal() {
    document.getElementById('createModal').classList.remove('hidden');
    document.getElementById('create_nombre').focus();
}

function closeCreateModal() {
    document.getElementById('createModal').classList.add('hidden');
    document.getElementById('createForm').reset();
    // Limpiar errores
    document.getElementById('create_nombre_error').classList.add('hidden');
}

// Funciones para el modal de editar
function openEditModal(id, nombre, descripcion, imagenUrl) {
    const modal = document.getElementById('editModal');
    const form = document.getElementById('editForm');
    
    // Usar las rutas correctas definidas en web.php
    form.action = `/admin/categorias/${id}`;
    
    // Llenar los campos (limpiar caracteres especiales)
    document.getElementById('edit_nombre').value = nombre;
    document.getElementById('edit_descripcion').value = descripcion || '';
    
    // Mostrar imagen actual si existe
    const currentImageSection = document.getElementById('current_image_section');
    const currentImage = document.getElementById('current_image');
    const imageLabel = document.getElementById('image_label');
    
    if (imagenUrl && imagenUrl !== 'null' && imagenUrl !== '' && imagenUrl !== 'undefined') {
        currentImage.src = imagenUrl;
        currentImage.alt = nombre;
        currentImageSection.classList.remove('hidden');
        imageLabel.textContent = 'Cambiar imagen';
    } else {
        currentImageSection.classList.add('hidden');
        imageLabel.textContent = 'Imagen de la categoría';
    }
    
    modal.classList.remove('hidden');
    document.getElementById('edit_nombre').focus();
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
    document.getElementById('editForm').reset();
}

// Funciones para el modal de eliminar
function confirmDelete(id, nombre) {
    const modal = document.getElementById('deleteModal');
    const form = document.getElementById('deleteForm');
    const nameSpan = document.getElementById('delete_category_name');
    
    // Usar las rutas correctas definidas en web.php
    form.action = `/admin/categorias/${id}`;
    nameSpan.textContent = nombre;
    
    modal.classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}

// Cerrar modales con ESC
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeCreateModal();
        closeEditModal();
        closeDeleteModal();
    }
});

// Cerrar modales haciendo clic fuera
window.onclick = function(event) {
    const createModal = document.getElementById('createModal');
    const editModal = document.getElementById('editModal');
    const deleteModal = document.getElementById('deleteModal');
    
    if (event.target === createModal) {
        closeCreateModal();
    }
    if (event.target === editModal) {
        closeEditModal();
    }
    if (event.target === deleteModal) {
        closeDeleteModal();
    }
}
</script>
@endsection