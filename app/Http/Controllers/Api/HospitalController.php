<?php

namespace App\Http\Controllers\Api;

use App\Models\Service;
use App\Models\Hospital;
use App\Helpers\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Polyclinic;
use App\Models\Queue;
use App\Models\Timetable;

class HospitalController extends Controller
{
    public function index($polyclinic_id){
        $data = Service::where('polyclinic_id', $polyclinic_id)->get()->map(function($row){
            return [
                'id' => $row->id,
                'name' => $row->hospital->name,
                'phone' => $row->hospital->phone,
                'address' => $row->hospital->address,
                'rate' => $row->rate
            ];
        });

        // return Response::reply(true, 200, 'Berhasil', $data);
        return response()->json($data, 200);
    }

    public function service(){
        $data = Polyclinic::all()->map(function($row){
            return [
                'id' => $row->id,
                'name' => $row->name,
                'image_url' => asset('image/services/'.$row->image),
            ];
        });

        return response()->json($data, 200);
    }

    public function doctors($service_id){
        $data = Doctor::where('service_id', $service_id)->get()->map(function($row){
            return [
                'id' => $row->id,
                'name' => $row->name,
                'image_url' => asset('image/doctors/'.$row->image),
                'specialist' => $row->specialist
            ];
        });

        if(!$data) return Response::reply(false, 500, 'Gagal');
        // return Response::reply(true, 200, 'Berhasil', $data);
        return response()->json($data, 200);
    }

    public function timetables($doctor_id){
        $data = Timetable::where('doctor_id', $doctor_id)->get();

        if(!$data) return Response::reply(false, 500, 'Gagal');
        // return Response::reply(true, 200, 'Berhasil', $data);
        return response()->json($data, 200);
    }

}
