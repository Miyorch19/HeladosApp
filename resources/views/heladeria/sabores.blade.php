{{-- resources/views/heladeria/sabores.blade.php --}}
@extends('layouts.app')

@section('title', 'Sabores - Heladería Artesanal')

@section('content')
{{-- Hero Section --}}
<section class="relative h-96 flex items-center justify-center overflow-hidden">
    {{-- Background Image --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('img/bck.jpeg') }}" 
             alt="Sabores Artesanales" 
             class="w-full h-full object-cover">
        {{-- Dark Overlay --}}
        <div class="absolute inset-0 bg-black/60"></div>
    </div>
    
    {{-- Hero Content --}}
    <div class="relative z-10 text-center text-white px-6 max-w-4xl mx-auto">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4">
            Nuestros Sabores
        </h1>
        <p class="text-lg md:text-xl text-white/90 max-w-2xl mx-auto leading-relaxed">
            Descubre nuestra exquisita variedad de helados artesanales, elaborados con ingredientes naturales y recetas tradicionales
        </p>
    </div>
</section>

{{-- Main Content --}}
<div class="px-6 py-16 lg:px-12 lg:py-20">
    <div class="max-w-6xl mx-auto">
        {{-- Categorías de Sabores --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-20">
            {{-- Categoría Clásicos --}}
            <div class="bg-white rounded-2xl p-8 shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="text-center mb-6">
                    <div class="w-16 h-16 bg-stone-800 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-stone-800">Clásicos</h3>
                    <p class="text-stone-600 text-sm mt-2">Los sabores de siempre, perfectos</p>
                </div>
                <ul class="space-y-4">
                    <li class="flex items-center justify-between p-3 bg-stone-50 rounded-lg">
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-stone-400 rounded-full mr-3"></span>
                            <span class="text-stone-700 font-medium">Vainilla Premium</span>
                        </div>
                        <span class="text-stone-500 text-sm">Popular</span>
                    </li>
                    <li class="flex items-center justify-between p-3 bg-stone-50 rounded-lg">
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-stone-400 rounded-full mr-3"></span>
                            <span class="text-stone-700 font-medium">Chocolate Belga</span>
                        </div>
                        <span class="text-stone-500 text-sm">Favorito</span>
                    </li>
                    <li class="flex items-center justify-between p-3 bg-stone-50 rounded-lg">
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-stone-400 rounded-full mr-3"></span>
                            <span class="text-stone-700 font-medium">Fresa Natural</span>
                        </div>
                        <span class="text-stone-500 text-sm">Temporada</span>
                    </li>
                    <li class="flex items-center justify-between p-3 bg-stone-50 rounded-lg">
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-stone-400 rounded-full mr-3"></span>
                            <span class="text-stone-700 font-medium">Cookies & Cream</span>
                        </div>
                        <span class="text-stone-500 text-sm">Nuevo</span>
                    </li>
                </ul>
            </div>

            {{-- Categoría Frutales --}}
            <div class="bg-white rounded-2xl p-8 shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="text-center mb-6">
                    <div class="w-16 h-16 bg-stone-700 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-stone-800">Frutales</h3>
                    <p class="text-stone-600 text-sm mt-2">Frescos y naturales</p>
                </div>
                <ul class="space-y-4">
                    <li class="flex items-center justify-between p-3 bg-stone-50 rounded-lg">
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-stone-500 rounded-full mr-3"></span>
                            <span class="text-stone-700 font-medium">Mango Tropical</span>
                        </div>
                        <span class="text-stone-500 text-sm">Exótico</span>
                    </li>
                    <li class="flex items-center justify-between p-3 bg-stone-50 rounded-lg">
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-stone-500 rounded-full mr-3"></span>
                            <span class="text-stone-700 font-medium">Maracuyá</span>
                        </div>
                        <span class="text-stone-500 text-sm">Tropical</span>
                    </li>
                    <li class="flex items-center justify-between p-3 bg-stone-50 rounded-lg">
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-stone-500 rounded-full mr-3"></span>
                            <span class="text-stone-700 font-medium">Limón Siciliano</span>
                        </div>
                        <span class="text-stone-500 text-sm">Refrescante</span>
                    </li>
                    <li class="flex items-center justify-between p-3 bg-stone-50 rounded-lg">
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-stone-500 rounded-full mr-3"></span>
                            <span class="text-stone-700 font-medium">Cereza Dulce</span>
                        </div>
                        <span class="text-stone-500 text-sm">Dulce</span>
                    </li>
                </ul>
            </div>

            {{-- Categoría Especiales --}}
            <div class="bg-white rounded-2xl p-8 shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="text-center mb-6">
                    <div class="w-16 h-16 bg-stone-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-stone-800">Especiales</h3>
                    <p class="text-stone-600 text-sm mt-2">Creaciones únicas</p>
                </div>
                <ul class="space-y-4">
                    <li class="flex items-center justify-between p-3 bg-stone-50 rounded-lg">
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-stone-600 rounded-full mr-3"></span>
                            <span class="text-stone-700 font-medium">Pistacho Siciliano</span>
                        </div>
                        <span class="text-stone-500 text-sm">Premium</span>
                    </li>
                    <li class="flex items-center justify-between p-3 bg-stone-50 rounded-lg">
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-stone-600 rounded-full mr-3"></span>
                            <span class="text-stone-700 font-medium">Tiramisú</span>
                        </div>
                        <span class="text-stone-500 text-sm">Italiano</span>
                    </li>
                    <li class="flex items-center justify-between p-3 bg-stone-50 rounded-lg">
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-stone-600 rounded-full mr-3"></span>
                            <span class="text-stone-700 font-medium">Dulce de Leche</span>
                        </div>
                        <span class="text-stone-500 text-sm">Argentino</span>
                    </li>
                    <li class="flex items-center justify-between p-3 bg-stone-50 rounded-lg">
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-stone-600 rounded-full mr-3"></span>
                            <span class="text-stone-700 font-medium">Lavanda & Miel</span>
                        </div>
                        <span class="text-stone-500 text-sm">Artesanal</span>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Sección de información adicional --}}
        <div class="bg-stone-50 rounded-2xl p-12 mb-16">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-stone-800 mb-4">
                    Ingredientes de Primera Calidad
                </h2>
                <p class="text-lg text-stone-600 max-w-3xl mx-auto">
                    Cada helado está elaborado con ingredientes cuidadosamente seleccionados, sin conservantes artificiales ni colorantes. Nuestro compromiso es ofrecerte la mejor experiencia de sabor en cada cucharada.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-12 h-12 bg-stone-700 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-stone-800 mb-2">100% Natural</h3>
                    <p class="text-stone-600 text-sm">Sin conservantes ni aditivos artificiales</p>
                </div>
                
                <div class="text-center">
                    <div class="w-12 h-12 bg-stone-700 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-stone-800 mb-2">Recién Hecho</h3>
                    <p class="text-stone-600 text-sm">Preparado diariamente en nuestro taller</p>
                </div>
                
                <div class="text-center">
                    <div class="w-12 h-12 bg-stone-700 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-stone-800 mb-2">Calidad Premium</h3>
                    <p class="text-stone-600 text-sm">Ingredientes importados de origen</p>
                </div>
            </div>
        </div>

        {{-- Call to Action --}}
        <div class="text-center bg-white rounded-2xl p-12 shadow-md">
            <h2 class="text-3xl font-bold text-stone-800 mb-4">
                ¿Listo para probar nuestros sabores?
            </h2>
            <p class="text-stone-600 mb-8 max-w-2xl mx-auto">
                Visítanos en nuestra heladería y descubre por qué somos la elección favorita para los amantes del helado artesanal.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('heladeria.contacto') }}" 
                   class="px-8 py-4 bg-stone-800 text-white font-semibold rounded-lg hover:bg-stone-700 transition-colors duration-200 shadow-md">
                    Ubicación y Horarios
                </a>
                <a href="{{ route('heladeria.promociones') }}" 
                   class="px-8 py-4 bg-white text-stone-700 font-semibold rounded-lg border border-stone-300 hover:bg-stone-50 transition-colors duration-200 shadow-md">
                    Ver Promociones
                </a>
            </div>
        </div>
    </div>
</div>
@endsection