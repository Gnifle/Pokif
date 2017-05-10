<?php /** @var App\Models\Pokemon $pokemon */ ?>

@extends('layouts.default')

@push('scripts')
<script type="text/javascript" src="{{ URL::asset( 'js/importer.js' ) }}"></script>
@endpush

@push('lazy_scripts')
<script type="text/javascript">
	console.log('Pokemon push works!');
</script>
@endpush

@section('content')

    {{ $pokemon->getName() }}

    {!! Form::open([ 'action' => [ 'PokemonController@import' ] ]) !!}

    {!! Form::label( 'pokemon_number', 'Test' ) !!}
    {!! Form::number( 'pokemon_number' ) !!}

    {!! Form::submit( 'Import' ) !!}

    {!! Form::close() !!}

@stop