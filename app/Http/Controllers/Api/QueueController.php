<?php

namespace App\Http\Controllers\Api;

use App\Models\Queue;
use App\Models\Patient;
use App\Helpers\Response;
use App\Models\Timetable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LiveOrder;
use App\Models\Service;

class QueueController extends Controller
{
    public function queues($patient_id){
        $data = Queue::where('patient_id', $patient_id)->get()->map(function($row){
            return [
                'id' => $row->id,
                'pasien' => $row->patient->user->name,
                'nomor_kartu' => $row->patient->bpjs_number,
                'nomor_antrian' => $row->order_number,
                'tanggal_lahir' => $row->patient->birthday,
                'nik' => $row->patient->user->nik,
                'rumah_sakit' => $row->service->hospital->name,
                'layanan' => $row->service->polyclinic->name,
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

        // cek apakah sudah memiliki antrian
        if(Queue::where(['patient_id' => $req->patient_id, 'service_id' => $req->service_id, 'status' => 'wait'])->first()){
            return Response::reply(false, 400, 'anda telah mengambil antrian :)');
        }

        // tambah antrian terbaru di tabel live order
        $order = LiveOrder::where('service_id', $req->service_id)->first();
        if(!$order){
            $order = LiveOrder::create(['service_id' => $req->service_id,'current' => 1]);
        }
        else{
            $order->update(['current' => $order->current + 1]);
        }


        // data nomor antrian di queue
        $order_number = Service::find($req->service_id)->polyclinic->code;
        if($order->current < 10){
            $order_number .= '00'.$order->current;
        }
        else if($order->current > 9 && $order->current < 100){
            $order_number .= '0'.$order->current;
        }
        else{
            $order_number .= $order->current;
        }
        
        $data = [
            'patient_id' => $req->patient_id,
            'service_id' => $req->service_id,
            'doctor_id' => $req->doctor_id,
            'timetable_id' => $req->timetable_id,
            'order_number' => $order_number
        ];

        $queue = Queue::create($data);
        
        // mengurangi kuota
        $timetable = Timetable::where('id', $req->timetable_id)->update(['quota' => Timetable::find($req->timetable_id)->quota - 1]);

        if(!$queue || !$timetable) return Response::reply(false, 500, 'Gagal');

        return Response::reply(true, 200, 'Data antrian '.Patient::find($req->patient_id)->name.' berhasil ditambahkan', $queue);

        // return response()->json($queue, 200);
        
    }

    public function doneQueue($queue_id){
        $queue = Queue::where('id', $queue_id)->update([
            'status' => 'done'
        ]);

        if(!$queue) return Response::reply(false, 500, 'Tidak berhasil');
        return Response::reply(true, 200, 'Berhasil', $queue);
        // return response()->json($queue, 200);
    }
}
