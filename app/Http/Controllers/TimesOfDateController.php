<?php

namespace App\Http\Controllers;

use App\Models\Times;
use App\Models\TimesOfDate;
use Carbon\Carbon;
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
            ->sortBy('date')
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

    public function createTicket(Request $request)
    {
        TimesOfDate::query()
            ->where(['doctor_id' => $request['doctor'], 'times_id' => $request['time'], 'date' => $request['date']])
            ->update(['busy' => true, 'user_id' => $request['user']]);

        return back();
    }

    public function getLostUserRecords($id)
    {
        $res = TimesOfDate::query()
            ->select('doctors.full_name as doctor_name',
                'doctor_types.name as doctor_type_name',
                'times.time',
                'times_of_dates.date')
            ->leftJoin('doctors', 'doctors.id', '=', 'times_of_dates.doctor_id')
            ->leftJoin('doctor_types', 'doctor_types.id', '=', 'doctors.type_id')
            ->leftJoin('times', 'times.id', '=', 'times_of_dates.times_id')
            ->where(['times_of_dates.user_id' => $id])
            ->where('times_of_dates.date', '<', Carbon::now())
            ->orderBy('times_of_dates.date')
            ->get();

        return $res;
    }

    public function getActiveUserRecords($id)
    {
        $res = TimesOfDate::query()
            ->select('doctors.full_name as doctor_name',
                'doctor_types.name as doctor_type_name',
                'times.time',
                'times_of_dates.date',
                'times_of_dates.id')
            ->leftJoin('doctors', 'doctors.id', '=', 'times_of_dates.doctor_id')
            ->leftJoin('doctor_types', 'doctor_types.id', '=', 'doctors.type_id')
            ->leftJoin('times', 'times.id', '=', 'times_of_dates.times_id')
            ->where(['times_of_dates.user_id' => $id])
            ->where('times_of_dates.date', '>=', Carbon::now())
            ->orderBy('times_of_dates.date')
            ->get();

        return $res;
    }

    public function getActiveDoctorRecords($id)
    {
        $res = TimesOfDate::query()
            ->select('times.time',
                'times_of_dates.date',
                'users.full_name as name')
            ->leftJoin('times', 'times.id', '=', 'times_of_dates.times_id')
            ->leftJoin('users', 'users.id', '=', 'times_of_dates.user_id')
            ->where(['times_of_dates.doctor_id' => $id, 'times_of_dates.busy' => true])
            ->where('times_of_dates.date', '>=', Carbon::now())
            ->orderBy('times_of_dates.date')
            ->get();

        return $res;
    }

    public function rejectRecord($id)
    {
        TimesOfDate::query()
            ->where(['id' => $id])
            ->update(['user_id' => null, 'busy' => false]);

        return back();
    }

    public function getAllRecords()
    {
        $res = TimesOfDate::query()
            ->select('times.time',
                'times_of_dates.date', 'times_of_dates.id',
                'users.full_name as user_name', 'users.number as user_number',
                'doctors.full_name as doctor_name')
            ->leftJoin('times', 'times.id', '=', 'times_of_dates.times_id')
            ->leftJoin('users', 'users.id', '=', 'times_of_dates.user_id')
            ->leftJoin('doctors', 'doctors.id', '=', 'times_of_dates.doctor_id')
            ->where('times_of_dates.date', '>=', Carbon::now())
            ->where(['times_of_dates.busy' => true])
            ->orderBy('doctors.full_name')
            ->orderBy('times_of_dates.date')
            ->get();

        return $res;
    }

    public function getAllRecordsWithDoctor($id)
    {
        $res = TimesOfDate::query()
            ->select('times.time',
                'times_of_dates.date', 'times_of_dates.id',
                'users.full_name as user_name', 'users.number as user_number',
                'doctors.full_name as doctor_name')
            ->leftJoin('times', 'times.id', '=', 'times_of_dates.times_id')
            ->leftJoin('users', 'users.id', '=', 'times_of_dates.user_id')
            ->leftJoin('doctors', 'doctors.id', '=', 'times_of_dates.doctor_id')
            ->where('times_of_dates.date', '>=', Carbon::now())
            ->where(['times_of_dates.busy' => true, 'times_of_dates.doctor_id' => $id])
            ->orderBy('doctors.full_name')
            ->orderBy('times_of_dates.date')
            ->get();

        return $res;
    }
}
