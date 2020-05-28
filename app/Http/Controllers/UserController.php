<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class UserController extends Controller
{
    public function permission()
    {
        return view('customer.layout.index')->with([
            'status' => false,
            'message' => 'Доступ только для администрации!'
        ]);
    }
}
