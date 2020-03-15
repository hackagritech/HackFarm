@extends('admin.default')

@section('content')

    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        @unlessrole('operator')
        <div class="masonry-item  w-100">
            <div class="row gap-20">
                <!-- #Toatl Visits ==================== -->
                @role('producer')
                <div class='col-md-3'>
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Total de operadores</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash"></span>
                                </div>
                                <div class="peer">
                                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">+10</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endrole
                @role('manager')
                <div class='col-md-3'>
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Total de Operações em andamento</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash"></span>
                                </div>
                                <div class="peer">
                                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">+10</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endrole

                <!-- #Total Page Views ==================== -->
                <div class='col-md-3'>
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Número de Talhões</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash2"></span>
                                </div>
                                <div class="peer">
                                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">12</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- #Unique Visitors ==================== -->
                <div class='col-md-3'>
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Número de Operações na semana</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash3"></span>
                                </div>
                                <div class="peer">
                                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">9</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- #Bounce Rate ==================== -->
                <div class='col-md-3'>
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Número de operações no mês</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash4"></span>
                                </div>
                                <div class="peer">
                                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">25</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endunlessrole
        <div class="masonry-item col-md-6">

            @role('operator')
            @if($hasActiveOperation == 0)
                <div class="bd bgc-white">
                    <div class="layers">
                        <div class="layer w-100 p-20">
                            <div class="peer peer-greed">
                                <div class="layers">

                                    <!-- Condition -->
                                    <div class="layer w-100">
                                        <h6 class="lh-1">Iniciar Operação</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="peer">
                                <div class="layer">
                                    <small>Iniciar uma nova operação</small><br>
                                    <a href="{{ route(ADMIN . '.operations.create') }}?initial=1" class="btn btn-primary w-100 mT-40">Nova Operação</a>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            @else
                <div class="bd mB-30 bgc-white">
                    <div class="layers">
                        <div class="layer w-100 p-20">
                            <div class="peer">
                                <div class="layer">
                                    <h6 class="lh-1">Iniciar Operação</h6>
                                    <small>Já existe uma operação em aberto</small><br>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            @endif
            @endrole

            <div class="bd  bgc-white">
                <div class="layers">
                    <div class="layer w-100 p-20">
                        <h6 class="lh-1">Operação em Andamento/Agendadas</h6>
                    </div>
                    <div class="layer w-100">
                        <div class="table-responsive p-20">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class=" bdwT-0">Operador</th>
                                    <th class=" bdwT-0">Horário de Início</th>
                                    <th class=" bdwT-0">Horário de Encerramento</th>
                                    <th class=" bdwT-0">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @role('operator')
                                    @foreach($operations as $item)
                                        <tr>
                                            <td class="fw-600">{{ $item->operator->name }}</td>
                                            <td>{{$item->operation->start_date }}</td>
                                            <td>{{$item->operation->end_date ?? 'Em andamento' }}</td>
                                            <td>
                                                @if($item->operation->status)
                                                    <a href="{{ route(ADMIN . '.operations.endOperation', $item->operation->id) }}?initial=1" class="btn btn-danger btn-sm w-100">Encerrar Operação</a>
                                                    @else
                                                    <span class="badge {{ $item->operation->status ? 'bgc-green-50 c-green-700' : 'bgc-red-50 c-red-700' }}  p-10 lh-0 tt-c badge-pill">
                                                    {{ $item->operation->status ? 'Em andamento' : 'Encerrada' }}
                                                </span>
                                                    @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    @foreach($operations as $item)
                                        <tr>
                                            <td class="fw-600">{{ $item->report->operator->name }}</td>
                                            <td>{{$item->start_date }}</td>
                                            <td>{{$item->end_date ?? 'Em andamento' }}</td>
                                            <td><span class="badge {{ $item->status ? 'bgc-green-50 c-green-700' : 'bgc-red-50 c-red-700' }}  p-10 lh-0 tt-c badge-pill">{{ $item->status ? 'Em andamento' : 'Encerrada' }}</span> </td>
                                        </tr>
                                    @endforeach
                                    @endrole

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="ta-c bdT w-100 p-20">
                    <a href="{{ route(ADMIN . '.operations.index') }}">Ver todas as operações</a>
                </div>
            </div>
        </div>
        <div class="masonry-item col-md-6">
            <!-- #Weather ==================== -->
            <div class="bd bgc-white p-20">
                <div class="layers">
                    <!-- Widget Title -->
                    <div class="layer w-100 mB-20">
                        <h6 class="lh-1">Clima</h6>
                    </div>

                    <!-- Today Weather -->
                    <div class="layer w-100">
                        <div class="peers ai-c jc-sb fxw-nw">
                            <div class="peer peer-greed">
                                <div class="layers">
                                    <!-- Temprature -->
                                    <div class="layer w-100">
                                        <div class="peers fxw-nw ai-c">
                                            <div class="peer mR-20">
                                                <h3>32<sup>°C</sup></h3>
                                            </div>
                                            <div class="peer">
                                                <canvas class="sleet" width="44" height="44"></canvas>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Condition -->
                                    <div class="layer w-100">
                                        <span class="fw-600 c-grey-600">Parcialmente Nublado</span>
                                    </div>
                                </div>
                            </div>
                            <div class="peer">
                                <div class="layers ai-fe">
                                    <div class="layer">
                                        <h5 class="mB-5">Domingo</h5>
                                    </div>
                                    <div class="layer">
                                        <span class="fw-600 c-grey-600">Mar, 15 2020</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Today Weather Extended -->
                    <div class="layer w-100 mY-30">
                        <div class="layers bdB">
                            <div class="layer w-100 bdT pY-5">
                                <div class="peers ai-c jc-sb fxw-nw">
                                    <div class="peer">
                                        <span>Velocidade dos Ventos</span>
                                    </div>
                                    <div class="peer ta-r">
                                        <span class="fw-600 c-grey-800">10km/h</span>
                                    </div>
                                </div>
                            </div>
                            <div class="layer w-100 bdT pY-5">
                                <div class="peers ai-c jc-sb fxw-nw">
                                    <div class="peer">
                                        <span>Nascer do Sol</span>
                                    </div>
                                    <div class="peer ta-r">
                                        <span class="fw-600 c-grey-800">05:00 AM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Week Forecast -->
                    <div class="layer w-100">
                        <div class="peers peers-greed ai-fs ta-c">
                            <div class="peer">
                                <h6 class="mB-10">DOM</h6>
                                <canvas class="sleet" width="30" height="30"></canvas>
                                <span class="d-b fw-600">32<sup>°C</sup></span>
                            </div>
                            <div class="peer">
                                <h6 class="mB-10">SEG</h6>
                                <canvas class="clear-day" width="30" height="30"></canvas>
                                <span class="d-b fw-600">30<sup>°C</sup></span>
                            </div>
                            <div class="peer">
                                <h6 class="mB-10">TER</h6>
                                <canvas class="partly-cloudy-day" width="30" height="30"></canvas>
                                <span class="d-b fw-600">28<sup>°C</sup></span>
                            </div>
                            <div class="peer">
                                <h6 class="mB-10">QUA</h6>
                                <canvas class="cloudy" width="30" height="30"></canvas>
                                <span class="d-b fw-600">32<sup>°C</sup></span>
                            </div>
                            <div class="peer">
                                <h6 class="mB-10">QUI</h6>
                                <canvas class="snow" width="30" height="30"></canvas>
                                <span class="d-b fw-600">24<sup>°C</sup></span>
                            </div>
                            <div class="peer">
                                <h6 class="mB-10">SEX</h6>
                                <canvas class="wind" width="30" height="30"></canvas>
                                <span class="d-b fw-600">28<sup>°C</sup></span>
                            </div>
                            <div class="peer">
                                <h6 class="mB-10">SAB</h6>
                                <canvas class="sleet" width="30" height="30"></canvas>
                                <span class="d-b fw-600">32<sup>°C</sup></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
