<?php

namespace App\Http\Controllers\Web\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardCreatorController extends Controller
{
    public function dashboardcreator()
    {
        return view('creators.dashboard-creator');
    }
}
