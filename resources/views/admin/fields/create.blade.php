@extends('admin.default')

@section('page-header')
    Talhões <small>{{ trans('app.add_new_item') }}</small>
@stop

@section('content')
    {!! Form::open([
            'action' => ['FieldController@store'],
            'files' => true
        ])
    !!}

    @include('admin.fields.form')

    <button type="submit" class="btn btn-primary">{{ trans('app.add_button') }}</button>

    {!! Form::close() !!}

@stop
