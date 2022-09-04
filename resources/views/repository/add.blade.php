<!-- app/views/repository/add.blade.php -->

@extends('layout/layout')

@section('content')

    <!-- Add Repository Form... -->

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add New Repository</h3>
                </div>

                <div class="panel-body">

                    <!-- if there are creation errors, they will show here -->
                    {!! HTML::ul($errors->all()) !!}

                    {!! Form::open(array('route' => 'storeRepository', 'method'=>'POST','files'=>true)) !!}

                    <div class="form-group form-group-sm">
                        {!! Form::label('title', 'Title:') !!}
                        {!! Form::text('title', Request::old('title'), array('class' => 'form-control form-control-sm
                        input-sm', 'required')) !!}
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::text('description', Request::old('description'), array('class' => 'form-control form-control-sm
                        input-sm', 'required')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::Label('client_id', 'Client:') !!}
                        <select class="form-control input-sm form-control-sm" name="client_id" id="client_id">
                            <option value="">Select a Client</option>
                            @foreach($clients as $client)
                                <option value="{{$client->id}}" @if(old('client_id')==$client->id)
                                selected="selected"@endif>{{$client->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('priority_id', 'Priority:') !!}
                        <select class="form-control input-sm form-control-sm" name="priority_id" id="priority_id">
                            <option value="">Choose Priority</option>
                            @foreach($priorities as $priority)
                                <option value="{{$priority->id}}" @if(old('priority_id')==$priority->id)
                                selected="selected"@endif>{{$priority->description}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('type_id', 'Type:') !!}
                        <select class="form-control input-sm form-control-sm" name="type_id" id="type_id">
                            <option value="">Choose Type</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}" @if(old('type_id')==$type->id)
                                selected="selected"@endif>{{$type->description}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::label('assigned_to', 'Assigned User:') !!}
                        {!! Form::text('assigned_to', Request::old('assigned_to'), array('class' => 'form-control form-control-sm
                        input-sm', 'required')) !!}
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::label('status', 'Status:') !!}
                        {!! Form::text('status', Request::old('status'), array('class' => 'form-control form-control-sm
                        input-sm', 'required')) !!}
                    </div>

                    <a href="{!!URL::route('repositories')!!}" class="btn btn-sm btn-secondary" role="button">Cancel</a>
                    {!! Form::submit('Add', array('class' => 'btn btn-sm btn-info')) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection