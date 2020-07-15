<!-- Carehome Jumbotron -->
<div class="container">
    <div class="jumbotron jumbotron-fluid" style="padding: 15px;">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h1 class="display-4">{{$group->name}}</h1>
                </div>

                <div class="col-6" style="text-align:right;">
                    <a href="{{route('groups.edit', $group->id)}}"><i class="fa fa-gear" style="font-size:36px; color:black; "></i></a>
                </div>
            </div>
            
            <div class="row">
                <div class="col-6">
                    <a href="&"><p class="lead">website</p></a>
                </div>
            </div>
        </div>
    </div>
</div>