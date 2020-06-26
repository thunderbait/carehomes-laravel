@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-3" style="margin-bottom:20px">
                <h1>Groups</h1>
            </div>

            <div class="col-9">
                <form class="form-inline">
                    <div class="form-group">
                        <input class="form-control" type="search" name="q" placeholder="Search here...">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>

        <div class="row">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br/>
            @endif
        </div>

        <div class="row">
            <div class="row justify-content-center">
                {{ $groups->links() }}
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                     @foreach($groups as $group)
                	<tr>
                        <td><a href="{{route('groups.show', $group->id)}}">{{$group->id}}</td>
                        <td>{{$group->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <button onclick="topFunction()" id="myBtn" title="Go to top">Back to top</button>

        <div class="row justify-content-center">
            {{ $groups->links() }}
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
    </script>

@endsection