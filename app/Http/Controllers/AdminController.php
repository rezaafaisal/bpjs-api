<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Helpers\View;
use App\Models\Queue;
use App\Helpers\Alert;
use App\Models\Doctor;
use App\Models\Polyclinic;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $data = [
            'active' => 'verifikasi',
            'data' => Queue::all()
        ];
        return view('index', $data);
    }

    public function doctor_poly(Request  $req){
        $data = [
            'active' => 'dokter',
            'data' => Polyclinic::find($req->id)->services->where('hospital_id', 1)->first()->doctors->map(function($row){
                return [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'specialist' => $row['specialist'],
                    'time' => $row
                ];
            }),
            'polyclinic' => Service::where('hospital_id', Auth::user()->officer->hospital_id)->get()->map(function($row){
                return [
                    'id' => $row->polyclinic->id,
                    'name' => $row->polyclinic->name
                ];
            }),
        ];
        // return $data['polyclinic'];
        return view('doctor', $data);
    }
    
    public function doctor(){
        $data = [
            'active' => 'dokter',
            'data' => Doctor::where('hospital_id', Auth::user()->officer->hospital_id)->get()->map(function($row){
                return $row->times->map(function($item){
                    return [
                        'id' => $item->doctor->id,
                        'name' => $item->doctor->name,
                        'specialist' => $item->doctor->specialist,
                        'time' => $item
                    ];
                });
            }),
            'polyclinic' => Service::where('hospital_id', Auth::user()->officer->hospital_id)->get()->map(function($row){
                return [
                    'id' => $row->polyclinic->id,
                    'name' => $row->polyclinic->name
                ];
            }),
        ];
        // return $data['polyclinic'];
        return view('doctor', $data);
    }

    public function review(){
        $data = [
            'active' => 'review',
            'data' => Rate::all()
        ];
        return view('review', $data);
    }

    public function done($queue_id){
        $queue = Queue::where('id', $queue_id)->update([
            'status' => 'done'
        ]);

        if($queue) {
            Alert::alert_success('Berhasil', 'Pasien berhasil di verifikasi');
            return redirect()->back();
        }
    }
}
