<?php

namespace App\Http\Controllers\Customer\Home;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Customer\LayoutController;
use App\Model\Questionary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonController extends LayoutController
{
    public function index()
    {
        $all = DB::table('questionaries')
            ->select('questionaries.id as id', 'name')
            ->leftJoin('customer_questionaries', 'questionaries.id', '=', 'customer_questionaries.questionary_id')
            ->where('customer_questionaries.user_id', '!=', $this->getUser()->id)
            ->orWhereNull('customer_questionaries.user_id')
            ->orderBy('questionaries.id')
            ->groupBy('questionaries.id')
            ->get();

        return view('customer.home', [
            'have_more' => $all->count() != 0 ? $all->count() : false
        ]);
    }
}
