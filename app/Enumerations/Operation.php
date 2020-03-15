<?php


namespace App\Enumerations;


class Operation
{
    const PLANTING = 'PLANTIO';
    const SPRAY = 'PULVERIZAÇÃO';
    const FERTILIZING = 'FERTILIZAÇÃO';
    const HARVEST = 'COLHEITA';

    const all = [
        self::PLANTING,
        self::SPRAY,
        self::FERTILIZING,
        self::HARVEST
    ];

}
