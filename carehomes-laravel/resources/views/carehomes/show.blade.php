@extends('layouts.app')

@section('content')

<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">{{$carehome->name}}</h1>
            <p class="lead">{{$carehome->location->name}}</p>
        </div>
    </div>
</div>

@endsection