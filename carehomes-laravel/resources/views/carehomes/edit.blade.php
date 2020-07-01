@extends('layouts.app')

@section('title')
    <title>Edit Carehome</title>
@endsection

@section('content')

    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br/>
        @endif

        <div class="container">
            <form method="POST" action="{{ route('carehomes.update', $carehome->id) }}">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $carehome->name) }}"/>
                </div>

                <div class="form-group">
                    <label for="">Number of Beds</label>
                    <input type="text" class="form-control" name="number_beds"
                           value="{{ $carehome->number_beds }}"/>
                </div>

                <div class="form-group">
                    <label for="">Location ID</label>
                    <input type="number" class="form-control" name="location_id"
                           value="{{ $carehome->location_id }}"/>
                </div>

                <div class="form-group">
                    <label for="">Group ID</label>
                    <input type="number" class="form-control" name="group_id"
                           value="{{ $carehome->group_id }}"/>
                </div>

                <div class="form-group">
                    <label for="">Notes</label>
                    <input type="text" class="form-control" name="notes" value="{{ $carehome->notes }}"/>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('carehomes.show', $carehome->id)}}" class="btn btn-primary">Back</a>
            </form>
        </div>

    </div>

@endsection