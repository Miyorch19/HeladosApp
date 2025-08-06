{{-- resources/views/admin/home-admin.blade.php --}}
@extends('layouts.app')

@section('title', 'Panel de Administración - Gelato')

@section('content')
<section class="relative h-screen flex items-center justify-center overflow-hidden bg-stone-800">

  {{-- Overlay oscuro --}}
  <div class="absolute inset-0 bg-black/60"></div>

  {{-- Contenedor centrado --}}
  <div class="relative z-10 flex flex-col items-center text-center text-white px-6 max-w-xl mx-auto space-y-8">
    
    {{-- Título --}}
    <h1 class="text-5xl md:text-6xl font-extrabold">
      En construcción...
    </h1>

    {{-- Descripción --}}
    <p class="text-xl md:text-2xl text-white/90 leading-relaxed">
      Pronto podrás administrar tus productos
    </p>

    {{-- Spinner minimalista --}}
    <div class="w-8 h-8 border-2 border-white border-t-transparent rounded-full animate-spin"></div>

  </div>
</section>
@endsection
