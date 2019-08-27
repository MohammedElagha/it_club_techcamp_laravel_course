@extends('layout')

@section('content')

<div class="container-fluid">
	<div class="row">
		@if (session()->has('add_category_status'))
			<div class="col-lg-12">
				@if (session('add_category_status'))
					<div class="alert alert-success">SUCCESS</div>
				@else
					<div class="alert alert-danger">FAILED</div>
				@endif
			</div>
		@endif

	    <div class="col-lg-12">
	        <div class="card">
	            <div class="card-title">
	                <h4>Add Category</h4>

	            </div>
	            <div class="card-body">
	                <div class="basic-form">
	                    <form method="post" action="{{ URL('category/store') }}" enctype="multipart/form-data">
	                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	                        <div class="form-group">
	                        	<label>Name</label>
	                            <input name="category_name" type="text" class="form-control input-default " placeholder="Category Name">
	                        </div>

	                        <div>
	                        	<label>Icon</label>
	                        	<input name="category_icon" type="file" class="form-control input-default " placeholder="Category Icon">
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