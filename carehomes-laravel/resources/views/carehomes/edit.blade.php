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
                    <label for="">Location</label>
                    <input id="search" type="text" class="form-control" placeholder="Search" onkeyup="filterList(this.value, 'select')">
                    <select  id="select" size="3" type="text" class="form-control" name="location_id">
                        <option value="{{ old('location_id', $carehome->location_id) }}" selected>{{ !empty($carehome->location) ? $carehome->location->name : "N/A"}}</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group groups-app">
                    <label for="group">Group</label>
                    <input id="search2" type="text" class="form-control" placeholder="Search" onkeyup="filterList(this.value, 'select2')">
                    <select id="select2" size="3" type="text" class="form-control" name="group" @click="loadIfNotLoaded">
                        <option value="{{old($carehome->group_id)}}" selected>
                            {{!empty($carehome->group) ? $carehome->group->name : "N/A"}}
                        </option>
                        <option v-if="loading" value="-1">
                            Loading...
                        </option>
                        <option
                            v-for="group in groups"
                            :value="group.id"
                            v-text="group.name">
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Notes</label>
                    <textarea type="text" class="form-control" rows="5" name="notes">{{ old('notes', $carehome->notes) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('carehomes.show', $carehome->id)}}" class="btn btn-primary">Back</a>
            </form>
        </div>
    </div>

    <script>
        function filterList(keyword, id) {
            var select = document.getElementById(id);
            for (var i = 0; i < select.length; i++) {
                var txt = select.options[i].text;
                var include = txt.toLowerCase().includes(keyword.toLowerCase());
                select.options[i].style.display = include ? '':'none';
            }
        }

        new Vue({
            el: '.groups-app',
            data: function () {
                return {
                    groups: [],
                    loading: false
                }
            },

            methods: {

                loadIfNotLoaded: function () {
                    if (!this.groups.length && !this.loading)
                        this.loadGroups();
                },

                loadGroups: function () {
                    var that = this;
                    this.loading = true;
                    $.get('/groups-api', function (groups) {
                        that.groups = groups;
                    }).always(function () {
                        that.loading = false;
                    });
                }
            }
        });
    </script>

@endsection
