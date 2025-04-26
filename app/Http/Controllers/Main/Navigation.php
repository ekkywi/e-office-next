<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Navigation extends Controller
{
    public function showEofDashboard()
    {
        return view('content.eof-dashboard');
    }

    public function showEofApplication()
    {
        return view('content.eof-application');
    }

    public function showEofSetting()
    {
        return view('content.eof-setting');
    }
}
