@extends('admin.default')

@section('page-header')
    Talhões <small>{{ trans('app.update_item') }}</small>
@stop

@section('content')
    {!! Form::model($item, [
            'action' => ['FieldController@update', $item->id],
            'method' => 'put',
            'files' => true
        ])
    !!}

    @include('admin.fields.form')

    <button type="submit" class="btn btn-primary">{{ trans('app.edit_button') }}</button>

    {!! Form::close() !!}

@stop
