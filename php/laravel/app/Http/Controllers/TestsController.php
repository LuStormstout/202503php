<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class TestsController extends Controller
{
    public function index(): Factory|Application|View
    {
        return view('tests.index');
    }

    public function login(): Factory|Application|View
    {
        return view('tests.login');
    }
}
