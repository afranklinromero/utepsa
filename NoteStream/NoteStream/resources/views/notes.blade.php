<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apuntes</title>
    <link rel="stylesheet" href="{{ asset('css/notes.css') }}"> <!-- Vinculo al CSS para el editor de texto -->
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="notes" id="app"> <!-- Contenedor principal para la aplicacion de apuntes -->
        <div class="notes__sidebar"> <!-- Sidebar -->
            <a href="{{ route('notes.create') }}"><button class="notes__add" type="button">Nuevo Apunte</button></a> <!-- Boton para crear un nuevo apunte -->
            <div class="notes__list"> <!-- Contenedor para la lista de apuntes -->
                @foreach($notes as $note)
                <div class="notes__list-item notes__list-item--selected"> <!-- Item de apunte individual, marcado como seleccionado -->
                    <a href="{{ route('notes.show', $note->id }}"><div class="notes__small-title">{{ $note->title }}</div></a> <!-- Titulo del apunte -->
                    <a href="{{ route('notes.edit', $note->id }}"><div class="notes__small-body">Edit</div></a> <!-- Preview del body del apunte -->
                    <div class="notes__small-updated">Jueves 3:30pm</div> <!-- Fecha de la ultima modificacion -->
                </div>
            </div>
        </div>
        <div class="notes__preview"> <!-- Area principal para preview y editar el apunte seleccionado -->
            <input class="notes__title" type="text" placeholder="Ingresar un titlo..."> <!-- Campo de ingreso para el titulo del apunte -->
            <textarea class="notes__body" placeholder="Lorem ipsum dolor sit amet..."></textarea> <!-- Campo de ingreso para el body del apunte -->
        </div>
    </div> 
    <script src="{{ asset('js/notes.ts') }}" type="module"></script> <!-- Vinculo al archivo de js para esta pagina -->
</body>
</html>