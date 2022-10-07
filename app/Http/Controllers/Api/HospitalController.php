<?php

namespace App\Http\Controllers\Api;

use App\Models\Service;
use App\Models\Hospital;
use App\Helpers\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Queue;
use App\Models\Timetable;

class HospitalController extends Controller
{
    public function index(){
        $data = Hospital::all();
        return Response::reply(true, 200, 'Berhasil', $data);
    }

    public function service(){
        $data = Service::all()->map(function($row){
            return [
                'id' => str($row->id)->toString(),
                'name' => $row->name,
                'image' => $row->image,
                'image_url' => asset('image/services/'.$row->image),
                'category' => $row->service_category->name ?? 'belum ada'
            ];
        });

        return Response::reply(true, 200, 'Berhasil', $data);
    }

    public function doctors(){
        $data = Doctor::all();

        if(!$data) return Response::reply(false, 500, 'Gagal');
        return Response::reply(true, 200, 'Berhasil', $data, 'Data semua dokter');
    }

    public function timetables($doctor_id){
        $data = Timetable::where('doctor_id', $doctor_id)->get();

        if(!$data) return Response::reply(false, 500, 'Gagal');
        return Response::reply(true, 200, 'Berhasil', $data, 'Data waktu ketersediaan dokter '.Doctor::find($doctor_id)->name);
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

        return Response::reply(true, 200, 'Berhasil', $data, 'Data antrian pasien '.$patient->name);
    }

    public function addQueue($patient_id, $service_id, $doctor_id, $timetable_id){
        $queue = Queue::create([
            'patient_id' => $patient_id,
            'doctor_id' => $doctor_id,
            'timetable_id' => $timetable_id,
            'service_id' => $service_id,
        ]);

        if(!$queue) return Response::reply(false, 500, 'Gagal');
        return Response::reply(true, 200, 'Data antrian '.Patient::find($patient_id)->name.' berhasil ditambahkan', $queue);
        
    }

    public function doneQueue($queue_id){
        $queue = Queue::where('id', $queue_id)->update([
            'status' => 'done'
        ]);

        if(!$queue) return Response::reply(false, 500, 'Tidak berhasil');
        return Response::reply(true, 200, 'Berhasil', $queue, 'Berhasil, data antrian telah selesai');
    }

}
