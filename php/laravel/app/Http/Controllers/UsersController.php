<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class UsersController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return Factory|Application|View
     */
    public function create(): Factory|Application|View
    {
        return view('users.create');
    }

    /**
     * Store a new user.
     *
     * @param Request $request
     * @return void
     */
    #[NoReturn] public function store(Request $request): void
    {
        dd($request->all());
        # todo validate the request and create a new user
        # todo send a welcome email to the user
        # todo log the user in
    }

    /**
     * Show the user profile.
     *
     * @param int|null $id
     * @return void
     */
    #[NoReturn] public function show(?int $id = 99): void
    {
        dd($id);
        # todo get the user by id and return the view
        // return view('users.show', ['id' => $id]);
    }
}
