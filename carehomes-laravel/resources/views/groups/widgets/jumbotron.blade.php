<!-- Carehome Jumbotron -->
<div class="container">
    <div class="jumbotron jumbotron-fluid" style="padding: 15px;">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h1 class="display-4">{{$group->name}}</h1>
                </div>

                <div class="col-6" style="text-align:right;">
                    @if(Auth::user())
                        <a href="{{route('groups.edit', $group->id)}}"><i class="fa fa-pencil-square-o" style="font-size:36px; color:black; margin:5px"></i></a>
                        <a href="{{'groups.destroy', $group->id}}"><i class="fa fa-trash" aria-hidden="true" style="font-size:34px; color:black; margin:5px"></i></a>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <p class="lead"><b>Number of Carehomes:  </b> {{$group->numOfHomes()}}</p>
                </div>
            </div>

            {{--<div class="row">
                <div class="col-6">
                    <a href="#"><p class="lead">Website</p></a>
                </div>
            </div>--}}
        </div>
    </div>
</div>
