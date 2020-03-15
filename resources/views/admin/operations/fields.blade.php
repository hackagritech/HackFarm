@extends('admin.default')

@section('page-header')
    Operações do Talhão #{{ $items->first()->field->code }} <small>{{ trans('app.manage') }}</small>
@endsection

@section('content')


    <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Operador</th>
                <th>Tipo e Operação</th>
                <th>Talhão</th>
                <th>Início da Operação</th>
                <th>Fim da Operação</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($items as $item)
                <tr>
                    <td><a href="{{ route(ADMIN . '.operations.show', $item->id) }}">#{{ $item->id }}</a></td>
                    <td>{{ $item->operator->name }}</td>
                    <td>{{ $item->type }}</td>
                    <td>#{{ $item->field->code }}</td>
                    <td>{{ $item->operation->start_date }}</td>
                    <td>{{ $item->operation->end_date ?? 'Operação em andamento' }}</td>
                    <td><span class="badge {{ $item->operation->status ? 'bgc-green-50 c-green-700' : 'bgc-red-50 c-red-700' }}  p-10 lh-0 tt-c badge-pill">{{ $item->operation->status ? 'EM ANDAMENTO' : 'ENCERRADA' }}</span></td>
                    <td>
                        <ul class="list-inline">
                            {{--                            <li class="list-inline-item">--}}
                            {{--                                <a href="{{ route(ADMIN . '.users.edit', $item->id) }}" title="Visualizar Anexos" class="btn btn-success btn-sm"><span class="ti-envelope"></span></a>--}}
                            {{--                            </li>--}}
                            <li class="list-inline-item">
                                <a href="{{ route(ADMIN . '.operations.show', $item->id) }}" title="Abrir Operação" class="btn btn-primary btn-sm"><span class="ti-search"></span></a>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>

@endsection
