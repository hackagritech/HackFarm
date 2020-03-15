<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationReport extends Model
{

    public $fillable = ['diesel', 'type', 'machinery', 'machinery_model', 'observation', 'observation_maintenance'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function operation()
    {
        return $this->hasOne(Operation::class, 'operation_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function operator()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function field()
    {
        return $this->belongsTo(Field::class, 'field_id', 'id');
    }
}
