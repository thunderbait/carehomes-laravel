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
        	<form action="/carehomes/search">
        		
        		<div class="form-row">
        			<!-- Input for Minimum Number of Beds -->
				    <div class="form-group col-md-4">
				      <label for="number_beds">Min. Number of Beds</label>
				      <input name="number_beds" id="number_beds" class="form-control" placeholder="Min. Number of Beds">
				    </div>
				</div>
				
				<div class="form-row">
					<!-- Input for Location Authority (Dropdown) -->
				    <div class="form-group col-md-4">
				      <label for="local_authority">Local Authority</label>
				      <select name="local_authority" id="local_authority" class="form-control" placeholder="Local Authority">
				      	@foreach($local_authorities as $local_authority)
				        <option selected>{{ $local_authority->name }}</option>
				       	@endforeach
				      </select>
				    </div>					
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>

        	</form>
        </div>
    </div>

@endsection