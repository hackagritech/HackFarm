<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public $fillable = ['code', 'area'];

    /**
     * @param bool $update
     * @param null $id
     * @return array
     */
    public static function rules($update = false, $id = null)
    {
        $defaultRules = [
            'code'    => "required|unique:fields,code",
            'area' => "required|numeric",
        ];

        return $defaultRules;

    }

    public function reports()
    {
        return $this->hasMany(OperationReport::class, 'field_id', 'id');
    }
}
