@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::get('success'))
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="..." class="rounded mr-2" alt="...">
                    <strong class="mr-auto">Welcome Back!</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    {{session('success')}}
                </div>
            </div>
        </div>
    </div>
    @endif
    <br>

    <h2> Toolz </h2>

    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
            <div class="card-header">Carehomey (DB)</div>
            <div class="card-body">
                <h5 class="card-title">mySQL Carehome Database</h5>
                <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                <a href="{{route('carehomes.index')}}" class="card-link">Browse DB</a>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
            <div class="card-header">R.O.I Calculator</div>
            <div class="card-body">
                <h5 class="card-title">R.O.I Calculator</h5>
                <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                <p class="card-text">These are the ROIs you are looking for</p>
                <a href="#" class="card-link">Disabled</a>
            </div>
            </div>
        </div>
    </div>



</div>
@endsection
