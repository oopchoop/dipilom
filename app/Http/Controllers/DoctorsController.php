<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorsController extends Controller
{
    public function doctorsList()
    {
        $res = Doctors::all();

        return $res;
    }

    public function getDoctor($id)
    {
        $res = Doctors::query()
            ->select('doctors.*', 'doctor_types.name as type_name')
            ->leftJoin('doctor_types', 'doctor_types.id', '=', 'doctors.type_id')
            ->where('doctors.id', '=', $id)
            ->get()[0];

        return $res;
    }

    public function getDoctorWithTypeId($id)
    {
        $res = Doctors::query()
            ->select('doctors.*', 'doctor_types.name as type_name')
            ->leftJoin('doctor_types', 'doctor_types.id', '=', 'doctors.type_id')
            ->where('doctor_types.id', '=', $id)
            ->get();


        return $res;
    }

    public function createDoctor(Request $request)
    {
        $filePath = $request->file('doctor_photo')->store('uploads', 'public');

        $file = explode('/', $filePath)[1];

        $doctorData =
            [
                'type_id' => $request['doctor_special_id'],
                'full_name' => $request['doctor_name'],
                'image' => $file,
                'exp' => $request['doctor_experience']
            ];

        $newDoctor = Doctors::create($doctorData);

        $userData =
            [
                'full_name' => $request['doctor_name'],
                'number' => $request['doctor_number'],
                'password' => Hash::make($request['doctor_password']),
                'isDoctor' => true,
                'doctor_id' => $newDoctor['id']
            ];

        User::create($userData);

        return redirect('/admindoc');
    }
}
