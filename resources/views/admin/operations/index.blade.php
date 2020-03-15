@extends('admin.default')

@section('page-header')
    Operações <small>{{ trans('app.manage') }}</small>
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
            @role('operator')
            @foreach ($items as $item)
                <tr>
                    <td><a href="{{ route(ADMIN . '.operations.show', $item->id) }}">#{{ $item->code }}</a></td>
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
            @else
            @foreach ($items as $item)
                <tr>
                    <td><a href="{{ route(ADMIN . '.operations.show', $item->id) }}">#{{ $item->code }}</a></td>
                    <td>{{ $item->report->operator->name }}</td>
                    <td>{{ $item->report->type }}</td>
                    <td>#{{ $item->report->field->code }}</td>
                    <td>{{ $item->start_date }}</td>
                    <td>{{ $item->end_date ?? 'Operação em andamento' }}</td>
                    <td><span class="badge {{ $item->status ? 'bgc-green-50 c-green-700' : 'bgc-red-50 c-red-700' }}  p-10 lh-0 tt-c badge-pill">{{ $item->status ? 'EM ANDAMENTO' : 'ENCERRADA' }}</span></td>
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
                @endrole
            </tbody>

        </table>
    </div>

@endsection
