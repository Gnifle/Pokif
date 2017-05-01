@extends('layouts.default')

@push('lazy_scripts')
    <script type="text/javascript">
        console.log( 'Pokemon push works!' );
    </script>
@endpush

@section('content')

    {{ $pokemon }}

    {!! Form::open([ 'url' => 'foo/bar' ]) !!}

        Test

    {!! Form::close() !!}

@stop