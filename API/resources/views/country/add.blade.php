@extends('layout')

@section('content')

<div class="container-fluid">
	<div class="row">
		@if (session()->has('add_country_status'))
			<div class="col-lg-12">
				@if (session('add_country_status'))
					<div class="alert alert-success">SUCCESS</div>
				@else
					<div class="alert alert-danger">FAILED</div>
				@endif
			</div>
		@endif

	    <div class="col-lg-12">
	        <div class="card">
	            <div class="card-title">
	                <h4>Add country</h4>

	            </div>
	            <div class="card-body">
	                <div class="basic-form">
	                    <form method="post" action="{{ URL('country/store') }}" enctype="multipart/form-data">
	                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	                        <div class="form-group">
	                        	<label>Name</label>
	                            <input name="country_name" type="text" class="form-control input-default " placeholder="country Name">
	                        </div>

	                        <div class="form-group">
	                        	<label>code</label>
	                            <input name="country_code" type="text" class="form-control input-default " placeholder="country code">
	                        </div>

		                    <button type="submit" class="btn btn-primary">ADD</button>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- /# column -->
	    
	    <!-- /# column -->
	</div>
</div>

@stop