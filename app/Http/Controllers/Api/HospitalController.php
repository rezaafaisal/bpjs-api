<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Response;

class HospitalController extends Controller
{
    public function index(){
        return Response::reply(true, 200, 'Berhasil');
    }
}
