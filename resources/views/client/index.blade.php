<!-- app/views/client/index.blade.php -->

@extends('layout/layout')

@section('content')
    <!-- List Client Form... -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <h4>List of Clients</h4>
                </div>
                <div class="col-xs-6 text-right">
                    <a href="client/add" role="button" class="btn btn-default">Add New Client</a>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <table class="table table-striped" id="dataTable">
                @if (count($clients) > 0)

                    <!-- Table Headings -->
                    <thead>
                        <th>Name</th>
                        <th>Actions</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <!-- Name -->
                                <td class="table-text">
                                    <div>{{ $client->name }}</div>
                                </td>

                                <td>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 col-md-2">
                                            {!! Form::model($client, ['method' => 'GET', 'route' => ['editClient',
                                            $client->id]]) !!}
                                            <button type="submit" class="btn btn-warning">
                                                <i class="fa fa-trash"></i> Edit </button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @else
                    <div class="alert alert-info" role="alert">No clients available</div>
                @endif
            </table>
        </div>
    </div>
@endsection
