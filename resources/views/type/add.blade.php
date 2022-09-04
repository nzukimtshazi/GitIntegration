<!-- app/views/type/add.blade.php -->

@extends('layout/layout')

@section('content')
    <!-- Add Type Form... -->

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add New Type</h3>
                </div>
                <div class="panel-body">
                    <!-- if there are creation errors, they will show here -->
                    {!! HTML::ul($errors->all()) !!}


                    {!! Form::model(new App\Models\Type(), ['route' => ['storeType']]) !!}

                    <div class="form-group">
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::text('description', Request::old('description'), array('class' => 'form-control', 'required')) !!}
                    </div>

                    <a href="{!!URL::route('types')!!}" class="btn btn-info" role="button">Cancel</a>
                    {!! Form::submit('Add', array('class' => 'btn btn-primary')) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection