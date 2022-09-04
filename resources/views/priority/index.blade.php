<!-- app/views/priority/index.blade.php -->

@extends('layout/layout')

@section('content')
    <!-- List Priority Form... -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <h4>Current Priorities</h4>
                </div>
                <div class="col-xs-6 text-right">
                    <a href="priority/add" role="button" class="btn btn-default">Add New Priority</a>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <table class="table table-striped" id="dataTable">
                @if (count($priorities) > 0)

                    <!-- Table Headings -->
                    <thead>
                        <th>Description</th>
                        <th>Actions</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($priorities as $priority)
                            <tr>
                                <!-- Description -->
                                <td class="table-text">
                                    <div>{{ $priority->description }}</div>
                                </td>

                                <td>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 col-md-2">
                                            {!! Form::model($priority, ['method' => 'GET', 'route' => ['editPriority',
                                            $priority->id]]) !!}
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
                    <div class="alert alert-info" role="alert">No priorities listed</div>
                @endif
            </table>
        </div>
    </div>
@endsection
