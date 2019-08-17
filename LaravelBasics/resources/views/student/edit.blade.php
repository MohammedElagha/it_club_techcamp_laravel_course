<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				@if (!is_null($student))
					<form method="post" action="{{ URL('student/update/' . $student->id) }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="_method" value="PUT">

						<div class="form-group">
							<label>Name</label>
							<input type="text" name="student_name" class="form-control" value="{{ $student->name }}">
						</div>

						<div class="form-group">
							<label>Phone</label>
							<input type="number" name="student_phone" class="form-control" value="{{ $student->phone }}">
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="email" name="student_email" class="form-control" value="{{ $student->email }}">
						</div>

						<button type="submit" class="btn btn-primary">SAVE</button>
					</form>
				@endif
			</div>
		</div>
	</div>
</body>
</html>