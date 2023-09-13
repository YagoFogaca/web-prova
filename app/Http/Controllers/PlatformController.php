<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlatformController extends Controller
{
    /**
     * View Platform Teachers
     */

    public function index()
    {
        return view('pages.platform-home.index');
    }
}
