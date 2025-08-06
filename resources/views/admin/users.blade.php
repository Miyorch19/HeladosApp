{{-- resources/views/admin/users.blade.php --}}
@extends('layouts.app')

@section('title', 'Gestión de Usuarios - Admin')

@section('content')
<div class="min-h-screen bg-stone-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        {{-- Título y descripción --}}
        <div class="text-center mb-12">
            <div class="flex justify-center mb-6">
<div class="w-20 h-20 bg-stone-800 rounded-xl flex items-center justify-center">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12 text-white">
        <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
    </svg>
</div>

            </div>
            <h1 class="text-4xl font-bold text-stone-800 mb-3">Gestión de Usuarios</h1>
            <p class="text-stone-600 text-lg">Administra todos los usuarios del sistema Gelato</p>
        </div>

        {{-- Mensajes de estado --}}
        @if(session('success'))
            <div class="max-w-4xl mx-auto mb-8">
                <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl shadow-sm" role="alert">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="max-w-4xl mx-auto mb-8">
                <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-2xl shadow-sm" role="alert">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 max-w-7xl mx-auto">
            {{-- Formulario para crear nuevo usuario --}}
            <div class="xl:col-span-1">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="bg-stone-800 px-8 py-6">
                        <h2 class="text-xl font-semibold text-white flex items-center">
                            <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
                            </svg>
                            Crear Nuevo Usuario
                        </h2>
                    </div>
                    <div class="p-8">
                        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            {{-- Campo de nombre --}}
                            <div>
                                <label for="name" class="block text-sm font-medium text-stone-700 mb-2">
                                    Nombre completo
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                    <input type="text" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name') }}"
                                           required
                                           class="block w-full pl-10 pr-3 py-3 border border-stone-200 rounded-lg text-stone-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-stone-800 focus:border-transparent transition-all duration-200 @error('name') border-red-300 @enderror"
                                           placeholder="Nombre completo del usuario">
                                </div>
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Campo de email --}}
                            <div>
                                <label for="email" class="block text-sm font-medium text-stone-700 mb-2">
                                    Correo electrónico
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <input type="email" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email') }}"
                                           required
                                           class="block w-full pl-10 pr-3 py-3 border border-stone-200 rounded-lg text-stone-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-stone-800 focus:border-transparent transition-all duration-200 @error('email') border-red-300 @enderror"
                                           placeholder="usuario@email.com">
                                </div>
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Campo de rol --}}
                            <div>
                                <label for="role" class="block text-sm font-medium text-stone-700 mb-2">
                                    Rol del usuario
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                                        </svg>
                                    </div>
                                    <select id="role" 
                                            name="role" 
                                            required
                                            class="block w-full pl-10 pr-3 py-3 border border-stone-200 rounded-lg text-stone-900 focus:outline-none focus:ring-2 focus:ring-stone-800 focus:border-transparent transition-all duration-200 @error('role') border-red-300 @enderror">
                                        <option value="">Selecciona un rol</option>
                                        <option value="{{ App\Models\User::ROLE_ADMIN }}" 
                                                {{ old('role') === App\Models\User::ROLE_ADMIN ? 'selected' : '' }}>
                                            Administrador
                                        </option>
                                        <option value="{{ App\Models\User::ROLE_CUSTOMER }}" 
                                                {{ old('role') === App\Models\User::ROLE_CUSTOMER ? 'selected' : '' }}>
                                            Cliente
                                        </option>
                                    </select>
                                </div>
                                @error('role')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Campo de contraseña --}}
                            <div>
                                <label for="password" class="block text-sm font-medium text-stone-700 mb-2">
                                    Contraseña
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                    </div>
                                    <input type="password" 
                                           id="password" 
                                           name="password"
                                           required
                                           class="block w-full pl-10 pr-3 py-3 border border-stone-200 rounded-lg text-stone-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-stone-800 focus:border-transparent transition-all duration-200 @error('password') border-red-300 @enderror"
                                           placeholder="Mínimo 8 caracteres">
                                </div>
                                @error('password')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Campo de confirmación de contraseña --}}
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-stone-700 mb-2">
                                    Confirmar contraseña
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <input type="password" 
                                           id="password_confirmation" 
                                           name="password_confirmation"
                                           required
                                           class="block w-full pl-10 pr-3 py-3 border border-stone-200 rounded-lg text-stone-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-stone-800 focus:border-transparent transition-all duration-200"
                                           placeholder="Confirma la contraseña">
                                </div>
                            </div>

                            {{-- Botones --}}
                            <div class="space-y-4">
                                <button type="submit" 
                                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-stone-800 hover:bg-stone-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-800 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                        <svg class="h-5 w-5 text-stone-300 group-hover:text-stone-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                        </svg>
                                    </span>
                                    Crear Usuario
                                </button>
                                
                                <button type="reset" 
                                        class="w-full flex justify-center py-3 px-4 border border-stone-200 text-sm font-medium rounded-lg text-stone-700 bg-white hover:bg-stone-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-800 transition-all duration-200">
                                    <svg class="h-5 w-5 mr-2 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                    Limpiar Campos
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Lista de usuarios existentes --}}
            <div class="xl:col-span-2">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="bg-stone-100 px-8 py-6 border-b border-stone-200">
                        <h2 class="text-xl font-semibold text-stone-800 flex items-center">
<svg class="w-6 h-6 mr-3 text-stone-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
  <path d="M5.625 3.75a2.625 2.625 0 1 0 0 5.25h12.75a2.625 2.625 0 0 0 0-5.25H5.625ZM3.75 11.25a.75.75 0 0 0 0 1.5h16.5a.75.75 0 0 0 0-1.5H3.75ZM3 15.75a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75ZM3.75 18.75a.75.75 0 0 0 0 1.5h16.5a.75.75 0 0 0 0-1.5H3.75Z" />
</svg>

                            Lista de Usuarios
                        </h2>
                    </div>
                    
                    @if($users->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-stone-200">
                                <thead class="bg-stone-50">
                                    <tr>
                                        <th scope="col" class="px-8 py-4 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">
                                            Usuario
                                        </th>
                                        <th scope="col" class="px-8 py-4 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">
                                            Rol
                                        </th>
                                        <th scope="col" class="px-8 py-4 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">
                                            Fecha de registro
                                        </th>
                                        <th scope="col" class="px-8 py-4 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-stone-200">
                                    @foreach($users as $user)
                                    <tr class="hover:bg-stone-50 transition-colors duration-200">
                                        <td class="px-8 py-6 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-12 w-12">
                                                    <div class="h-12 w-12 rounded-full bg-stone-100 flex items-center justify-center border border-stone-200">
                                                        <svg class="w-6 h-6 text-stone-600" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-stone-900">
                                                        {{ $user->name }}
                                                    </div>
                                                    <div class="text-sm text-stone-500">
                                                        {{ $user->email }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-6 whitespace-nowrap">
                                            @if($user->isAdmin())
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-800 border border-amber-200">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                    Administrador
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 border border-emerald-200">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                                    </svg>
                                                    Cliente
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-8 py-6 whitespace-nowrap text-sm text-stone-900">
                                            {{ $user->created_at->format('d/m/Y') }}
                                        </td>
                                        <td class="px-8 py-6 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-3">
                                                @if($user->id !== auth()->id())
                                                    {{-- Botón editar --}}
                                                    <button onclick="editUser({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}')"
                                                            class="inline-flex items-center px-3 py-2 border border-stone-200 text-sm leading-4 font-medium rounded-md text-stone-700 bg-white hover:bg-stone-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-800 transition-all duration-200">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                        </svg>
                                                        Editar
                                                    </button>
                                                    
                                                    {{-- Botón eliminar --}}
                                                    <button onclick="showDeleteModal({{ $user->id }}, '{{ $user->name }}')"
                                                            class="inline-flex items-center px-3 py-2 border border-red-200 text-sm leading-4 font-medium rounded-md text-red-700 bg-red-50 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                        Eliminar
                                                    </button>
                                                @else
                                                    <span class="inline-flex items-center px-3 py-2 text-sm text-stone-400">
                                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                                        </svg>
                                                        Usuario actual
                                                    </span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        {{-- Paginación --}}
                        <div class="bg-stone-50 px-8 py-4 border-t border-stone-200">
                            {{ $users->links() }}
                        </div>
                    @else
                        <div class="p-12 text-center text-stone-500">
                            <div class="w-20 h-20 mx-auto mb-6 bg-stone-100 rounded-full flex items-center justify-center">
                                <svg class="w-10 h-10 text-stone-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-stone-800 mb-2">No hay usuarios registrados</h3>
                            <p class="text-stone-500">Crea el primer usuario utilizando el formulario de la izquierda.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal para eliminar usuario --}}
<div id="deleteUserModal" class="fixed inset-0 bg-stone-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border-0 shadow-2xl rounded-2xl w-96 bg-white">
        <div class="p-6">
            <div class="flex items-center mb-6">
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mr-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-stone-800">Confirmar Eliminación</h3>
                    <p class="text-stone-600 text-sm mt-1">Esta acción no se puede deshacer</p>
                </div>
            </div>
            
            <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-red-500 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-red-800">
                            ¿Estás seguro de que deseas eliminar al usuario?
                        </p>
                        <p class="text-sm text-red-700 mt-1">
                            <span class="font-semibold" id="deleteUserName"></span> será eliminado permanentemente del sistema.
                        </p>
                    </div>
                </div>
            </div>

            <form id="deleteUserForm" method="POST">
                @csrf
                @method('DELETE')
                
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeDeleteModal()" 
                            class="px-6 py-3 border border-stone-200 text-sm font-medium rounded-lg text-stone-700 bg-white hover:bg-stone-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-800 transition-all duration-200">
                        Cancelar
                    </button>
                    <button type="submit" 
                            class="px-6 py-3 border border-transparent text-sm font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200 shadow-lg">
                        <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Eliminar 
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal para editar usuario --}}
<div id="editUserModal" class="fixed inset-0 bg-stone-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border-0 shadow-2xl rounded-2xl w-96 bg-white">
        <div class="p-6">
            <div class="flex items-center mb-6">
                <div class="w-10 h-10 bg-stone-800 rounded-lg flex items-center justify-center mr-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-stone-800">Editar Usuario</h3>
            </div>
            
            <form id="editUserForm" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div>
                    <label for="edit_name" class="block text-sm font-medium text-stone-700 mb-2">Nombre</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <input type="text" id="edit_name" name="name" 
                               class="block w-full pl-10 pr-3 py-3 border border-stone-200 rounded-lg text-stone-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-stone-800 focus:border-transparent transition-all duration-200"
                               placeholder="Nombre completo">
                    </div>
                </div>
                
                <div>
                    <label for="edit_email" class="block text-sm font-medium text-stone-700 mb-2">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <input type="email" id="edit_email" name="email" 
                               class="block w-full pl-10 pr-3 py-3 border border-stone-200 rounded-lg text-stone-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-stone-800 focus:border-transparent transition-all duration-200"
                               placeholder="usuario@email.com">
                    </div>
                </div>
                
                <div>
                    <label for="edit_role" class="block text-sm font-medium text-stone-700 mb-2">Rol</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                            </svg>
                        </div>
                        <select id="edit_role" name="role" 
                                class="block w-full pl-10 pr-3 py-3 border border-stone-200 rounded-lg text-stone-900 focus:outline-none focus:ring-2 focus:ring-stone-800 focus:border-transparent transition-all duration-200">
                            <option value="{{ App\Models\User::ROLE_ADMIN }}">Administrador</option>
                            <option value="{{ App\Models\User::ROLE_CUSTOMER }}">Cliente</option>
                        </select>
                    </div>
                </div>
                
                <div class="flex justify-end space-x-4 pt-6 border-t border-stone-200">
                    <button type="button" onclick="closeEditModal()" 
                            class="px-6 py-3 border border-stone-200 text-sm font-medium rounded-lg text-stone-700 bg-white hover:bg-stone-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-800 transition-all duration-200">
                        Cancelar
                    </button>
                    <button type="submit" 
                            class="px-6 py-3 border border-transparent text-sm font-medium rounded-lg text-white bg-stone-800 hover:bg-stone-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-800 transition-all duration-200 shadow-lg">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editUser(id, name, email, role) {
    const modal = document.getElementById('editUserModal');
    const form = document.getElementById('editUserForm');
    
    // Configurar la acción del formulario
    form.action = `/admin/users/${id}`;
    
    // Llenar los campos del formulario
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_email').value = email;
    document.getElementById('edit_role').value = role;
    
    // Mostrar el modal
    modal.classList.remove('hidden');
}

function closeEditModal() {
    document.getElementById('editUserModal').classList.add('hidden');
}

function showDeleteModal(id, name) {
    const modal = document.getElementById('deleteUserModal');
    const form = document.getElementById('deleteUserForm');
    const nameSpan = document.getElementById('deleteUserName');
    
    // Configurar la acción del formulario
    form.action = `/admin/users/${id}`;
    
    // Mostrar el nombre del usuario en el modal
    nameSpan.textContent = name;
    
    // Mostrar el modal
    modal.classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteUserModal').classList.add('hidden');
}

// Cerrar modales al hacer clic fuera de ellos
document.getElementById('editUserModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeEditModal();
    }
});

document.getElementById('deleteUserModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDeleteModal();
    }
});

// Cerrar modales con la tecla Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeEditModal();
        closeDeleteModal();
    }
});
</script>
@endsection