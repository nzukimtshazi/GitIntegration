<!-- app/views/repository/edit.blade.php -->

@extends('layout/layout')

@section('content')
    <!-- Edit Repository Form... -->

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Update Repository: {!! $repository->description !!}</h3>
                </div>
                <div class="panel-body">

                    <!-- if there are creation errors, they will show here -->
                    {!! HTML::ul($errors->all()) !!}

                    {!! Form::model($repository, ['method' => 'PATCH', 'route' => ['updateRepository', $repository->id]]) !!}

                    <div class="form-group form-group-sm">
                        {!! Form::label('title', 'Title:') !!}
                        {!! Form::text('title', $repository->title, array('class' => 'form-control form-control-sm
                        input-sm', 'required')) !!}
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::text('description', $repository->description, array('class' => 'form-control form-control-sm
                        input-sm', 'required')) !!}
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::Label('client_id', 'Client:') !!}
                        <select class="form-control input-sm" name="client_id">
                            @foreach($clients as $client)
                                @if($client['id'] == $cid)
                                    <option value="{{$client['id']}}" selected="{{$cid}}">{{$client['name']}}</option>
                                @else
                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::Label('priority_id', 'Priority:') !!}
                        <select class="form-control input-sm" name="priority_id">
                            @foreach($priorities as $priority)
                                @if($priority['id'] == $pid)
                                    <option value="{{$priority['id']}}" selected="{{$pid}}">{{$priority['description']}}</option>
                                @else
                                    <option value="{{$priority->id}}">{{$priority->description}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::Label('type_id', 'Type:') !!}
                        <select class="form-control input-sm" name="type_id">
                            @foreach($types as $type)
                                @if($type['id'] == $tid)
                                    <option value="{{$type['id']}}" selected="{{$tid}}">{{$type['description']}}</option>
                                @else
                                    <option value="{{$type->id}}">{{$type->description}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::label('assigned_to', 'Assigned User:') !!}
                        {!! Form::text('assigned_to', $repository->assigned_to, array('class' => 'form-control form-control-sm
                        input-sm', 'required')) !!}
                    </div>

                    <div class="form-group form-group-sm">
                        {!! Form::label('status', 'Status:') !!}
                        {!! Form::text('status', $repository->status, array('class' => 'form-control form-control-sm
                        input-sm', 'required')) !!}
                    </div>

                    <a href="{!!URL::route('repositories')!!}" class="btn btn-sm btn-secondary" role="button">Cancel</a>
                    {!! Form::submit('Update', array('class' => 'btn btn-sm btn-info')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection