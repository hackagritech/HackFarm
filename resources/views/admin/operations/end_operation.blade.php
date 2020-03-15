@extends('admin.default')

@section('page-header')
    Operações <small>{{ trans('app.add_new_item') }}</small>
@stop

@section('content')
    {!! Form::open([
            'action' => ['OperationController@finishStore'],
            'files' => true
        ])
    !!}

    @include('admin.operations.form', ['finish' => true])

    <button type="submit" class="btn btn-danger">Encerrar Operação</button>

    {!! Form::close() !!}

@stop
