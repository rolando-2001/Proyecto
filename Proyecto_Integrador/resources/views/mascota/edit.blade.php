@extends('adminlte::page')

@section('title', 'Agregar')

@section('content_header')

@stop


@section('content')
    @livewireStyles

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <livewire:editar-mascota :mascota="$mascota" />
    @livewireScripts

   
@stop

@section('css')
    
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
