@extends('layouts.app')

@section('content')

    <div class="container">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Advanced Filter</li>
          </ol>
        </nav>

        <h3>Advanced Carehome Filter</h3>
        <br>

        <div class="container">
        	<form action="/search">
        		
        		<div class="form-row">
        			<!-- Input for Minimum Number of Beds -->
				    <div class="form-group col-md-4">
				      <label for="number_beds">Min. Number of Beds</label>
				      <input type="number_beds" class="form-control" id="number_beds" placeholder="Min. Number of Beds">
				    </div>
				</div>
				
				<div class="form-row">
					<!-- Input for Location Authority (Dropdown) -->
				    <div class="form-group col-md-4">
				      <label for="location_authority">Location Authority</label>
				      <select name="location_authority" id="location_authority" class="form-control">
				      	@foreach($authorities ?? '' as $authority)
				        <option selected>$authority</option>
				       	@endforeach
				      </select>
				    </div>					
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>

        	</form>
        </div>
    </div>

@endsection