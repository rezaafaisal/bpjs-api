<?php

namespace App\Http\Controllers\Api;

use App\Models\Service;
use App\Models\Hospital;
use App\Helpers\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HospitalController extends Controller
{
    public function index(){
        $data = Hospital::all();
        return Response::reply(true, 200, 'Berhasil', $data);
    }

    public function service(){
        $data = Service::all()->map(function($row){
            return [
                'id' => $row->id,
                'name' => $row->name,
                'image' => $row->image,
                'image_url' => asset('image/services/'.$row->image),
                'category' => $row->service_category->name ?? 'belum ada'
            ];
        });

        return Response::reply(true, 200, 'Berhasil', $data);
    }

}
