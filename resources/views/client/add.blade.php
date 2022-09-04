<!-- app/views/client/add.blade.php -->

@extends('layout/layout')

@section('content')
    <!-- Add Client Form... -->

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add New Client</h3>
                </div>
                <div class="panel-body">
                    <!-- if there are creation errors, they will show here -->
                    {!! HTML::ul($errors->all()) !!}


                    {!! Form::model(new App\Models\Client(), ['route' => ['storeClient']]) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', Request::old('name'), array('class' => 'form-control', 'required')) !!}
                    </div>

                    <a href="{!!URL::route('clients')!!}" class="btn btn-info" role="button">Cancel</a>
                    {!! Form::submit('Add', array('class' => 'btn btn-primary')) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection