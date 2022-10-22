<?php

namespace App\Helpers;

class View{
   public static function data($active, $data = null){
      return [
         'active' => $active,
         'data' => $data
      ];
   }
}