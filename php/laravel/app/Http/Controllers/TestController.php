<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(): Factory|Application|View
    {
        $data = [
            'name' => 'Laravel',
            'version' => '12.x',
            'author' => 'Taylor Otwell',
        ];

        $author = 'Lu Stormstout';

        $categories = Categories::paginate($this->perPage);

        $html = '<h1 class="text-4xl">Hello World</h1>';

        // session()->flash('success', 'This is a flash message!');

        return view('test.index', compact('data', 'author', 'categories', 'html'));
    }
}
