<?php 
namespace App\Helpers;

class Response {
   public static function reply($success, $code, $msg, $data = null){
      $data = [
         'success' => $success,
         'code' => $code,
         'message' => $msg,
         'data' => $data
      ];

      return response()->json($data, $code);
   }
}