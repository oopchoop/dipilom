<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    public function getDoctor($id)
    {
        $res = Doctors::query()
            ->select('doctors.*', 'doctor_types.name as type_name')
            ->leftJoin('doctor_types', 'doctor_types.id', '=', 'doctors.type_id')
            ->where('doctors.id', '=', $id)
            ->get()[0];

        return $res;
    }
}
