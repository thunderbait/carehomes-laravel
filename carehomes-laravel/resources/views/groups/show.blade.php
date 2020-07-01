@extends('layouts.app')

@section('content')

    

    <div class="container">
        <div class="row">
        <div class="col-12">
            @if(session()->get('success'))
                <div class="alert alert-success" style="text-align:center">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div></div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/carehomes">Groups</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$group->name}}</li>
            </ol>
        </nav>
    </div>
    @include('groups.widgets.jumbotron')  


    
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