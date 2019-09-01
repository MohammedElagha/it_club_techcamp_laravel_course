@extends('layout')

@section('content')

<div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">

                	<div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Countries </h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Cities</th>
                                                <th>Cities</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach ($countries as $country)
                                        		<tr>
                                                    <td>{{ $country->name }}</td>
                                        			<td>{{ $country->phone_code }}</td>
                                                    <td>
                                                        @foreach ($country->cities as $city)
                                                            {{ $city->name }} <br>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <a href="{{ URL('country/' . $country->id . '/city') }}">Cities</a>
                                                    </td>
                                        		</tr>
                                        	@endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

<script type="text/javascript">
    $('#delete_link').click(function (e) {
        $(this).parent().submit();
    });
</script>

@stop