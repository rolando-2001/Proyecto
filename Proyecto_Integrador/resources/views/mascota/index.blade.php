@extends('adminlte::page')

@section('title', 'Agregar')

@section('content_header')
    
@stop
   @livewireStyles
@section('content')

@vite(['resources/css/app.css', 'resources/js/app.js'])

    <livewire:crear-mascota/>

@stop

@section('css')
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop