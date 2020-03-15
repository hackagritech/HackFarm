<?php

namespace App\Http\Producer\Controllers;

use App\Field;
use App\Http\Controllers\Controller;
use App\Operation;

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
        return view('admin.producer.operations.index', compact('items'));
//        return view('admin.producer.operations.index', compact('items'));
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

        return view('admin.producer.operations.show', compact('item'));
    }

    public function fields($id)
    {
        $items = Field::findOrFail($id)->reports;

        return view('admin.producer.operations.fields', compact('items'));
    }

}
