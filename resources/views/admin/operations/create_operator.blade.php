@extends('admin.default')

@section('page-header')
    Operações <small>{{ trans('app.add_new_item') }}</small>
@stop

@section('content')
    {!! Form::open([
            'action' => ['OperationController@initialStore'],
            'files' => true
        ])
    !!}

    @include('admin.operations.form', ['finish' => false])

    <button type="submit" class="btn btn-primary">Iniciar Operação</button>

    {!! Form::close() !!}

@stop
