<?php

namespace App\Http\Controllers\Api;

trait ApiResponseTrait
{
   public function apiResponse($data= null,$message = null,$status = null){

       $array = [
           'data'=>$data,
           'message'=>$message,
           'status'=>$status,
       ];

       return response($array,$status);

   }
}
