@extends('adminlte::page')

@section('title', 'Agregar')

@section('content_header')

@stop

@section('content')
    @livewireStyles
    @stack('styles')


    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @if (session()->has('mensaje'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-y my-3">
            {{ session('mensaje') }}
        </div>
    @endif

    <livewire:mostrar-mascotas />

    @livewireScripts
    @stack('scripts')

@stop

@section('css')
    {{--<link rel="stylesheet" href="/css/admin_custom.css">--}}
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
