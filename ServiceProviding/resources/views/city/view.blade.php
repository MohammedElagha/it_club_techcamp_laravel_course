@extends('layout')

@section('content')

<div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">

                	<div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Cities </h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Country</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach ($cities as $city)
                                        		<tr>
                                                    <td>{{ $city->name }}</td>
                                                    <td>{{ $city->country->name }}</td>
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