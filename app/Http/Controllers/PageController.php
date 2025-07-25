<?php

namespace App\Http\Controllers;

use App\Support\Meta;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        $meta = new Meta;
        $meta->title = 'Home';
        return view('pages.home', compact('meta'));
    }
}
