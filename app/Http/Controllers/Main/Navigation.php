<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Navigation extends Controller
{
    public function showLogin()
    {
        return view('content.login');
    }

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

    public function showEofHelp()
    {
        return view('content.eof-help');
    }

    public function showEofMaintenance()
    {
        return view('content.eof-maintenance');
    }

    public function showEofAccount()
    {
        return view('content.eof-account');
    }

    public function showEofOrganization()
    {
        return view('content.eof-organization');
    }

    public function showEofDivision()
    {
        return view('content.eof-division');
    }

    public function showEofSection()
    {
        return view('content.eof-section');
    }

    public function showEofPosition()
    {
        return view('content.eof-position');
    }
}
