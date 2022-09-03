@extends('layout/layout')

@section('content')
    <!-- List Repository Form... -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <h4>List of Repositories</h4>
                </div>
                <div class="col-xs-6 text-right">
                    <a href="repository/add" role="button" class="btn btn-default">Add Repository</a>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <table class="table table-striped" id="dataTable">
                @if (count($repositories) > 0)

                    <!-- Table Headings -->
                    <thead>
                        <th>Number</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Client</th>
                        <th>Priority</th>
                        <th>Type</th>
                        <th>Assigned To</th>
                        <th>Status</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($repositories as $repository)
                            <tr>
                                <!-- Number -->
                                <td class="table-text">
                                    <div>{{ $repository->no }}</div>
                                </td>

                                <!-- Title -->
                                <td class="table-text">
                                    <div>{{ $repository->title }}</div>
                                </td>

                                <!-- Description -->
                                <td class="table-text">
                                    <div>{{ $repository->description }}</div>
                                </td>

                                <!-- Client -->
                                <td class="table-text">
                                    <div>{{ $repository->client }}</div>
                                </td>

                                <!-- Priority -->
                                <td class="table-text">
                                    <div>{{ $repository->priority }}</div>
                                </td>

                                <!-- Type -->
                                <td class="table-text">
                                    <div>{{ $repository->type }}</div>
                                </td>

                                <!-- Assigned TO -->
                                <td class="table-text">
                                    <div>{{ $repository->assigned_to }}</div>
                                </td>

                                <!-- Status -->
                                <td class="table-text">
                                    <div>{{ $repository->status }}</div>
                                </td>

                                <td>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 col-md-2">
                                            {!! Form::model($repository, ['method' => 'GET', 'route' => ['editRepository',
                                            $repository->id]]) !!}
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
                    <div class="alert alert-info" role="alert">No Repositories available</div>
                @endif
            </table>
        </div>
    </div>
@endsection
