@extends('layouts.app')

@section('content')
@include('_modals.message')
    <p>Este es el contenido de la app</p>
    @include('layouts.experiences')
@endsection