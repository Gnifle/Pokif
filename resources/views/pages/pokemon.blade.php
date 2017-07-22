<?php /** @var \App\Models\Pokemon $pokemon */ ?>

@extends('layouts.pokif')

@section('content')
	
	{{-- Name --}}
	<p>Name: {{ $pokemon->name }}</p>
	{{-- Picture --}}
	<p>
		<img src="{{ Sprite::url( $pokemon->sprites, 'pokemon', 'front_default' ) }}" alt="{{ $pokemon->name }}">
		<img src="{{ Sprite::url( $pokemon->sprites, 'pokemon', 'front_female' ) }}" alt="{{ $pokemon->name }} Female">
		<img src="{{ Sprite::url( $pokemon->sprites, 'pokemon', 'front_shiny' ) }}" alt="{{ $pokemon->name }}">
		<img src="{{ Sprite::url( $pokemon->sprites, 'pokemon', 'front_shiny_female' ) }}" alt="{{ $pokemon->name }}">
		<img src="{{ Sprite::url( $pokemon->sprites, 'pokemon', 'back_default' ) }}" alt="{{ $pokemon->name }}">
		<img src="{{ Sprite::url( $pokemon->sprites, 'pokemon', 'back_female' ) }}" alt="{{ $pokemon->name }} Female">
		<img src="{{ Sprite::url( $pokemon->sprites, 'pokemon', 'back_shiny' ) }}" alt="{{ $pokemon->name }}">
		<img src="{{ Sprite::url( $pokemon->sprites, 'pokemon', 'back_shiny_female' ) }}" alt="{{ $pokemon->name }} Female">
	</p>
	{{-- Classification --}}
	<p>Classification: {{ $pokemon->classification }}</p>
	{{-- Other names --}}
	<p>
		<ul>
			@foreach( $pokemon->name( 'all' ) as $name )
			
				<li>{{ $name->locale_name }} ({{ $name->locale }}): {{ $name->value }}</li>
				
			@endforeach
		</ul>
	</p>
	{{-- Pokedex entries --}}
	{{-- Gender ratio --}}
	{{-- Type(s) --}}
	{{-- Height --}}
	{{-- Weight --}}
	{{-- Capture rate --}}
	{{-- Base Egg steps --}}
	{{-- Abilities --}}
	{{-- Experience growth --}}
	{{-- Base happiness --}}
	{{-- Effort values earned --}}
	{{-- SOS calling --}}
	{{-- Damage taken --}}
	{{-- Wild held item --}}
	{{-- Egg groups --}}
	{{-- Evolution chain --}}
	{{-- Locations --}}
	{{-- Level-up moves --}}
	{{-- TM/HM --}}
	{{-- Egg Moves --}}
	{{-- Move Tutor --}}
	{{-- Usable Z-moves --}}
	{{-- Transfer moves --}}
	{{-- Stats --}}
	{{-- Previous Pokemon --}}
	{{-- Next Pokemon --}}

@stop