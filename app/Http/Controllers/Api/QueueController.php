<?php

namespace App\Http\Controllers\Api;

use App\Models\Queue;
use App\Models\Patient;
use App\Helpers\Response;
use App\Models\Timetable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QueueController extends Controller
{
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

    public function addQueue(Request $req){
        $req->validate([
            'patient_id' => 'required|integer',
            'service_id' => 'required|integer',
            'doctor_id' => 'required|integer',
            'timetable_id' => 'required|integer',
        ]);
        $queue = Queue::create($req->all());

        // mengurangi kuota
        $timetable = Timetable::where('id', $req->timetable_id)->update(['quota' => Timetable::find($req->timetable_id)->quota - 1]);

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
