@extends('layout')

@section('content')

<div class="container-fluid">
	<div class="row">
	    <div class="col-lg-12">
	        <div class="card">
	            <div class="card-title">
	                <h4>Add Admin</h4>

	            </div>
	            <div class="card-body">
	                <div class="basic-form">
	                    <form method="post" action="{{ URL('admin/store') }}" enctype="multipart/form-data">
	                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	                        <div class="form-group">
	                        	<label>Name</label>
	                            <input name="admin_name" type="text" class="form-control input-default " placeholder="admin Name">
	                        </div>

	                        <div class="form-group">
	                        	<label>Email</label>
	                            <input name="admin_email" type="email" class="form-control input-default " placeholder="admin email">
	                        </div>

	                        <div class="form-group">
	                        	<label>Username</label>
	                            <input name="admin_username" type="text" class="form-control input-default " placeholder="admin username">
	                        </div>

	                        <div class="form-group">
	                        	<label>Password</label>
	                            <input name="admin_password" type="password" class="form-control input-default " placeholder="admin password">
	                        </div>

	                        <div class="form-group">
	                        	<select name="user_group_id">
	                        		<option value="0">select an option</option>
	                        		@foreach ($user_groups as $user_group)
	                        			<option value="{{ $user_group->id }}">{{ $user_group->name }}</option>
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