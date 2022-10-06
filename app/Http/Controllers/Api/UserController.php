<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $data = Patient::all();
        if($data) return Response::reply(true, 200, 'Berhasil', $data, 'Data seluruh pasien');

        return Response::reply(false, 500, 'Gagal');
        
    }
}
