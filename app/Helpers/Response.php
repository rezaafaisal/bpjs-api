<?php 
namespace App\Helper;

class Response {
   public static function reply($success, $code, $msg, $data = null){
      $data = [
         'success' => $success,
         'code' => $code,
         'message' => $msg,
         'data' => $data
      ];

      return response($data)->json();
   }
}