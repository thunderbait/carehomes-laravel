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

<!-- Carehome Jumbotron -->
<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">{{$carehome->name}}</h1>
            <p class="lead">{{$carehome->location->name}}</p>
        </div>
    </div>
</div>

<!-- Carehome Details -->
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Group</th>
                <th>No.Beds</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$carehome->id}}</td>
                <td><a href="{{route('groups.show', $carehome->group_id)}}">{{$carehome->group->name}}</td>
                <td>{{$carehome->number_beds}}</td>
            </tr>
        </tbody>
    </table>
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