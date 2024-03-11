<?php

namespace App\Http\Controllers;

use App\Models\Records;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordsController extends Controller
{
    public function getForUser()
    {
        $res = Records::query()
                ->select('records.date', 'doctors.full_name', 'doctor_types.name as type_name', 'records.id as id')
                ->leftJoin('doctors', 'doctors.id', '=', 'records.doctor_id')
                ->leftJoin('doctor_types', 'doctor_types.id', '=', 'doctors.type_id')
                ->where('records.user_id', '=', Auth::user()['id'])
                ->get();

        return $res;
    }

    public function create(Request $request)
    {
        $data =
            [
                'user_id' => Auth::user()['id'],
                'doctor_id' => $request['doctor_id'],
                'date' => $request['date']
            ];

        Records::create($data);
    }
}
