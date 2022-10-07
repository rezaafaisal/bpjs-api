<?php

namespace App\Http\Controllers\Api;

use App\Models\Patient;
use App\Helpers\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RateController extends Controller
{
    public function setRate($patient_id, $service_id, $rate){
        $patient = Patient::find($patient_id);
        if($patient->is_reviewed) return Response::reply(false, 400, 'Pasien ini telah melakukan review');

        
        
    }
}
