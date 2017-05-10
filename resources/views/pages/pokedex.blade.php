<?php /** @var App\Models\Pokemon $pokemon */ ?>

@extends('layouts.default')

@section('content')

    @foreach( $pokemons as $pokemon )

        {{ $pokemon->getName() }}

    @endforeach

@stop