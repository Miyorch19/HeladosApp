{{-- resources/views/heladeria/promociones.blade.php --}}
@extends('layouts.app')

@section('title', 'Promociones - Heladería Artesanal')

@section('content')
{{-- Hero Section --}}
<section class="relative h-96 flex items-center justify-center overflow-hidden">
    {{-- Background Image --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('img/pro.jpg') }}" 
             alt="Promociones Especiales" 
             class="w-full h-full object-cover">
        {{-- Dark Overlay --}}
        <div class="absolute inset-0 bg-black/50"></div>
    </div>
    
    {{-- Hero Content --}}
    <div class="relative z-10 text-center text-white px-6 max-w-4xl mx-auto">
        <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6">
            Promociones Especiales
        </h1>
        <p class="text-xl md:text-2xl text-white/90 max-w-2xl mx-auto leading-relaxed">
            Aprovecha nuestras increíbles ofertas y disfruta de los mejores helados artesanales al mejor precio
        </p>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10">
        <div class="animate-bounce">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </div>
</section>

{{-- Main Content --}}
<div class="px-6 py-20 lg:px-12 lg:py-24 bg-white">
    <div class="max-w-6xl mx-auto">
        {{-- Título de sección --}}
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-stone-800 mb-4">
                Ofertas Irresistibles
            </h2>
            <p class="text-lg text-stone-600 max-w-2xl mx-auto">
                Descubre nuestras promociones especiales y disfruta más por menos
            </p>
        </div>

        {{-- Promociones Grid --}}
        <div class="space-y-8 mb-20">
            {{-- Promoción 1: 2x1 --}}
            <div class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center p-8 lg:p-12">
                    <div class="lg:col-span-2">
                        <div class="inline-flex items-center bg-red-100 text-red-700 px-4 py-2 rounded-lg text-sm font-semibold mb-4">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                            OFERTA ESPECIAL
                        </div>
                        <h3 class="text-3xl lg:text-4xl font-bold text-stone-800 mb-4">
                            2 x 1 en Helados Clásicos
                        </h3>
                        <p class="text-stone-600 text-lg mb-6 leading-relaxed">
                            Lleva dos helados de nuestros sabores clásicos (Vainilla, Chocolate, Fresa) y paga solo uno. 
                            Válido de lunes a miércoles.
                        </p>
                        <div class="flex items-center text-sm text-stone-500">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Válido hasta fin de mes
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="w-32 h-32 bg-stone-800 rounded-full flex items-center justify-center mx-auto shadow-lg">
                            <span class="text-4xl font-bold text-white">2x1</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Promoción 2: Descuento Familiar --}}
            <div class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center p-8 lg:p-12">
                    <div class="lg:col-span-2">
                        <div class="inline-flex items-center bg-stone-100 text-stone-700 px-4 py-2 rounded-lg text-sm font-semibold mb-4">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            DESCUENTO FAMILIAR
                        </div>
                        <h3 class="text-3xl lg:text-4xl font-bold text-stone-800 mb-4">
                            30% OFF en Compras Familiares
                        </h3>
                        <p class="text-stone-600 text-lg mb-6 leading-relaxed">
                            En compras de 4 helados o más, obtén un 30% de descuento. 
                            Perfecto para compartir en familia o con amigos.
                        </p>
                        <div class="flex items-center text-sm text-stone-500">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Aplica fines de semana
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="w-32 h-32 bg-stone-700 rounded-full flex items-center justify-center mx-auto shadow-lg">
                            <span class="text-3xl font-bold text-white">30%</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Promoción 3: Tarjeta de Fidelidad --}}
            <div class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center p-8 lg:p-12">
                    <div class="lg:col-span-2">
                        <div class="inline-flex items-center bg-green-100 text-green-700 px-4 py-2 rounded-lg text-sm font-semibold mb-4">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            CLIENTE FRECUENTE
                        </div>
                        <h3 class="text-3xl lg:text-4xl font-bold text-stone-800 mb-4">
                            Tarjeta de Fidelidad
                        </h3>
                        <p class="text-stone-600 text-lg mb-6 leading-relaxed">
                            Compra 10 helados y el 11° es gratis. Acumula sellos en tu tarjeta de fidelidad 
                            y disfruta de helados gratuitos.
                        </p>
                        <div class="flex items-center text-sm text-stone-500">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                            Programa permanente
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="w-32 h-32 bg-stone-600 rounded-full flex items-center justify-center mx-auto shadow-lg">
                            <span class="text-lg font-bold text-white">11° GRATIS</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sección de información adicional --}}
        <div class="bg-stone-50 rounded-2xl p-12 mb-16">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-stone-800 mb-4">
                    ¿Cómo Funcionan Nuestras Promociones?
                </h2>
                <p class="text-lg text-stone-600 max-w-3xl mx-auto">
                    Es muy fácil aprovechar nuestras ofertas especiales. Solo presenta este cupón en nuestra heladería y disfruta de los descuentos.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-12 h-12 bg-stone-700 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold">1</span>
                    </div>
                    <h3 class="text-lg font-semibold text-stone-800 mb-2">Elige tu Promoción</h3>
                    <p class="text-stone-600 text-sm">Selecciona la oferta que más te convenga</p>
                </div>
                
                <div class="text-center">
                    <div class="w-12 h-12 bg-stone-700 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold">2</span>
                    </div>
                    <h3 class="text-lg font-semibold text-stone-800 mb-2">Visítanos</h3>
                    <p class="text-stone-600 text-sm">Ven a nuestra heladería y menciona la promoción</p>
                </div>
                
                <div class="text-center">
                    <div class="w-12 h-12 bg-stone-700 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold">3</span>
                    </div>
                    <h3 class="text-lg font-semibold text-stone-800 mb-2">Disfruta</h3>
                    <p class="text-stone-600 text-sm">Aprovecha el descuento y disfruta tus helados</p>
                </div>
            </div>
        </div>

        {{-- Call to Action --}}
        <div class="text-center bg-white rounded-2xl p-12 shadow-md">
            <h2 class="text-3xl font-bold text-stone-800 mb-4">
                ¡No te pierdas estas ofertas!
            </h2>
            <p class="text-stone-600 mb-8 max-w-2xl mx-auto">
                Visítanos hoy mismo y aprovecha nuestras promociones especiales. 
                Los mejores helados artesanales te están esperando.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('heladeria.contacto') }}" 
                   class="px-8 py-4 bg-stone-800 text-white font-semibold rounded-lg hover:bg-stone-700 transition-colors duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    Visítanos Ahora
                </a>
                <a href="{{ route('heladeria.sabores') }}" 
                   class="px-8 py-4 bg-white text-stone-700 font-semibold rounded-lg border border-stone-300 hover:bg-stone-50 transition-colors duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    Ver Sabores
                </a>
            </div>
        </div>
    </div>
</div>
@endsection