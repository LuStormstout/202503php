<?php

namespace App\Http\Controllers;

abstract class Controller
{
    /**
     * The number of items to be displayed per page.
     *
     * @var int|null
     */
    public ?int $perPage = null;

    /**
     * Construct of the Controller class.
     */
    public function __construct()
    {
        $this->perPage = config('app.per_page', 5);
    }
}
