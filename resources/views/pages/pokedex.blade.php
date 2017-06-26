<?php /** @var App\Models\PokemonBackup2 $pokemon */ ?>

@extends('layouts.pokif')

@section('content')

    @foreach( $pokemons as $pokemon )

        {{ $pokemon->getName() }}

    @endforeach

@stop