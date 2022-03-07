<?php

namespace App\Http\Controllers\Main;

use Barryvdh\Debugbar\Controllers\BaseController;
use View;

class HomeController extends BaseController
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|View
     */
    public function index()
    {
        return view('home');
    }


}
