@extends('layouts.app')

@section('title')
    <title>Edit Group</title>
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
            <form method="POST" action="{{ route('groups.update', $group->id) }}">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $group->name) }}"/>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('groups.show', $group->id)}}" class="btn btn-primary">Back</a>
            </form>
        </div>

    </div>

@endsection