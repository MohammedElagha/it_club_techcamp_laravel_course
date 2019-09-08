@extends('layout')

@section('content')

<div class="container-fluid">
	<div class="row">
	    <div class="col-lg-12">
	        <div class="card">
	            <div class="card-title">
	                <h4>Add City</h4>

	            </div>
	            <div class="card-body">
	                <div class="basic-form">
	                    <form method="post" action="{{ URL('city/store') }}" enctype="multipart/form-data">
	                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	                        <div class="form-group">
	                        	<label>Name</label>
	                            <input name="city_name" type="text" class="form-control input-default " placeholder="city Name">
	                        </div>

	                        <div class="form-group">
	                        	<select name="country_id">
	                        		<option value="0">select an option</option>
	                        		@foreach ($countries as $country)
	                        			<option value="{{ $country->id }}">{{ $country->name }}</option>
	                        		@endforeach
	                        	</select>
	                        </div>

		                    <button id="submit-btn" type="button" class="btn btn-primary">ADD</button>
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
	$('#submit-btn').click(function(e) {
		e.preventDefault();

		if (confirm('Are you sure?')) {
			$.ajax({
				url: '{{ URL("city/store") }}',
				method: 'POST',
				data: {
					'_token': '{{ csrf_token() }}',
					'city_name': $('input[name="city_name"]').val(),
					'country_id': $( 'select[name="country_id"] option:selected' ).val()
				},
				success:function(response) {
					alert(response["status"]);
				},
				fail:function(response) {
					alert("ERROR");
				}
			});
		}
	});
</script>

@stop