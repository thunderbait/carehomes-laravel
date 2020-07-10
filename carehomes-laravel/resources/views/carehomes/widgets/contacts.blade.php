<!-- Contact Details -->
    <div class="card" style="width: 15rem;">
        <img class="card-img-top" src="https://www.kirkham-legal.co.uk/wp-content/uploads/2017/02/profile-placeholder.png" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$contact->name}}</h5>
            @if(!empty($contact->role))
                <h8><b>Role: </b>{{$contact->role}}</h8><br>
            @endif
            @if(!empty($contact->email))
                <h8><b>Email: </b>{{$contact->email}}</h8><br>
            @endif
            @if(!empty($contact->phone))
                <h8><b>Phone: </b>{{$contact->phone}}</h8><br>
            @endif
            @if(!empty($contact->linkedin))
                <h8><b>LinkedIn: </b><a href="{{$contact->linkedin}}">{{$contact->name}}</a></h8>
            @endif
        </div>
    </div>
