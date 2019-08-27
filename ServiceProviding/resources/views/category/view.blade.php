@extends('layout')

@section('content')

<div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">

                	<div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Table Basic </h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach ($categories as $category)
                                        		<tr>
                                        			<td><img src="{{ config('paths.category_icon') . '\\' . $category->icon }}"></td>
                                        			<td>{{ $category->name }}</td>
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

@stop