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

                    <div class="form-group form-group-sm">
                        {!! Form::Label('client_id', 'Client:') !!}
                        <input list="client_id" type="text">

                        <datalist id="client_id">
                            <select class="form-control input-sm form-control-sm required" name="client_id" id="client_id">
                                @foreach($clients as $client)
                                    <option value="{{$client->name}}" @if(old('client_id')==$client->id)
                                    selected="selected"@endif>{{$client->name}}</option>
                                @endforeach
                            </select>
                        </datalist>
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::Label('priority_id', 'Priority:') !!}
                        <input list="priority_id" type="text">

                        <datalist id="priority_id">
                            <select class="form-control input-sm form-control-sm required" name="priority_id" id="priority_id">
                                @foreach($priorities as $priority)
                                    <option value="{{$priority->description}}" @if(old('priority_id')==$priority->id)
                                    selected="selected"@endif>{{$priority->description}}</option>
                                @endforeach
                            </select>
                        </datalist>
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::Label('type_id', 'Type:') !!}
                        <input list="type_id" type="text">

                        <datalist id="type_id">
                            <select class="form-control input-sm form-control-sm required" name="type_id" id="type_id">
                                @foreach($types as $type)
                                    <option value="{{$type->description}}" @if(old('type_id')==$type->id)
                                    selected="selected"@endif>{{$type->description}}</option>
                                @endforeach
                            </select>
                        </datalist>
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