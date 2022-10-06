<?php 
namespace App\Helpers;

class Response {
   public static function reply($success, $code, $msg, $data = null, $desc = null){
      $data = [
         'success' => $success,
         'code' => $code,
         'message' => $msg,
         'description' => $desc,
         'data' => $data
      ];

      return response()->json($data, $code);
   }
}