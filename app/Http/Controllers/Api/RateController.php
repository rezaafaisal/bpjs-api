<?php

namespace App\Http\Controllers\Api;

use App\Models\Patient;
use App\Helpers\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Queue;
use App\Models\Rate;

class RateController extends Controller
{
    public function rate(Request $req, $queue_id){
        $req->validate([
            'rate' => 'required'
        ]);
        $queue = Queue::find($queue_id);
        if($queue->is_reviewed && $queue->status == 'done') return Response::reply(false, 400, 'Pasien ini telah melakukan review');

        $rated = Rate::create([
            'patient_id' => $queue->patient_id,
            'service_id' => $queue->service_id,
            'hospital_id' => $queue->service->hospital->id,
            'rate' => $req->rate,
            'comment' => $req->comment??'',
        ]);
        
        if($rated){
            // set antrian selesai review
            $queue->is_reviewed = true;
            $queue->save();

            // kalkulasi rating perlayanan

            
            return Response::reply(true, 200, 'berhasil mengulas');
        }

        return Response::reply(false, 500, 'Gagal');
        
    }
}
