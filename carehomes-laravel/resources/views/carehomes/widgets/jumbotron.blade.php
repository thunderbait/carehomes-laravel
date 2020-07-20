<!-- Carehome Jumbotron -->
<div class="container">
    <div class="jumbotron jumbotron-fluid" style="padding: 15px;">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h1 class="display-4">{{$carehome->name}}</h1>
                </div>

                <div class="col-6" style="text-align:right;">
                    @if(Auth::user())
                        <a href="{{route('carehomes.edit', $carehome->id)}}"><i class="fa fa-pencil-square-o" style="font-size:36px; color:black; margin:5px"></i></a>
                        <a href="{{'carehomes.destroy', $carehome->id}}"><i class="fa fa-trash" aria-hidden="true" style="font-size:34px; color:black; margin:5px"></i></a>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <p class="lead">{{ !empty($carehome->location) ? $carehome->location->name : ""}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <a href="{{route('groups.show', $carehome->group_id)}}"><p class="lead">{{ !empty($carehome->group) ? $carehome->group->name : ""}}</p></a>
                </div>
            </div>
            @if(!empty($carehome->types))
                <div class="row col-12">
                    <b>Types:</b>
                    @foreach($carehome->types as $type)
                        <ul>
                            <li>{{$type->name}}</li>
                        </ul>
                    @endforeach
                </div>
            @endif
            @if(!empty($carehome->specialisms))
                <div class="row col-12">
                    <b>Specialisms:</b>
                    @foreach($carehome->specialisms as $specialism)
                        <ul>
                            <li>{{$specialism->name}}</li>
                        </ul>
                    @endforeach
                </div>
            @endif
            @if(!empty($carehome->location->localAuthority))
                <div class="row">
                    <div class="col-12">
                        <p><b>Local Authority: </b> {{$carehome->location->localAuthority->name}}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
