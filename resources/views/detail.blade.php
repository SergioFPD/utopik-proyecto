@extends('layouts.app')

@section('navMenu')
    @include('menus.nav-menu')
@endsection

@section('content')
@include('_modals.reserve-form')
@include('_modals.message')
    @include('layouts.exp-detail')
@endsection