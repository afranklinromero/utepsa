<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apuntes</title>
    <link rel="stylesheet" href="{{ asset('css/notes.css') }}"> <!-- Vinculo al CSS para el editor de texto -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
{{--     @extends('layouts.app') --}}
{{-- @section('content') --}}
<div class="notes" id="app"> <!-- Contenedor principal para la aplicacion de apuntes -->
    <div class="notes__sidebar"> <!-- Sidebar -->
        <button class="notes__add" type="button">Nuevo Apunte</button> <!-- Boton para crear un nuevo apunte -->
        <div class="notes__list"> <!-- Contenedor para la lista de apuntes -->
            @foreach($notes as $note)
            <div class="notes__list-item" data-id="{{ $note->IDNota }}"> <!-- Item de apunte individual -->
                <div class="notes__small-title">{{ $note->Titulo }}</div> <!-- Titulo del apunte -->
                <div class="notes__small-body">{{ Str::limit($note->Contenido, 50) }}</div> <!-- Preview del body del apunte -->
                <div class="notes__small-updated">{{ $note->updated_at->format('l g:iA') }}</div> <!-- Fecha de la ultima modificacion -->
                <button class="notes__delete" type="button">Eliminar</button> <!-- Boton para eliminar-->
            </div>
            @endforeach
        </div>
    </div>
    <div class="notes__preview"> <!-- Area principal para preview y editar el apunte seleccionado -->
        <input class="notes__title" type="text" placeholder="Ingresar un titulo..."> <!-- Campo de ingreso para el titulo del apunte -->
        <textarea class="notes__body" placeholder="Lorem ipsum dolor sit amet..."></textarea> <!-- Campo de ingreso para el body del apunte -->
        <button class="notes__save" type="button">Guardar</button>
    </div>
</div>
{{-- @endsection --}}
    <script src="{{ asset('js/notes.js') }}"></script> <!-- Vinculo al archivo de js para esta pagina -->
</body>
</html>