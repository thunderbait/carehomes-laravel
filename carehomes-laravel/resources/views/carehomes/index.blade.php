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
        </div>

        <!-- ADVANCED SEARCH FILTERS -->
        <a id="filterBtn" href="javascript:void(0)" onclick="openFilter()">Advanced Search</a>
        <div class="row">
            <div id="filter" class="container col-12">
                <h3><a href="javascript:void(0)" class="closebtn" onclick="closeFilter()">&times;</a>Advanced Search</h3>
                <br>

                <form action="{{route('search')}}">
                    <!-- Input for Location Authority (Dropdown) -->
                    <div class="form-group col-md-3">
                        <label for="local_authority">Local Authority</label>
                        <input id="search1" type="text" class="form-control" name="search" placeholder="Search" onkeyup="filterList(this.value, 'select1')">
                        <select  id="select1" size="3" type="text" class="form-control" name="group">
                            @foreach ($local_authorities as $local_authority)
                                <option value="{{ $local_authority->id }}">{{ $local_authority->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Input for Group (Dropdown) -->
                    <div class="form-group col-md-3">
                        <label for="group">Group</label>
                        <input id="search2" type="text" class="form-control" name="search" placeholder="Search" onkeyup="filterList(this.value, 'select2')">
                        <select  id="select2" size="3" type="text" class="form-control" name="group">
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Input for Minimum Number of Beds -->
                    <div id="beds" class="form-group col-md-3">
                        <label for="number_beds">Min. Number of Beds</label>
                        <input name="number_beds" id="number_beds" class="form-control"
                               placeholder="Enter min. number of beds...">
                    </div>
                    <button id="submitBtn" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <!-- END ADVANCED SEARCH FILTERS -->

        <div class="row">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br/>
            @endif
        </div>

        <div class="row justify-content-center">
            {{ $carehomes->links() }}
        </div>

        <div class="row">


            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Group</th>
                    <th>Location ID</th>
                    <th>No.Beds</th>
                    <th>Notes</th>
                </tr>
                </thead>
                <tbody>
                     @foreach($carehomes as $carehome)
                	<tr>
                        <td>{{$carehome->id}}</td>
                        <td>
                            <a href="{{route('carehomes.show', $carehome->id)}}">{{$carehome->name}}</a>
                        </td>
                        <td><a href="{{route('groups.show', $carehome->group_id)}}">{{$carehome->group->name}}</a></td>
                        <td>{{$carehome->location_id}}</td>

                        <td>{{$carehome->number_beds}}</td>
                        <td>{{$carehome->notes}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <button onclick="topFunction()" id="myBtn" title="Go to top">Back to top</button>

        <div class="row justify-content-center">
            {{ $carehomes->links() }}
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

        filter = document.getElementById("filter");
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
    </script>

@endsection
