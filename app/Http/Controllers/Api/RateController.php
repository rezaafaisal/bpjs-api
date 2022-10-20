<?php

namespace App\Http\Controllers\Api;

use App\Models\Rate;
use App\Models\Queue;
use App\Models\Patient;
use App\Models\Service;
use App\Helpers\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RateController extends Controller
{
    public function rate(Request $req, $queue_id){
        $req->validate([
            'rate' => 'required|min:1|max:5|numeric'
        ]);
        $queue = Queue::find($queue_id);
        if($queue->status != 'done') return Response::reply(false,400, 'Silahkan ke rumah sakit dahulu');
        if($queue->is_reviewed ) return Response::reply(false, 400, 'Pasien ini telah melakukan review');

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
            $rating = Rate::where('service_id', $queue->service_id)->get();

            // inisialisasi
            $rates = [
                '1' => 0,
                '2' => 0,
                '3' => 0,
                '4' => 0,
                '5' => 0,
            ];

            // hitung jumlah per rating
            foreach ($rating as $key => $row) {
                if($row->rate == 1) $rates['1']++;
                else if($row->rate == 2) $rates['2']++;
                else if($row->rate == 3) $rates['3']++;
                else if($row->rate == 4) $rates['4']++;
                else if($row->rate == 5) $rates['5']++;
            }

            // total semua hasil operasi rating
            $rates = array_sum([
                '1' => $rates['1'] * 1,
                '2' => $rates['2'] * 2,
                '3' => $rates['3'] * 3,
                '4' => $rates['4'] * 4,
                '5' => $rates['5'] * 5,
            ]);

            // rumus rating (hasil operasi rating : total user)
            $rate = $rates / $rating->count();
            
            $service = Service::find($queue->service_id)->update(['rate' => $rate]);

            return Response::reply($service, 200, 'berhasil mengulas', $rate);
        }

        return Response::reply(false, 500, 'Gagal');
        
    }
}
