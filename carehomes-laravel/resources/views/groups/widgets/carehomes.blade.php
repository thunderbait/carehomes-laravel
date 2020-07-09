<div class="card" style="margin-top: 15px ;margin-bottom: 15px;">
    <div class="card-body">
        <h5 class="card-title">{{$carehome->name}}</h5>
        <h8 class="card-subtitle mb-2 text-muted">{{$carehome->location->name}}</h8>
        <p class="card-text text-muted">No. of beds: {{$carehome->number_beds}}</p>
        <a href="{{route('carehomes.show', $carehome->id)}}" class="card-link">Profile</a>
    </div>
</div>
