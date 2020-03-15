<div class="row mB-40">

    @if($finish)
        <div class="col-sm-8">
            <div class="bgc-white p-20 bd">
                <input type="hidden" name="id" value="{{ $operation->report->id }}">
                <div class="form-group">
                    <label for="operator">Operador</label>
                    <input class="form-control" name="operator" type="text" id="operator" value="{{ $operation->report->operator->name }}" disabled>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="inputState">Talhão da Operação</label>
                        <select id="inputState" name="field" disabled class="form-control" required>
                            <option value="" selected>{{ $operation->report->field->code }}</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputState">Tipo da Operação</label>
                        <select id="inputState" name="type" disabled class="form-control" required>
                            <option  value="" selected>{{ $operation->report->type }}</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputState">Tipo de Maquinário</label>
                        <select id="inputState" name="machinery" disabled class="form-control" required>
                            <option value="" selected >{{ $operation->report->machinery }}</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="machinery_model">Modelo de Maquinário</label>
                    <input class="form-control" required="required" name="machinery_model" type="text" disabled value="{{ $operation->report->machinery_model }}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Ocorreu alguma Manutenção/Problema inesperado? qual?</label>
                    <textarea class="form-control" name="observation_maintenance" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Observações</label>
                    <textarea class="form-control" name="observation" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="custom-file mT-20">
                    <input type="file" class="custom-file-input" id="validatedCustomFile">
                    <label class="custom-file-label" for="validatedCustomFile">Anexar Arquivos...</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>

            </div>
        </div>
        @else
        <div class="col-sm-8">
            <div class="bgc-white p-20 bd">
                <div class="form-group">
                    <label for="operator">Operador</label>
                    <input class="form-control" name="operator" type="text" id="operator" {{ Auth::user()->hasRole('operator') ? 'disabled value=' . Auth::user()->name : '' }}>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="inputState">Talhão da Operação</label>
                        <select id="inputState" name="field" class="form-control" required>
                            <option value="" selected>Escolher...</option>
                            @foreach(\App\Field::all() as $field)
                                <option>{{ $field->code }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputState">Tipo da Operação</label>
                        <select id="inputState" name="type" class="form-control" required>
                            <option  value="" selected>Escolher...</option>
                            @foreach(\App\Enumerations\Operation::all as $operation)
                                <option>{{ $operation }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputState">Tipo de Maquinário</label>
                        <select id="inputState" name="machinery" class="form-control" required>
                            <option value="" selected>Escolher...</option>
                            @foreach(\App\Enumerations\Machinery::all as $machinery)
                                <option>{{ $machinery }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {!! Form::myInput('text', 'machinery_model', 'Modelo de Maquinário', array('required' => 'required')) !!}

                {!! Form::myInput('text', 'product', 'Adicionar Material', array('required' => 'required')) !!}
                {!! Form::myInput('number', 'qtd', 'Quantidade', array('required' => 'required')) !!}

                {{--            <div class="custom-file mT-20">--}}
                {{--                <input type="file" class="custom-file-input" id="validatedCustomFile" required>--}}
                {{--                <label class="custom-file-label" for="validatedCustomFile">Anexar Arquivos...</label>--}}
                {{--                <div class="invalid-feedback">Example invalid custom file feedback</div>--}}
                {{--            </div>--}}

            </div>
        </div>
        @endif


</div>
