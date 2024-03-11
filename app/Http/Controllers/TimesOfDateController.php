<?php

namespace App\Http\Controllers;

use App\Models\Times;
use App\Models\TimesOfDate;
use DateTime;
use Illuminate\Http\Request;

class TimesOfDateController extends Controller
{
    public function getDate($id)
    {
        $resultArr = [];

        $res = TimesOfDate::query()
            ->where('times_of_dates.doctor_id', '=', $id)
            ->get()
            ->groupBy('date');

        foreach ($res as $k => $v)
        {
            $times = [];
            $date = '';
            $doctor = '';

            foreach ($v as $value)
            {
                $date = $value['date'];
                $doctor = $value['doctor_id'];

                $times []=
                    [
                        'time' => Times::query()
                            ->select('time')
                            ->where('id', '=', $value['times_id'])
                            ->get()[0]['time'],
                        'time_id' => $value['times_id'],
                        'busy' => $value['busy']
                    ];
            }



            $resultArr[$k] []=
                [

                    'date' => DateTime::createFromFormat('Y-m-d', $date)->format('d.m'),
                    'doctor_id' => $doctor,
                    'times' => $times
                ];
        }

        return $resultArr;
    }
    
    public function addDate(Request $request)
    {
        $resData = [];

        $times = Times::all();

        foreach ($times as $time)
        {
            $resData []=
                [
                    'doctor_id' => $request['doctor_id'],
                    'times_id' => $time['id'],
                    'busy' => false,
                    'date' => $request['date']
                ];
        }

        TimesOfDate::query()->insert($resData);

        return redirect('/adminsch');
    }
}
