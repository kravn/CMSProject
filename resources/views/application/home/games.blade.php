@extends('layouts.application')

@section('title'){{ getTitle() }}@endsection
@section('description'){{ getDescription() }}@endsection

@section('content')
    <h1>{{ $games }}</h1>
    <div class="container">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav menu" id="mainmenu"></ul>
        </div>
    </div>
@endsection