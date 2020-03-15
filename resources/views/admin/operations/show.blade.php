@extends('admin.default')

@section('page-header')
    Operação <small>#{{ $item->id }}</small>
@endsection

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20"><h4 class="c-grey-900 mB-20">Operação
                    de {{ $item->report->type }}</h4>
                <p>Operação realizada no
                    dia {{ $item->start_date }} {{ $item->end_date == null ? '.' : 'e encerrada no dia' . $item->end_date . '.' }}</p>
                <p>Realizada pelo operador: <strong>{{ $item->report->operator->name }}</strong></p>
                <hr>
                <h4 class="mB-30 text-center">Dados da operação:</h4>
                <div class="row">
                    <div class="col-3">
                        <p><strong>Talhão:</strong> #{{ $item->report->field->code }}</p>
                    </div>
                    <div class="col-3">
                        <p><strong>Tipo de Operação:</strong> {{ $item->report->type }}</p>
                    </div>
                    <div class="col-3">
                        <p><strong class="text-black">Maquinário
                                Utilizado:</strong> {{ $item->report->machinery_model }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <p><strong>Velocidade:</strong> 10 Km/h</p>
                    </div>
                    <div class="col-3">
                        <p><strong>Combustivel Consumido:</strong> {{ $item->report->diesel }}</p>
                    </div>
                </div>

                <hr>
                <h4 class="mB-30 text-center">Materiais utilizados na operação:</h4>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#codigo</th>
                        <th scope="col">categoria do material</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Quantidade</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">#1</th>
                        <td>Fertilizante</td>
                        <td>Ureia</td>
                        <td>500 kg</td>
                    </tr>
                    <tr>
                        <th scope="row">#2</th>
                        <td>Corretivo</td>
                        <td>Calcário</td>
                        <td>600 Kg</td>
                    </tr>
                    </tbody>
                </table>
                <small>Produtos meramente para ilustração</small>

                <hr>
                <h4 class="mB-30 text-center">Problemas Relatados:</h4>

                <p class="text-center">
                    <span>{{ $item->report->observation_maintenance ?? 'Nenhum problema informado' }}</span>
                </p>
                <hr>
                <h4 class="text-center">Demais observaçeõs do operador:</h4>
                <p class="text-center"><span>
                        {{ $item->report->observation ?? 'Nenhuma observação informada' }}
                    </span>
                </p>
                <hr>
                <h4 class="text-center">Anexos da Operação:</h4>
                <div class="text-center">
                    <button type="button" class="btn cur-p btn-secondary "><i class="ti-package mr-3"></i>Baixar Anexos</button>
                </div>

            </div>
        </div>
    </div>

@endsection
