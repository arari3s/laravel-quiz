<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $sectionCount = Section::count();
        $userCount = User::count();

        return view('dashboard', compact('sectionCount', 'userCount'));
    }
}
