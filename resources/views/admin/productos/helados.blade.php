{{-- resources/views/admin/productos/helados.blade.php --}}
@extends('layouts.app')
@section('title', 'Gestión de Helados - Admin')
@section('content')
{{-- El contenido principal que irá dentro del sidebar --}}
<div class="py-8 px-4" x-data="productosHelados()" x-init="init()">
    
    {{-- Header --}}
    <div class="max-w-7xl mx-auto mb-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-stone-800">
                    {{ $tipoProducto->nombre ?? 'Helados' }}
                </h1>
                <p class="text-stone-600 mt-1">
                    Gestiona todos los productos de helados artesanales
                </p>
            </div>
            
            @can('create', App\Models\Producto::class)
            <button @click="openCreateModal()"
                    class="flex items-center px-6 py-3 bg-stone-800 text-white rounded-lg hover:bg-stone-700 transition-colors duration-200 shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Nuevo Helado
            </button>
            @endcan
        </div>
    </div>
    {{-- Alertas --}}
    <div class="max-w-7xl mx-auto mb-6">
        @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-lg mb-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700">{{ session('success') }}</p>
                </div>
            </div>
        </div>
        @endif
        
        @if(session('error'))
        <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-lg mb-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700">{{ session('error') }}</p>
                </div>
            </div>
        </div>
        @endif
        
        {{-- Alerta dinámica de Alpine --}}
        <div x-show="alert.show" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95"
             :class="alert.type === 'success' ? 'bg-green-50 border-green-400' : 'bg-red-50 border-red-400'"
             class="border-l-4 p-4 rounded-lg mb-4" 
             style="display: none;">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg x-show="alert.type === 'success'" class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <svg x-show="alert.type === 'error'" class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p :class="alert.type === 'success' ? 'text-green-700' : 'text-red-700'" 
                       class="text-sm" 
                       x-text="alert.message"></p>
                </div>
            </div>
        </div>
    </div>
    {{-- Grid de productos --}}
    <div class="max-w-7xl mx-auto">
        <div x-show="productos.length > 0" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" 
             id="productos-grid">
            <template x-for="producto in productos" :key="producto.id">
                <div class="grupo-producto bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300" 
                     :data-id="producto.id">
                    {{-- Imagen del producto --}}
                    <div class="relative h-48 overflow-hidden">
                        <template x-if="producto.imagen">
                            <img :src="`/storage/${producto.imagen}`" 
                                 :alt="producto.nombre" 
                                 class="w-full h-full object-cover">
                        </template>
                        <template x-if="!producto.imagen">
                            <div class="w-full h-full bg-stone-200 flex items-center justify-center">
                                <svg class="w-16 h-16 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        </template>
                    </div>
                    {{-- Información del producto --}}
                    <div class="p-6">
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold text-stone-800 mb-2" x-text="producto.nombre"></h3>
                            <p class="text-stone-600 text-sm line-clamp-2 mb-3" 
                               x-text="producto.descripcion || 'Sin descripción'"></p>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold text-stone-800">
                                    $<span x-text="parseFloat(producto.precio).toFixed(2)"></span>
                                </span>
                            </div>
                        </div>
                        {{-- Botones de acción --}}
                        <div class="flex gap-2">
                            <button @click="viewProduct(producto.id)"
                                    class="flex-1 px-3 py-2 bg-stone-100 text-stone-700 rounded-lg hover:bg-stone-200 transition-colors duration-200 text-sm font-medium">
                                Ver
                            </button>
                            
                            <template x-if="canUpdate">
                                <button @click="editProduct(producto.id)"
                                        class="flex-1 px-3 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors duration-200 text-sm font-medium">
                                    Editar
                                </button>
                            </template>
                            <template x-if="canDelete">
                                <button @click="confirmDelete(producto.id, producto.nombre)"
                                        class="px-3 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors duration-200 text-sm font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </template>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        
        {{-- Estado vacío --}}
        <div x-show="productos.length === 0" class="text-center py-12">
            <svg class="mx-auto h-24 w-24 text-stone-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
            </svg>
            <h3 class="mt-4 text-lg font-medium text-stone-700">No hay helados registrados</h3>
            <p class="mt-2 text-stone-500">Comienza creando tu primer producto de helado.</p>
            @can('create', App\Models\Producto::class)
            <button @click="openCreateModal()" 
                    class="mt-4 px-6 py-3 bg-stone-800 text-white rounded-lg hover:bg-stone-700 transition-colors duration-200">
                Crear Helado
            </button>
            @endcan
        </div>
    </div>
    {{-- Modal Crear/Editar Producto --}}
    <div x-show="modal.show" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto" 
         style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-stone-500 bg-opacity-75" 
                 @click="closeModal()"></div>
            <div x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="inline-block w-full max-w-md p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                
                <form @submit.prevent="submitForm()" 
                      enctype="multipart/form-data" 
                      id="productForm">
                    @csrf
                    <input type="hidden" x-model="form.id" name="id">
                    <input type="hidden" x-model="form.tipo_producto_id" name="tipo_producto_id">
                    
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-stone-800" 
                            x-text="modal.isEditing ? 'Editar Helado' : 'Crear Nuevo Helado'"></h3>
                    </div>
                    {{-- Nombre --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-stone-700 mb-2">
                            Nombre del Helado *
                        </label>
                        <input type="text" 
                               x-model="form.nombre"
                               name="nombre"
                               required
                               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-stone-500 focus:border-transparent">
                        <div x-show="errors.nombre" class="mt-1 text-sm text-red-600" x-text="errors.nombre?.[0]"></div>
                    </div>
                    {{-- Descripción --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-stone-700 mb-2">
                            Descripción
                        </label>
                        <textarea x-model="form.descripcion"
                                  name="descripcion"
                                  rows="3"
                                  class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-stone-500 focus:border-transparent resize-none"></textarea>
                        <div x-show="errors.descripcion" class="mt-1 text-sm text-red-600" x-text="errors.descripcion?.[0]"></div>
                    </div>
                    {{-- Precio --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-stone-700 mb-2">
                            Precio *
                        </label>
                        <div class="relative">
                            <span class="absolute left-3 top-2 text-stone-500">$</span>
                            <input type="number" 
                                   x-model="form.precio"
                                   name="precio"
                                   step="0.01"
                                   min="0"
                                   required
                                   class="w-full pl-8 pr-3 py-2 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-stone-500 focus:border-transparent">
                        </div>
                        <div x-show="errors.precio" class="mt-1 text-sm text-red-600" x-text="errors.precio?.[0]"></div>
                    </div>
                    {{-- Imagen --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-stone-700 mb-2">
                            Imagen del Producto
                        </label>
                        <input type="file" 
                               @change="handleImageChange"
                               name="imagen"
                               accept="image/*"
                               class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-stone-500 focus:border-transparent">
                        <div x-show="errors.imagen" class="mt-1 text-sm text-red-600" x-text="errors.imagen?.[0]"></div>
                        
                        {{-- Preview de imagen --}}
                        <div x-show="imagePreview" class="mt-3">
                            <img :src="imagePreview" 
                                 alt="Preview" 
                                 class="w-full h-32 object-cover rounded-lg">
                        </div>
                    </div>
                    {{-- Botones --}}
                    <div class="flex gap-3 justify-end">
                        <button type="button" 
                                @click="closeModal()"
                                class="px-4 py-2 text-stone-700 bg-stone-100 rounded-lg hover:bg-stone-200 transition-colors duration-200">
                            Cancelar
                        </button>
                        <button type="submit" 
                                :disabled="loading"
                                class="px-4 py-2 bg-stone-800 text-white rounded-lg hover:bg-stone-700 disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-200">
                            <span x-show="!loading" x-text="modal.isEditing ? 'Actualizar' : 'Crear'"></span>
                            <span x-show="loading" class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Procesando...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal Ver Producto --}}
    <div x-show="viewModal.show" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto" 
         style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-stone-500 bg-opacity-75" 
                 @click="closeViewModal()"></div>
            <div x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="inline-block w-full max-w-lg p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-stone-800">Detalles del Producto</h3>
                </div>
                <div class="space-y-4" x-show="viewModal.producto">
                    {{-- Imagen --}}
                    <div class="text-center" x-show="viewModal.producto?.imagen">
                        <img :src="viewModal.producto?.imagen ? '/storage/' + viewModal.producto.imagen : ''" 
                             :alt="viewModal.producto?.nombre" 
                             class="w-full h-48 object-cover rounded-lg">
                    </div>
                    {{-- Información --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-stone-700">Nombre</label>
                            <p class="mt-1 text-stone-900" x-text="viewModal.producto?.nombre"></p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-stone-700">Precio</label>
                            <p class="mt-1 text-stone-900">$<span x-text="viewModal.producto?.precio"></span></p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-stone-700">Categoría</label>
                            <p class="mt-1 text-stone-900" x-text="viewModal.producto?.tipo_producto?.nombre"></p>
                        </div>
                    </div>
                    {{-- Descripción --}}
                    <div x-show="viewModal.producto?.descripcion">
                        <label class="block text-sm font-medium text-stone-700">Descripción</label>
                        <p class="mt-1 text-stone-900" x-text="viewModal.producto?.descripcion"></p>
                    </div>
                </div>
                {{-- Botón cerrar --}}
                <div class="mt-6 flex justify-end">
                    <button type="button" 
                            @click="closeViewModal()"
                            class="px-4 py-2 bg-stone-800 text-white rounded-lg hover:bg-stone-700 transition-colors duration-200">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Confirmar Eliminación --}}
    <div x-show="deleteModal.show" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto" 
         style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-stone-500 bg-opacity-75" 
                 @click="closeDeleteModal()"></div>
            <div x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="inline-block w-full max-w-md p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                
                <div class="flex items-center mb-4">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 14.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-semibold text-stone-800">Confirmar eliminación</h3>
                    </div>
                </div>
                <div class="mb-6">
                    <p class="text-stone-600">
                        ¿Estás seguro de que deseas eliminar el producto 
                        <strong x-text="deleteModal.productName"></strong>? 
                        Esta acción no se puede deshacer.
                    </p>
                </div>
                <div class="flex gap-3 justify-end">
                    <button type="button" 
                            @click="closeDeleteModal()"
                            class="px-4 py-2 text-stone-700 bg-stone-100 rounded-lg hover:bg-stone-200 transition-colors duration-200">
                        Cancelar
                    </button>
                    <button type="button" 
                            @click="deleteProduct()"
                            :disabled="loading"
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-200">
                        <span x-show="!loading">Eliminar</span>
                        <span x-show="loading" class="flex items-center">
                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Eliminando...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Scripts --}}
@push('scripts')
<script>
function productosHelados() {
    return {
        // Estados
        loading: false,
        alert: {
            show: false,
            type: 'success',
            message: ''
        },
        
        // Array de productos (reemplaza la vista estática)
        productos: @json($productos->items() ?? []),
        
        // Permisos del usuario (calculados una sola vez)
        canUpdate: @json(auth()->user() ? auth()->user()->isAdmin() : false),
        canDelete: @json(auth()->user() ? auth()->user()->isAdmin() : false),
        
        // Modal principal (crear/editar)
        modal: {
            show: false,
            isEditing: false
        },
        
        // Modal ver producto
        viewModal: {
            show: false,
            producto: null
        },
        
        // Modal eliminar
        deleteModal: {
            show: false,
            productId: null,
            productName: ''
        },
        
        // Formulario
        form: {
            id: null,
            nombre: '',
            descripcion: '',
            precio: '',
            tipo_producto_id: {{ $tipoProducto->id ?? 'null' }},
        },
        
        // Errores de validación
        errors: {},
        
        // Preview de imagen
        imagePreview: null,
        
        // Inicialización
        init() {
            // Configurar el token CSRF
            const token = document.querySelector('meta[name="csrf-token"]');
            if (token) {
                // Si tienes axios configurado
                if (window.axios) {
                    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.getAttribute('content');
                }
            }
            
            // Validar que tenemos el tipo_producto_id
            if (!this.form.tipo_producto_id) {
                this.showAlert('error', 'Error: No se pudo identificar la categoría de productos.');
            }
        },
        
        // Mostrar alerta
        showAlert(type, message) {
            this.alert = { show: true, type, message };
            setTimeout(() => {
                this.alert.show = false;
            }, 5000);
        },
        
        // Abrir modal crear
        openCreateModal() {
            this.resetForm();
            this.modal.isEditing = false;
            this.modal.show = true;
            this.errors = {};
            this.imagePreview = null;
        },
        
        // Cerrar modal principal
        closeModal() {
            this.modal.show = false;
            this.resetForm();
            this.errors = {};
            this.imagePreview = null;
        },
        
        // Resetear formulario
        resetForm() {
            this.form = {
                id: null,
                nombre: '',
                descripcion: '',
                precio: '',
                tipo_producto_id: {{ $tipoProducto->id ?? 'null' }},
            };
        },
        
        // Manejar cambio de imagen
        handleImageChange(event) {
            const file = event.target.files[0];
            if (file) {
                // Validar tipo de archivo
                const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                if (!validTypes.includes(file.type)) {
                    this.showAlert('error', 'Por favor selecciona un archivo de imagen válido (JPEG, PNG, GIF)');
                    event.target.value = '';
                    return;
                }
                
                // Validar tamaño (2MB máximo)
                if (file.size > 2048 * 1024) {
                    this.showAlert('error', 'La imagen no debe superar los 2MB');
                    event.target.value = '';
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.imagePreview = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                this.imagePreview = null;
            }
        },
        
        // Ver producto
        async viewProduct(id) {
            this.loading = true;
            try {
                const response = await fetch(`/admin/productos/${id}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });
                
                if (response.ok) {
                    const data = await response.json();
                    this.viewModal.producto = data.producto;
                    this.viewModal.show = true;
                } else {
                    this.showAlert('error', 'Error al cargar el producto');
                }
            } catch (error) {
                console.error('Error:', error);
                this.showAlert('error', 'Error de conexión');
            } finally {
                this.loading = false;
            }
        },
        
        // Cerrar modal ver
        closeViewModal() {
            this.viewModal.show = false;
            this.viewModal.producto = null;
        },
        
        // Editar producto
        async editProduct(id) {
            this.loading = true;
            try {
                const response = await fetch(`/admin/productos/${id}/edit`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });
                
                if (response.ok) {
                    const data = await response.json();
                    const producto = data.producto;
                    
                    this.form = {
                        id: producto.id,
                        nombre: producto.nombre,
                        descripcion: producto.descripcion || '',
                        precio: producto.precio,
                        tipo_producto_id: producto.tipo_producto_id,
                    };
                    
                    if (producto.imagen) {
                        this.imagePreview = `/storage/${producto.imagen}`;
                    }
                    
                    this.modal.isEditing = true;
                    this.modal.show = true;
                    this.errors = {};
                } else {
                    this.showAlert('error', 'Error al cargar el producto para editar');
                }
            } catch (error) {
                console.error('Error:', error);
                this.showAlert('error', 'Error de conexión');
            } finally {
                this.loading = false;
            }
        },
        
        // Validar formulario antes de enviar
        validateForm() {
            const errors = {};
            
            if (!this.form.nombre || this.form.nombre.trim().length === 0) {
                errors.nombre = ['El nombre es requerido'];
            } else if (this.form.nombre.trim().length > 255) {
                errors.nombre = ['El nombre no debe exceder 255 caracteres'];
            }
            
            if (!this.form.precio || this.form.precio <= 0) {
                errors.precio = ['El precio debe ser mayor a 0'];
            }
            
            if (this.form.descripcion && this.form.descripcion.length > 1000) {
                errors.descripcion = ['La descripción no debe exceder 1000 caracteres'];
            }
            
            if (!this.form.tipo_producto_id) {
                errors.tipo_producto_id = ['La categoría es requerida'];
            }
            
            return errors;
        },
        
        // Actualizar producto en el array local
        updateProductoInList(producto) {
            const index = this.productos.findIndex(p => p.id === producto.id);
            if (index !== -1) {
                // Actualizar producto existente (forzar reactividad)
                this.productos[index] = { ...producto };
                this.productos = [...this.productos]; // Forzar actualización
            } else {
                // Agregar nuevo producto
                this.productos = [...this.productos, producto];
            }
        },
        
        // Remover producto del array local
        removeProductoFromList(productId) {
            this.productos = this.productos.filter(p => p.id !== productId);
        },
        
        // Enviar formulario
        async submitForm() {
            // Validar formulario primero
            const validationErrors = this.validateForm();
            if (Object.keys(validationErrors).length > 0) {
                this.errors = validationErrors;
                this.showAlert('error', 'Por favor corrige los errores en el formulario');
                return;
            }
            
            this.loading = true;
            this.errors = {};
            
            try {
                const formElement = document.getElementById('productForm');
                const formData = new FormData(formElement);
                
                // Asegurar que tipo_producto_id se envíe correctamente
                formData.set('tipo_producto_id', this.form.tipo_producto_id);
                
                // Si es edición, agregar método PUT
                if (this.modal.isEditing) {
                    formData.append('_method', 'PUT');
                }
                
                const url = this.modal.isEditing ? 
                    `/admin/productos/${this.form.id}` : 
                    '/admin/productos';
                
                const response = await fetch(url, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
                
                const data = await response.json();
                
                if (response.ok && data.success) {
                    this.showAlert('success', data.message);
                    this.closeModal();
                    
                    // Actualizar la lista de productos sin recargar la página
                    if (data.producto) {
                        this.updateProductoInList(data.producto);
                    }
                } else if (response.status === 422) {
                    this.errors = data.errors || {};
                    this.showAlert('error', data.message || 'Error de validación');
                } else {
                    this.showAlert('error', data.message || 'Error al procesar la solicitud');
                }
            } catch (error) {
                console.error('Error:', error);
                this.showAlert('error', 'Error de conexión. Verifica tu conexión a internet.');
            } finally {
                this.loading = false;
            }
        },
        
        // Confirmar eliminación
        confirmDelete(id, name) {
            this.deleteModal = {
                show: true,
                productId: id,
                productName: name
            };
        },
        
        // Cerrar modal eliminar
        closeDeleteModal() {
            this.deleteModal = {
                show: false,
                productId: null,
                productName: ''
            };
        },
        
        // Eliminar producto
        async deleteProduct() {
            if (!this.deleteModal.productId) {
                this.showAlert('error', 'Error: No se pudo identificar el producto a eliminar');
                return;
            }
            
            this.loading = true;
            try {
                const response = await fetch(`/admin/productos/${this.deleteModal.productId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
                
                const data = await response.json();
                
                if (response.ok && data.success) {
                    this.showAlert('success', data.message);
                    
                    // Remover el producto de la lista sin recargar (forzar reactividad)
                    const productIdToDelete = this.deleteModal.productId;
                    this.productos = this.productos.filter(p => p.id !== productIdToDelete);
                    
                    this.closeDeleteModal();
                } else {
                    this.showAlert('error', data.message || 'Error al eliminar el producto');
                }
            } catch (error) {
                console.error('Error:', error);
                this.showAlert('error', 'Error de conexión. Verifica tu conexión a internet.');
            } finally {
                this.loading = false;
            }
        }
    };
}
</script>
@endpush
@push('styles')
<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endpush
@endsection