<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use JetBrains\PhpStorm\NoReturn;

class SessionsController extends Controller
{
    /**
     * Show the login form.
     *
     * @return Factory|Application|View
     */
    public function create(): Factory|Application|View
    {
        return view('sessions.login');
    }

    /**
     * Log the user in.
     *
     * @param Request $request
     * @return void
     */
    #[NoReturn] public function store(Request $request): void
    {
        dd($request->all());
        # todo validate the request and log the user in
    }

    /**
     * Log the user out and redirect to the login page.
     *
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(): Application|Redirector|RedirectResponse
    {
        auth()->logout();
        return redirect('/login');
    }
}
