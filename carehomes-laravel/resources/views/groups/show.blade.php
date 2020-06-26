@extends('layouts.app')

@section('content')

<div class="container">

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

        <h2>Carehomes</h2>
        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>No.Beds</th>
                    <th>Notes</th>
                </tr>
                </thead>
                <tbody>
                     @foreach($group->carehomes as $carehome)
                	<tr>
                        <td><a href="{{route('carehomes.show', $carehome->id)}}">{{$carehome->id}}</a></td>
                        <td>{{$carehome->name}}</td>
                        <td>{{$carehome->location->name}}</td>
                        <td>{{$carehome->number_beds}}</td>
                        <td>{{$carehome->notes}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>        
</div>

@endsection