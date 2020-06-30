@extends('layouts.app')

@section('content')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/carehomes">Groups</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$group->name}}</li>
            </ol>
        </nav>
    </div>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">{{$group->name}}</h1>
        </div>
    </div>        

    <div class="row">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br/>
        @endif
    </div>

    <div class="container">

        <h2>Carehomes</h2>

        <div class="row">
            @foreach($group->carehomes as $carehome)
            <div class="col-4 col-sm-12 col-md-4 col-xl-4">
                @include('groups.widgets.carehomes')
            </div>
            @endforeach
        </div>

    </div>


@endsection