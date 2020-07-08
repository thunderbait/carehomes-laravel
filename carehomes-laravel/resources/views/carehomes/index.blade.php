@extends('layouts.app')

@section('content')

    <link rel="stylesheet" type="text/css" href="/css/carehomes/index.css">

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Carehomes</li>
            </ol>
        </nav>
    </div>

    <div class="container col-11">
        <div class="row">
            <div class="col-3" style="margin-bottom:20px">
                <h1>Carehomes</h1>
            </div>

            <!-- SEARCH BAR -->
            <div class="col-9">
                <form class="form-inline">
                    <div class="form-group">
                        <input class="form-control" type="search" name="q" placeholder="Search here...">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
            <!-- SEARCH BAR END-->
        </div>

        <!-- ADVANCED SEARCH FILTERS -->
        @include('carehomes.widgets.filter')
        <!-- END ADVANCED SEARCH FILTERS -->

        <div class="row">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br/>
            @endif
        </div>


        <div class="row justify-content-center">
            {{ $carehomes->appends($input)->links() }}
        </div>

        <!-- CAREHOMES TABLE -->
        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>@sortablelink('id')</th>
                    <th>@sortablelink('name')</th>
                    <th>@sortablelink('group.name', 'Group')</th>
                    <th>Location ID</th>
                    <th>@sortablelink('number_beds', 'No. Beds')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($carehomes as $carehome)
                <tr>
                    <td>{{$carehome->id}}</td>
                    <td><a href="{{route('carehomes.show', $carehome->id)}}">{{$carehome->name}}</a></td>
                    <td><a href="{{route('groups.show', $carehome->group_id)}}">{{ !empty($carehome->group) ? $carehome->group->name : ""}}</a></td>
                    <td>{{$carehome->location_id}}</td>
                    <td>{{$carehome->number_beds}}</td>
                    <td><a href="{{route('carehomes.edit', $carehome->id)}}" class="btn btn-warning">Edit</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- CAREHOMES TABLLE END -->

        <button class="btn btn-primary" onclick="topFunction()" id="myBtn" title="Go to top">Back to top</button>

        <div class="row justify-content-center">
            {{ $carehomes->appends($input)->links() }}
        </div>
    </div>

    <!--  TODO PUT IN ITS OWN JS FILE, INSIDE - /RESOURCES/JS - USED IN EVENTS/ORGS/VENUES INDEX & ORGS SHOW -->
    <script>
        //Get the button:
        mybutton = document.getElementById("myBtn");
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }

        filter = document.getElementById("advancedSearch");
        function openFilter()
        {
            document.getElementById("filterBtn").style.display = "none";
            filter.style.display = "block";
        }

        function closeFilter()
        {
            document.getElementById("filterBtn").style.display = "block";
            filter.style.display = "none";
        }

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
