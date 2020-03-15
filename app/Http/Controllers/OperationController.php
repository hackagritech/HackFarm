<?php

namespace App\Http\Controllers;

use App\Field;
use App\Operation;
use App\OperationReport;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $items = Operation::latest('updated_at')->get();
        if (Auth::user()->hasRole('operator')){
            $items = Auth::user()->operations()->whereHas('operation', function (Builder $query){
                $query->orderBy('status');
            })->get();
        }

        return view('admin.operations.index', compact('items'));
    }

    /**
     * Display the specified resource
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $item = Operation::findOrFail($id);

        return view('admin.operations.show', compact('item'));
    }

    public function create()
    {
        if (Auth::user()->hasRole('operator')){
            return view('admin.operations.create_operator');
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function fields($id)
    {
        $items = Field::findOrFail($id)->reports;
        return view('admin.operations.fields', compact('items'));
    }

    public function initialStore(Request $request)
    {
        $hasActiveOperation = \Auth::user()->operations()->whereHas('operation', function (Builder $query){
            $query->where('status', '=', true);
        })->count();

        if ($hasActiveOperation > 0){
            return back()->withErrors('Já existe uma operação em andamento!');
        }

        $field = Field::where('code', '=', $request->input('field'))->first();

        $report = new OperationReport();
        $report->fill($request->all());
        $report->field()->associate($field);
        $report->operator()->associate(Auth::user());
        $report->save();

        $operation = new Operation();
        $operation->start_date = Carbon::now();
        $operation->status = true;
        $operation->report()->associate($report);
        $operation->save();

        return back()->withSuccess(trans('app.success_store'));
    }

    public function endOperation($id)
    {
        $operation = Operation::findOrFail($id);
        return view('admin.operations.end_operation', compact('operation'));
    }

    public function finishStore(Request $request)
    {
        $report = OperationReport::findOrFail($request->input('id'));
        $report->fill($request->all());
        $report->save();

        $report->operation->status = false;
        $report->operation->end_date = Carbon::now();
        $report->operation->save();

        return redirect()->route('dash')->withSuccess('Operação encerrada com sucesso');
    }

}
