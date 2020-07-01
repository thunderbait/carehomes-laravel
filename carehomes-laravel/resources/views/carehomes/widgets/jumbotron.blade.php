<!-- Carehome Jumbotron -->
<div class="container">
    <div class="jumbotron jumbotron-fluid" style="padding: 15px;">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h1 class="display-4">{{$carehome->name}}</h1>
                </div>

                <div class="col-6" style="text-align:right;">
                    <a href="{{route('carehomes.edit', $carehome->id)}}"><i class="fa fa-gear" style="font-size:36px; color:black; "></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <p class="lead">{{$carehome->location->name}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <a href="{{route('groups.show', $carehome->group_id)}}"><p class="lead">{{$carehome->group->name}}</p></a>
                </div>
            </div>
        </div>
    </div>
</div>