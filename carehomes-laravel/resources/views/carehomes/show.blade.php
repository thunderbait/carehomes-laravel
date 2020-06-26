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

<div class="container">
    <!-- Carehome Details -->
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

    <!-- Contact Details -->

    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="https://www.kirkham-legal.co.uk/wp-content/uploads/2017/02/profile-placeholder.png" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$carehome->contact->name}}</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>

</div>
@endsection