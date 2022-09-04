<!-- app/views/type/index.blade.php -->

@extends('layout/layout')

@section('content')
    <!-- List Type Form... -->

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-6">
                    <h4>Current Types</h4>
                </div>
                <div class="col-xs-6 text-right">
                    <a href="type/add" role="button" class="btn btn-default">Add New Type</a>
                </div>
            </div>
        </div>

        <div class="panel-body">
            <table class="table table-striped" id="dataTable">
                @if (count($types) > 0)

                    <!-- Table Headings -->
                    <thead>
                        <th>Description</th>
                        <th>Actions</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($types as $type)
                            <tr>
                                <!-- Description -->
                                <td class="table-text">
                                    <div>{{ $type->description }}</div>
                                </td>

                                <td>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 col-md-2">
                                            {!! Form::model($type, ['method' => 'GET', 'route' => ['editType',
                                            $type->id]]) !!}
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
                    <div class="alert alert-info" role="alert">No types loaded</div>
                @endif
            </table>
        </div>
    </div>
@endsection
