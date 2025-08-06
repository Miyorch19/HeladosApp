{{-- resources/views/components/sidebar.blade.php --}}
<div x-data="{ sidebarOpen: false, sidebarCollapsed: false, adminMenuOpen: false, productosMenuOpen: false }" class="flex">
    {{-- Overlay --}}
    <div x-show="sidebarOpen" 
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false"
         class="fixed inset-0 z-20 bg-black bg-opacity-50 lg:hidden"></div>
    {{-- Sidebar --}}
    <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
         class="fixed inset-y-0 left-0 z-30 transform transition-all duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0 bg-white border-r border-stone-200"
         :style="{ width: sidebarCollapsed ? '80px' : '256px' }">
        {{-- Logo --}}
        <div class="flex items-center justify-between h-20 px-6 border-b border-stone-200">
            <div class="flex items-center space-x-3" x-show="!sidebarCollapsed">
                <div class="w-10 h-10 bg-stone-800 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"/>
                        <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <span class="text-xl font-bold text-stone-800">
                    Gelato
                </span>
            </div>
            {{-- Collapsed Logo --}}
            <div class="w-10 h-10 bg-stone-800 rounded-lg flex items-center justify-center mx-auto" x-show="sidebarCollapsed">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"/>
                    <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"/>
                </svg>
            </div>
            {{-- Toggle Button --}}
            <button @click="sidebarCollapsed = !sidebarCollapsed" 
                    class="hidden lg:block p-2 rounded-lg hover:bg-stone-100 transition-colors duration-200">
                <svg class="w-5 h-5 text-stone-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          :d="sidebarCollapsed ? 'M13 5l7 7-7 7M5 5l7 7-7 7' : 'M11 19l-7-7 7-7M21 19l-7-7 7-7'"/>
                </svg>
            </button>
        </div>
        {{-- Navigation --}}
        <nav class="mt-8 px-4">
            <div class="space-y-1">
                <a href="{{ route('home') }}" 
                   class="flex items-center px-4 py-3 text-stone-700 rounded-lg transition-all duration-200 group {{ request()->routeIs('home') ? 'bg-stone-100 text-stone-800' : 'hover:bg-stone-50' }}">
                    <svg class="w-5 h-5" :class="sidebarCollapsed ? 'mx-auto' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="font-medium" x-show="!sidebarCollapsed">Inicio</span>
                </a>
                
                {{-- Menú Productos con submenú --}}
                <div class="relative">
                    <button @click="productosMenuOpen = !productosMenuOpen" 
                            class="w-full flex items-center justify-between px-4 py-3 text-stone-700 rounded-lg transition-all duration-200 group {{ request()->routeIs('heladeria.productos.*') ? 'bg-stone-100 text-stone-800' : 'hover:bg-stone-50' }}">
                        <div class="flex items-center">
                            <svg class="w-5 h-5" :class="sidebarCollapsed ? 'mx-auto' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            <span class="font-medium" x-show="!sidebarCollapsed">Productos</span>
                        </div>
                        <svg class="w-4 h-4 transition-transform duration-200" 
                             :class="productosMenuOpen ? 'rotate-180' : ''"
                             x-show="!sidebarCollapsed"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    
                    {{-- Submenú de Productos --}}
                    <div x-show="productosMenuOpen && !sidebarCollapsed" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95"
                         class="mt-2 ml-4 space-y-1">
                        
                        <a href="#" {{-- Aquí puedes agregar la ruta general de productos --}}
                           class="flex items-center px-4 py-2 text-sm text-stone-600 rounded-lg transition-all duration-200 group hover:bg-stone-50">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                            <span class="font-medium">Todos los Productos</span>
                        </a>
                        
                        <a href="#" {{-- Ruta para helados --}}
                           class="flex items-center px-4 py-2 text-sm text-stone-600 rounded-lg transition-all duration-200 group hover:bg-stone-50">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                            <span class="font-medium">Helados</span>
                        </a>
                        
                        <a href="#" {{-- Ruta para paletas --}}
                           class="flex items-center px-4 py-2 text-sm text-stone-600 rounded-lg transition-all duration-200 group hover:bg-stone-50">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
                            </svg>
                            <span class="font-medium">Paletas</span>
                        </a>
                        
                        <a href="#" {{-- Ruta para malteadas --}}
                           class="flex items-center px-4 py-2 text-sm text-stone-600 rounded-lg transition-all duration-200 group hover:bg-stone-50">
                            <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                            <span class="font-medium">Malteadas</span>
                        </a>
                        
                    </div>
                </div>
                
                <a href="{{ route('heladeria.sabores') }}" 
                   class="flex items-center px-4 py-3 text-stone-700 rounded-lg transition-all duration-200 group {{ request()->routeIs('heladeria.sabores') ? 'bg-stone-100 text-stone-800' : 'hover:bg-stone-50' }}">
                    <svg class="w-5 h-5" :class="sidebarCollapsed ? 'mx-auto' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    <span class="font-medium" x-show="!sidebarCollapsed">Sabores</span>
                </a>
                <a href="{{ route('heladeria.promociones') }}" 
                   class="flex items-center px-4 py-3 text-stone-700 rounded-lg transition-all duration-200 group {{ request()->routeIs('heladeria.promociones') ? 'bg-stone-100 text-stone-800' : 'hover:bg-stone-50' }}">
                    <svg class="w-5 h-5" :class="sidebarCollapsed ? 'mx-auto' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                    <span class="font-medium" x-show="!sidebarCollapsed">Promociones</span>
                </a>
                <a href="{{ route('heladeria.contacto') }}" 
                   class="flex items-center px-4 py-3 text-stone-700 rounded-lg transition-all duration-200 group {{ request()->routeIs('heladeria.contacto') ? 'bg-stone-100 text-stone-800' : 'hover:bg-stone-50' }}">
                    <svg class="w-5 h-5" :class="sidebarCollapsed ? 'mx-auto' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span class="font-medium" x-show="!sidebarCollapsed">Contacto</span>
                </a>
                
                {{-- Separador --}}
                <div class="border-t border-stone-200 my-4"></div>
                
                {{-- Botones de autenticación o Dashboard --}}
                @auth
                    {{-- Dashboard para usuarios autenticados --}}
                    
                    {{-- Sección Admin (solo para administradores) --}}
                    @if(auth()->user() && auth()->user()->isAdmin())
                        {{-- Botón principal de Admin --}}
                        <div class="relative">
                            <button @click="adminMenuOpen = !adminMenuOpen" 
                                    class="w-full flex items-center justify-between px-4 py-3 text-stone-700 rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.*') ? 'bg-stone-100 text-stone-800' : 'hover:bg-stone-50' }}">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5" :class="sidebarCollapsed ? 'mx-auto' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span class="font-medium" x-show="!sidebarCollapsed">Administración</span>
                                </div>
                                <svg class="w-4 h-4 transition-transform duration-200" 
                                     :class="adminMenuOpen ? 'rotate-180' : ''"
                                     x-show="!sidebarCollapsed"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            
                            {{-- Submenú de Admin --}}
                            <div x-show="adminMenuOpen && !sidebarCollapsed" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 transform scale-95"
                                 x-transition:enter-end="opacity-100 transform scale-100"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 transform scale-100"
                                 x-transition:leave-end="opacity-0 transform scale-95"
                                 class="mt-2 ml-4 space-y-1">
                                
                                <a href="{{ route('admin.home') }}" 
                                   class="flex items-center px-4 py-2 text-sm text-stone-600 rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.home') ? 'bg-stone-50 text-stone-800' : 'hover:bg-stone-50' }}">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2zm0 0V5a2 2 0 012-2h6a2 2 0 012 2v2H3z"/>
                                    </svg>
                                    <span class="font-medium">Panel Principal</span>
                                </a>
                                
                                <a href="{{ route('admin.users') }}" 
                                   class="flex items-center px-4 py-2 text-sm text-stone-600 rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.users') ? 'bg-stone-50 text-stone-800' : 'hover:bg-stone-50' }}">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-.5a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                    <span class="font-medium">Usuarios</span>
                                </a>
                                
                                {{-- Productos Admin con submenú --}}
                                <div class="relative">
                                    <a href="{{route('admin.productos.productos')}}" 
                                       class="flex items-center px-4 py-2 text-sm text-stone-600 rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.productos.*') ? 'bg-stone-50 text-stone-800' : 'hover:bg-stone-50' }}">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                        </svg>
                                        <span class="font-medium">Gestión Productos</span>
                                    </a>
                                    
                                    {{-- Opciones específicas de productos admin --}}
                                    <div class="ml-6 mt-1 space-y-1">
                                        <a href="{{ route('admin.productos.helados') }}" 
                                           class="flex items-center px-3 py-1 text-xs text-stone-500 rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.productos.helados') ? 'bg-stone-50 text-stone-700' : 'hover:bg-stone-50' }}">
                                            <span>• Helados</span>
                                        </a>
                                        <a href="{{ route('admin.productos.paletas') }}" 
                                           class="flex items-center px-3 py-1 text-xs text-stone-500 rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.productos.paletas') ? 'bg-stone-50 text-stone-700' : 'hover:bg-stone-50' }}">
                                            <span>• Paletas</span>
                                        </a>
                                        <a href="{{ route('admin.productos.malteadas') }}" 
                                           class="flex items-center px-3 py-1 text-xs text-stone-500 rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.productos.malteadas') ? 'bg-stone-50 text-stone-700' : 'hover:bg-stone-50' }}">
                                            <span>• Malteadas</span>
                                        </a>
                                    </div>
                                </div>
                                
                                <a href="#" 
                                   class="flex items-center px-4 py-2 text-sm text-stone-600 rounded-lg transition-all duration-200 group hover:bg-stone-50">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                    </svg>
                                    <span class="font-medium">Reportes</span>
                                </a>
                                
                            </div>
                        </div>
                    @endif
                    
                    {{-- Cerrar Sesión --}}
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" 
                                class="w-full flex items-center px-4 py-3 text-red-600 rounded-lg transition-all duration-200 group hover:bg-red-50">
                            <svg class="w-5 h-5" :class="sidebarCollapsed ? 'mx-auto' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            <span class="font-medium" x-show="!sidebarCollapsed">Cerrar Sesión</span>
                        </button>
                    </form>
                @else
                    {{-- Botones de Login y Sign Up para usuarios no autenticados --}}
                    <a href="{{ route('login') }}" 
                       class="flex items-center px-4 py-3 text-stone-700 rounded-lg transition-all duration-200 group {{ request()->routeIs('login') ? 'bg-stone-100 text-stone-800' : 'hover:bg-stone-50' }}">
                        <svg class="w-5 h-5" :class="sidebarCollapsed ? 'mx-auto' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        <span class="font-medium" x-show="!sidebarCollapsed">Iniciar Sesión</span>
                    </a>
                    <a href="{{ route('register') }}" 
                       class="flex items-center px-4 py-3 text-white bg-stone-800 rounded-lg transition-all duration-200 group hover:bg-stone-700">
                        <svg class="w-5 h-5" :class="sidebarCollapsed ? 'mx-auto' : 'mr-3'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        <span class="font-medium" x-show="!sidebarCollapsed">Registrarse</span>
                    </a>
                @endauth
            </div>
        </nav>
    </div>
    {{-- Main Content --}}
    <div class="flex-1 lg:ml-0">
        {{-- Mobile menu button --}}
        <div class="lg:hidden">
            <button @click="sidebarOpen = true" 
                    class="fixed top-4 left-4 z-40 p-3 bg-white rounded-xl shadow-lg border border-stone-200">
                <svg class="w-6 h-6 text-stone-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
        {{-- Contenido principal --}}
        {{ $slot }}
    </div>
</div>