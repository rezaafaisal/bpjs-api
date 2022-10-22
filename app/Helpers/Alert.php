<?php

namespace App\Helpers;

class Alert {
   public static function alert($success, $action){
        if($success){
            session()->put('alert', ['icon' => 'success', 'title' => 'Berhasil', 'text' => 'Data Berhasil '.$action]);
        }

        else{
            session()->put('alert', ['icon' => 'error', 'title' => 'Gagal', 'text' => 'Data Gagal '.$action]);
        }

        return redirect()->back();
    }

    public static function alert_success($title, $text){
        session()->put('alert', ['icon' => 'success', 'title' => $title, 'text' => $text]);
    }

    public static function info_alert($title, $text){
        session()->put('alert', ['icon' => 'info', 'title' => $title, 'text' => $text]);
    }

    public static function danger_alert($title, $text){
        session()->put('alert', ['icon' => 'danger', 'title' => $title, 'text' => $text]);
    }

    public static function data($active, $data = null){
       return [
            'active' => $active,
            'data' => $data ? : []
       ];
    }
}