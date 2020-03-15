<?php


namespace App\Enumerations;


class Machinery
{
    const HARVESTER = 'COLHEITADEIRA';
    const PLANTER = 'PLANTADEIRA';
    const FARM_SPRAYER = 'PULVERIZADOR';

    const all = [
        self::HARVESTER,
        self::PLANTER,
        self::FARM_SPRAYER,
    ];

    public static function needMaterial($machinery)
    {
        switch ($machinery){
            case self::HARVESTER:
                return false;
            default:
                return true;
        }
    }
}
