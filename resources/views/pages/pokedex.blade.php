<?php /** @var App\Models\PokemonBackup2 $pokemon */ ?>

@extends('layouts.default')

@section('content')

    @foreach( $pokemons as $pokemon )

        {{ $pokemon->getName() }}

    @endforeach

@stop