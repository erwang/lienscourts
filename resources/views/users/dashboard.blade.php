@extends('home')


@section('content_header')
    <h1>Tableau de bord</h1>
@stop

@section('content')
    @include('_utils.messages')
    <div class="row">
        @include('users.formAddLink')
    </div>
    <div class="row">
        @include('users.links')
    </div>
@stop
