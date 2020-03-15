@extends('admin.default')

@section('page-header')
    Talhões <small>{{ trans('app.manage') }}</small>
@endsection

@section('content')

    <div class="mB-20">
        <a href="{{ route(ADMIN . '.fields.create') }}" class="btn btn-info">
            Adicionar Talhão
        </a>
    </div>


    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Código</th>
                <th>Área</th>
                <th>Ultima Operação</th>
                <th>Ações</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>Código</th>
                <th>Área</th>
                <th>Ultima Operação</th>
                <th>Ações</th>
            </tr>
            </tfoot>

            <tbody>
            @foreach ($items as $item)
                <tr>
                    <td><a href="{{ route(ADMIN . '.fields.edit', $item->id) }}">#{{ $item->code }}</a></td>
                    <td>{{ $item->area }} hectares</td>
                    <td>
                        @if($item->reports->last() != null)
                            <a href="{{ route(ADMIN . '.operations.show', $item->reports->last()->id) }}">{{ $item->reports->last()->id }} - {{ $item->reports->last()->type }}</a>
                        @else
                            <p>Nenhuma operação cadastrada</p>
                        @endif
                    </td>
                    <td>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                @if($item->reports->last() != null)
                                <a href="{{ route(ADMIN . '.operations.fields', $item->id) }}" title="Ultimas Operações" class="btn btn-success btn-sm"><span class="ti-layout-media-left"></span></a>
                                @endif
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route(ADMIN . '.fields.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a></li>

                            <li class="list-inline-item">
                                {!! Form::open([
                                    'class'=>'delete',
                                    'url'  => route(ADMIN . '.fields.destroy', $item->id),
                                    'method' => 'DELETE',
                                    ])
                                !!}

                                <button class="btn btn-danger btn-sm" title="{{ trans('app.delete_title') }}"><i class="ti-trash"></i></button>

                                {!! Form::close() !!}
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>

@endsection
