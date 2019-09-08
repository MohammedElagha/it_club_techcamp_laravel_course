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
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach ($cities as $city)
                                        		<tr>
                                                    <td>{{ $city->name }}</td>
                                        		</tr>
                                        	@endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        @for ($i = 1 ; $i <= $pages_no ; $i++)
                            <a href="{{ URL('city') }}?page={{$i}}">{{ $i }}</a> <br>
                        @endfor
                    </div>
                </div>
            </div>

<script type="text/javascript">
    $('#delete_link').click(function (e) {
        $(this).parent().submit();
    });
</script>

@stop