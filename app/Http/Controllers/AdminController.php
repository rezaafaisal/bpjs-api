<?php

namespace App\Http\Controllers;

use App\Helpers\Alert;
use App\Helpers\View;
use App\Models\Queue;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $data = [
            'active' => 'verifikasi',
            'data' => Queue::all()
        ];
        return view('index', $data);
    }

    public function done($queue_id){
        $queue = Queue::where('id', $queue_id)->update([
            'status' => 'wait'
        ]);

        if($queue) {
            Alert::alert_success('Berhasil', 'Pasien berhasil di verifikasi');
            return redirect()->back();
        }

    }
}
