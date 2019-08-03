<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>{{ $value }}</h1>

	<table>
		<tbody>
			@foreach ($names as $name)
				<tr>
					<td>
						@if ($loop->last)
							last {{ $name }}
						@else
							{{ $name }}
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>