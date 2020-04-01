<?php
/**
 * Created by PhpStorm.
 * User: penicamihai
 * Date: 03/06/2018
 * Time: 23:34
 */

namespace App\Helpers;


use App\Modules\Companies\Models\Building;
use App\Modules\Companies\Models\Incident;
use App\Modules\Companies\Models\Office;

class ConstantsHelper
{
    const STRUCTURE_TYPE_OFFICE = Office::class;
    const STRUCTURE_TYPE_BUILDING = Building::class;
    const STRUCTURE_TYPE_FLOOR = Incident::class;
}
