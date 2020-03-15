<?php

namespace App\Http\Controllers;

use App\Operation;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class DashboardController extends Controller
{
    public function index()
    {
        $operations = Operation::where('status', '=', true)->limit(9)->get();

        if (\Auth::user()->hasRole('producer')) {
            return view('admin.dashboard.index', compact('operations'));
        } elseif (\Auth::user()->hasRole('manager')) {
            return view('admin.dashboard.index', compact('operations'));
        } elseif (\Auth::user()->hasRole('operator')) {

            $hasActiveOperation = \Auth::user()->operations()->whereHas('operation', function (Builder $query){
                $query->where('status', '=', true);
            })->count();

            $operations = \Auth::user()->operations()->whereHas('operation', function (Builder $query){
                $query->orderBy('status');
            })->limit(9)->get();
            return view('admin.dashboard.index', compact('operations', 'hasActiveOperation'));
        } else {
            \Auth::logout();
        }
    }
}
