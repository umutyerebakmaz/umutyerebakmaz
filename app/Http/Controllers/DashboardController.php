<?php

namespace App\Http\Controllers;

use App\Support\Meta;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $meta = new Meta();
        $meta->title = 'Dashboard';
        return view('pages.dashboard.dashboard', compact('meta'));
    }

}
