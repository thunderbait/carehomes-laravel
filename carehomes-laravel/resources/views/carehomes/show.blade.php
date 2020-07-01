@extends('layouts.app')

@section('content')

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/carehomes">Carehomes</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$carehome->name}}</li>
        </ol>
    </nav>
</div>

@include('carehomes.widgets.jumbotron')

<div class="container">
    <h2>Carehome Notes</h2>
    <p>{{ $carehome->notes }}</p>
    </br>
</div>

<div class="container">
    <div class="row">
        @foreach($carehome->contacts as $contact)
        <div class="col-3">
            @include('carehomes.widgets.contacts')
        </div>
        @endforeach
    </div>
</div>


@endsection