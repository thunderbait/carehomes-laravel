@extends('layouts.app')

@section('title')
    <title>{{$carehome->name}}</title>
@endsection

@section('content')

    <div class="container">

        <div class="row">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br/>
            @endif
        </div>

        <h1>{{$carehome->name}}</h1>
        
        <div class="col-12">
        	<p><b>Number of Beds:</b> {{$carehome->number_beds}}</p>
        	<p><b>Location ID:</b> {{$carehome->location->name}}</p>
        	<p><b>Group ID:</b> {{$carehome->group_id}}</p>
            <p><b>Notes:</b> {{$carehome->notes}}</p>
        </div>

    </div>

@endsection