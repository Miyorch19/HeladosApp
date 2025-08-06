{{-- resources/views/admin/productos/paletas.blade.php --}}
@extends('layouts.app')

@section('title', 'Gestión de Paletas - Admin')

@section('content')
<section class="relative h-screen flex items-center justify-center overflow-hidden bg-stone-800">
  
  {{-- Fondo y Overlay --}}
  <div class="absolute inset-0 z-0">
    <div class="absolute inset-0 bg-black/60"></div>
  </div>

  {{-- Contenido Principal --}}
  <div class="relative z-10 text-center text-white px-6 max-w-2xl mx-auto space-y-12">
      
    {{-- Título --}}
    <h1 class="text-5xl md:text-6xl font-extrabold">
      En construcción...
    </h1>

    {{-- Texto Secundario --}}
    <p class="text-xl md:text-2xl text-white/90 leading-relaxed">
      Las paletas están en su punto de congelación.  
      Muy pronto podrás gestionarlas desde este panel.
    </p>

    {{-- Spinner minimalista --}}
    <div class="w-8 h-8 border-2 border-white border-t-transparent rounded-full animate-spin mx-auto"></div>

  </div>
</section>
@endsection
