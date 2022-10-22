<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Helpers\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $req){
        // return "halo";
        $req->validate([
            'nik' => 'required',
            'password' => 'required'
        ]);

        if($user = User::where('nik', $req->nik)->first()){
            if ($user->role->name == 'patient') {
                if(Hash::check($req->password, $user->password)){
                    $token = Hash::make($user->name.Carbon::now());
                    $user->update(['token' => $token]);
                    
                    $data = [
                            'id' => $user->patient->id,
                            'name' => $user->name,
                            'nik' => $user->nik,
                            'bpjs_number' => $user->patient->bpjs_number,
                            'birthday' => $user->patient->birthday,
                            'gender' => $user->patient->gender->name,
                            'token' => $user->token
                    ];

                    return Response::reply(true, 200, 'Berhasil Login', $data);
                }   
            }

            // login cs rumah sakit
            else if($user->role->name == 'admin'){
                if(Hash::check($req->password, $user->password)){
                    
                }
            }
        }

        return Response::reply(false, 400, 'pengguna tidak ditemukan');

    }
}
