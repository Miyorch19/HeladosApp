@extends('layouts.app')

@section('title', 'Heladería Artesanal')

@section('content')
<section class="relative h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('img/cream.jpg') }}" 
             alt="Helado Artesanal" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/50"></div>
    </div>
    
    <div class="relative z-10 text-center text-white px-6 max-w-4xl mx-auto">
        <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold mb-6">
            Helados Artesanales
        </h1>
        <p class="text-xl md:text-2xl text-white/90 mb-12 max-w-2xl mx-auto leading-relaxed">
            Sabores únicos creados con ingredientes naturales y mucho amor. 
            Cada helado es una experiencia inolvidable.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('heladeria.sabores') }}" 
               class="px-10 py-4 bg-white text-stone-800 font-semibold rounded-lg hover:bg-stone-100 transition-colors duration-200 shadow-lg text-lg">
                Explorar Sabores
            </a>
            <a href="{{ route('heladeria.promociones') }}" 
               class="px-10 py-4 bg-transparent text-white font-semibold rounded-lg border-2 border-white hover:bg-white hover:text-stone-800 transition-all duration-200 text-lg">
                Ver Promociones
            </a>
        </div>
    </div>
    
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10">
        <div class="animate-bounce">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </div>
</section>

{{-- Featured Products --}}
<section class="px-6 py-20 lg:px-12 lg:py-24 bg-white">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-stone-800 mb-4">
                Nuestros Favoritos
            </h2>
            <p class="text-lg text-stone-600 max-w-2xl mx-auto">
                Descubre nuestra selección de sabores más populares, cada uno preparado con técnicas artesanales tradicionales
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Product Card 1 - Fresa --}}
            <div class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('img/berry.jpg') }}" 
                         alt="Helado de Fresa" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-stone-800 mb-3">Fresa Artesanal</h3>
                    <p class="text-stone-600 mb-6 leading-relaxed">Cremoso helado de fresa natural con trozos de fruta fresca seleccionada</p>
                    <button class="w-full px-6 py-3 bg-stone-100 text-stone-700 font-medium rounded-lg hover:bg-stone-200 transition-colors duration-200">
                        Ver Más
                    </button>
                </div>
            </div>

            {{-- Product Card 2 - Vainilla --}}
            <div class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('img/van.jpg') }}" 
                         alt="Helado de Vainilla" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-stone-800 mb-3">Vainilla Premium</h3>
                    <p class="text-stone-600 mb-6 leading-relaxed">Clásico sabor vainilla con vaina de Madagascar auténtica</p>
                    <button class="w-full px-6 py-3 bg-stone-100 text-stone-700 font-medium rounded-lg hover:bg-stone-200 transition-colors duration-200">
                        Ver Más
                    </button>
                </div>
            </div>

            {{-- Product Card 3 - Chocolate --}}
            <div class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('img/choc.jpg') }}" 
                         alt="Helado de Chocolate" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-stone-800 mb-3">Chocolate Belga</h3>
                    <p class="text-stone-600 mb-6 leading-relaxed">Intenso chocolate belga con cacao de primera calidad</p>
                    <button class="w-full px-6 py-3 bg-stone-100 text-stone-700 font-medium rounded-lg hover:bg-stone-200 transition-colors duration-200">
                        Ver Más
                    </button>
                </div>
            </div>

            {{-- Product Card 4 - Pistacho --}}
            <div class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('img/pist.jpg') }}" 
                         alt="Helado de Pistacho" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-stone-800 mb-3">Pistacho Siciliano</h3>
                    <p class="text-stone-600 mb-6 leading-relaxed">Exquisito helado de pistacho con nueces sicilianas</p>
                    <button class="w-full px-6 py-3 bg-stone-100 text-stone-700 font-medium rounded-lg hover:bg-stone-200 transition-colors duration-200">
                        Ver Más
                    </button>
                </div>
            </div>

            {{-- Product Card 5 - Mango --}}
            <div class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('img/mang.jpg') }}" 
                         alt="Helado de Mango" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-stone-800 mb-3">Mango Tropical</h3>
                    <p class="text-stone-600 mb-6 leading-relaxed">Refrescante helado de mango con pulpa natural</p>
                    <button class="w-full px-6 py-3 bg-stone-100 text-stone-700 font-medium rounded-lg hover:bg-stone-200 transition-colors duration-200">
                        Ver Más
                    </button>
                </div>
            </div>

            {{-- Product Card 6 - Cereza --}}
            <div class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('img/che.jpg') }}" 
                         alt="Helado de Cereza" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-stone-800 mb-3">Cereza Dulce</h3>
                    <p class="text-stone-600 mb-6 leading-relaxed">Delicioso helado de cereza con trozos de fruta</p>
                    <button class="w-full px-6 py-3 bg-stone-100 text-stone-700 font-medium rounded-lg hover:bg-stone-200 transition-colors duration-200">
                        Ver Más
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection