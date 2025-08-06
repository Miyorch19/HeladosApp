{{-- resources/views/heladeria/contacto.blade.php --}}
@extends('layouts.app')

@section('title', 'Contacto - Heladería Artesanal')

@section('content')
{{-- Hero Section --}}
<section class="relative h-96 flex items-center justify-center overflow-hidden">
    {{-- Background Image --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('img/cnt.jpg') }}" 
             alt="Contacto - Heladería Gelato" 
             class="w-full h-full object-cover">
        {{-- Dark Overlay --}}
        <div class="absolute inset-0 bg-black/50"></div>
    </div>
    
    {{-- Hero Content --}}
    <div class="relative z-10 text-center text-white px-6 max-w-4xl mx-auto">
        <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6">
            Contáctanos
        </h1>
        <p class="text-xl md:text-2xl text-white/90 max-w-2xl mx-auto leading-relaxed">
            ¿Tienes alguna pregunta o comentario? Nos encantaría escucharte. Estamos aquí para ayudarte
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
                Información de Contacto
            </h2>
            <p class="text-lg text-stone-600 max-w-2xl mx-auto">
                Te ofrecemos múltiples formas de contactarnos. Elige la que más te convenga
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            {{-- Información de Contacto --}}
            <div class="space-y-6">
                {{-- Ubicación --}}
                <div class="group bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-stone-800 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-stone-700 transition-colors duration-200">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-stone-800 mb-2">Ubicación</h3>
                            <p class="text-stone-600 leading-relaxed">
                                Av. Principal #123<br>
                                Centro, Ciudad<br>
                                CP 12345
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Teléfono --}}
                <div class="group bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-stone-700 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-stone-600 transition-colors duration-200">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-stone-800 mb-2">Teléfono</h3>
                            <p class="text-stone-600">
                                <a href="tel:+52123456789" class="hover:text-stone-800 transition-colors duration-200">
                                    +52 123 456 7890
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Email --}}
                <div class="group bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-stone-600 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-stone-500 transition-colors duration-200">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-stone-800 mb-2">Email</h3>
                            <p class="text-stone-600">
                                <a href="mailto:info@gelato.com" class="hover:text-stone-800 transition-colors duration-200">
                                    info@gelato.com
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Horarios --}}
                <div class="group bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-stone-500 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-stone-400 transition-colors duration-200">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-stone-800 mb-2">Horarios de Atención</h3>
                            <div class="text-stone-600 space-y-1">
                                <p>Lun - Jue: 10:00 - 22:00</p>
                                <p>Vie - Sáb: 10:00 - 23:00</p>
                                <p>Domingo: 12:00 - 21:00</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Redes Sociales --}}
                <div class="bg-stone-50 rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-stone-800 mb-4">Síguenos en Redes Sociales</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="p-3 bg-white rounded-lg hover:bg-stone-100 transition-colors duration-200 shadow-sm group">
                            <svg class="w-5 h-5 text-stone-600 group-hover:text-stone-800" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="p-3 bg-white rounded-lg hover:bg-stone-100 transition-colors duration-200 shadow-sm group">
                            <svg class="w-5 h-5 text-stone-600 group-hover:text-stone-800" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z"/>
                            </svg>
                        </a>
                        <a href="#" class="p-3 bg-white rounded-lg hover:bg-stone-100 transition-colors duration-200 shadow-sm group">
                            <svg class="w-5 h-5 text-stone-600 group-hover:text-stone-800" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Formulario de Contacto --}}
            <div>
                <div class="bg-white rounded-2xl p-8 shadow-md">
                    <h2 class="text-2xl font-bold text-stone-800 mb-6">Envíanos un Mensaje</h2>
                    
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="" method="POST" class="space-y-6">
                        @csrf
                        
                        {{-- Nombre --}}
                        <div>
                            <label for="nombre" class="block text-sm font-medium text-stone-700 mb-2">
                                Nombre Completo *
                            </label>
                            <input type="text" 
                                   id="nombre" 
                                   name="nombre" 
                                   value="{{ old('nombre') }}"
                                   class="w-full px-4 py-3 border border-stone-200 rounded-lg text-stone-900 focus:outline-none focus:ring-2 focus:ring-stone-800 focus:border-transparent transition-all duration-200 @error('nombre') border-red-500 @enderror"
                                   required>
                            @error('nombre')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-sm font-medium text-stone-700 mb-2">
                                Correo Electrónico *
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   class="w-full px-4 py-3 border border-stone-200 rounded-lg text-stone-900 focus:outline-none focus:ring-2 focus:ring-stone-800 focus:border-transparent transition-all duration-200 @error('email') border-red-500 @enderror"
                                   required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Teléfono --}}
                        <div>
                            <label for="telefono" class="block text-sm font-medium text-stone-700 mb-2">
                                Teléfono (Opcional)
                            </label>
                            <input type="tel" 
                                   id="telefono" 
                                   name="telefono" 
                                   value="{{ old('telefono') }}"
                                   class="w-full px-4 py-3 border border-stone-200 rounded-lg text-stone-900 focus:outline-none focus:ring-2 focus:ring-stone-800 focus:border-transparent transition-all duration-200 @error('telefono') border-red-500 @enderror">
                            @error('telefono')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Mensaje --}}
                        <div>
                            <label for="mensaje" class="block text-sm font-medium text-stone-700 mb-2">
                                Mensaje *
                            </label>
                            <textarea id="mensaje" 
                                      name="mensaje" 
                                      rows="6"
                                      class="w-full px-4 py-3 border border-stone-200 rounded-lg text-stone-900 focus:outline-none focus:ring-2 focus:ring-stone-800 focus:border-transparent transition-all duration-200 resize-none @error('mensaje') border-red-500 @enderror"
                                      placeholder="Cuéntanos en qué podemos ayudarte..."
                                      required>{{ old('mensaje') }}</textarea>
                            @error('mensaje')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Botón de Envío --}}
                        <button type="submit" 
                                class="w-full px-8 py-4 bg-stone-800 text-white font-semibold rounded-lg hover:bg-stone-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-800 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            Enviar Mensaje
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Sección adicional --}}
        <div class="mt-20 bg-stone-50 rounded-2xl p-12 text-center">
            <h2 class="text-3xl font-bold text-stone-800 mb-4">
                ¿Prefieres visitarnos directamente?
            </h2>
            <p class="text-stone-600 mb-8 max-w-2xl mx-auto">
                Ven a nuestra heladería y disfruta de la experiencia completa. Nuestro equipo estará encantado de atenderte y ayudarte a elegir tu sabor favorito.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('heladeria.sabores') }}" 
                   class="px-8 py-4 bg-stone-800 text-white font-semibold rounded-lg hover:bg-stone-700 transition-colors duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    Ver Nuestros Sabores
                </a>
                <a href="{{ route('heladeria.promociones') }}" 
                   class="px-8 py-4 bg-white text-stone-700 font-semibold rounded-lg border border-stone-300 hover:bg-stone-50 transition-colors duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    Promociones Actuales
                </a>
            </div>
        </div>
    </div>
</div>
@endsection