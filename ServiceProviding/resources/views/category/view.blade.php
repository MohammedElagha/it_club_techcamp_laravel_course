@extends('layout')

@section('content')

<div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">

                    @if (session()->has('delete_category_status'))
                        <div class="col-lg-12">
                            @if (session('delete_category_status'))
                                <div class="alert alert-success">SUCCESS</div>
                            @else
                                <div class="alert alert-danger">FAILED</div>
                            @endif
                        </div>
                    @endif

                	<div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Categories </h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach ($categories as $category)
                                        		<tr>
                                        			<td><img src="{{ config('paths.category_icon') . '\\' . $category->icon }}" width="200px"></td>
                                        			<td>{{ $category->name }}</td>
                                                    <td><a href="{{ URL('category/' . $category->id) }}">Edit</a></td>

                                                    <td>
                                                        <form method="post" action="{{ URL('category/delete/' . $category->id) }}">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <input type="hidden" name="_method" value="DELETE">

                                                            <button id="delete_link">DELETE</button>
                                                        </form>
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