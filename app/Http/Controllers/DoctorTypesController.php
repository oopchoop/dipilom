<?php

namespace App\Http\Controllers;

use App\Models\DoctorTypes;
use Illuminate\Http\Request;

class DoctorTypesController extends Controller
{
    public function getTypes()
    {
        $res = DoctorTypes::all();

        return $res;
    }
}
