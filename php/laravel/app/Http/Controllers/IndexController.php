<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class IndexController extends Controller
{
    /**
     * Display the home page.
     *
     * @return Factory|Application|View
     */
    public function home(): Factory|Application|View
    {
        return view('index.home');
    }
}
