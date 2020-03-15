<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{

    public $fillable = ['start_date', 'end_date', 'status'];

    public $dates = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];


    public function report()
    {
        return $this->belongsTo(OperationReport::class, 'operation_id', 'id');
    }
}
