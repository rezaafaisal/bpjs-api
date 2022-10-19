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

    public function queues($patient_id){
        $patient = Patient::find($patient_id);
        $data = Queue::where('patient_id', $patient_id)->get()->map(function($row){
            return [
                'id' => str($row->id)->toString(),
                'layanan' => $row->service->name,
                'nama_dokter' =>  $row->doctor->name,
                'hari' => $row->timetable->day,
                'mulai_jam' => $row->timetable->start,
                'sampai_jam' => $row->timetable->until,
                'status' => $row->status,
                'is_reviewed' => $row->is_reviewed ? 'Sudah' : 'Belum'
            ];
        });

        if(!$data) return Response::reply(false, 500, 'Gagal');

        // return Response::reply(true, 200, 'Berhasil', $data);
        return response()->json($data, 200);
    }

    public function addQueue($patient_id, $service_id, $doctor_id, $timetable_id){
        $queue = Queue::create([
            'patient_id' => $patient_id,
            'doctor_id' => $doctor_id,
            'timetable_id' => $timetable_id,
            'service_id' => $service_id,
        ]);

        // mengurangi kuota
        $timetable = Timetable::where('id', $timetable_id)->update(['quota' => Timetable::find($timetable_id)->quota - 1]);

        if(!$queue || !$timetable) return Response::reply(false, 500, 'Gagal');

        // return Response::reply(true, 200, 'Data antrian '.Patient::find($patient_id)->name.' berhasil ditambahkan', $queue);

        return response()->json($queue, 200);
        
    }

    public function doneQueue($queue_id){
        $queue = Queue::where('id', $queue_id)->update([
            'status' => 'done'
        ]);

        if(!$queue) return Response::reply(false, 500, 'Tidak berhasil');
        // return Response::reply(true, 200, 'Berhasil', $queue);
        return response()->json($queue, 200);
    }

}
