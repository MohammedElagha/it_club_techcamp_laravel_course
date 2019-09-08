@extends('layout')

@section('content')

<div class="container-fluid">
	<div class="row">
	    <div class="col-lg-12">
	        <div class="card">
	            <div class="card-title">
	                <h4>Add User Group</h4>

	            </div>
	            <div class="card-body">
	                <div class="basic-form">
	                    <form method="post" action="{{ URL('user-group/store') }}" enctype="multipart/form-data">
	                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	                        <div class="form-group">
	                        	<label>Name</label>
	                            <input name="user_group_name" type="text" class="form-control input-default " placeholder="user group Name">
	                        </div>

	                        <div class="form-group">
	                        	<select name="section_id[]" multiple>
	                        		<option value="0">select an option</option>
	                        		@foreach ($sections as $section)
	                        			<option value="{{ $section->id }}">{{ $section->name }}</option>
	                        		@endforeach
	                        	</select>
	                        </div>

		                    <button id="submit-btn" type="submit" class="btn btn-primary">ADD</button>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- /# column -->
	    
	    <!-- /# column -->
	</div>
</div>

<script type="text/javascript">
</script>

@stop