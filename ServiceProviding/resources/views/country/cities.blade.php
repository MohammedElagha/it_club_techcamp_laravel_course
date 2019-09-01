@extends('layout')

@section('content')

<div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">

                	<div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Cities of Country </h4>

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
                                        	
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url: '{{ URL("country/cities") }}' + '?country_id=' + {{ $id }},
            method: 'GET',
            success:function(response) {
                for(var i = 0 ; i < response.length ; i++) {
                    $('tbody').append('<tr>' +
                                        '<td>' + response[i].name + '</td>' +
                                    '</tr>');
                }
            }
        });
    });
</script>

@stop