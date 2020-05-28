<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function setError($message)
    {
        return view('layout.layout', [
            'status' => false,
            'message' => $message ?? []
        ]);
    }

    public function f($name = null)
    {
        if(!$name){
            return \request();
        }
        return \request($name);
    }

    public function p($name = null)
    {
        if($name) {
            return \request()->request->get($name);
        }else{
            return \request()->request;
        }

    }

    public function getUser()
    {
        return auth()->user();
    }
}
