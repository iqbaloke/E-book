<?php

namespace App\Http\Controllers\Web\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardCreatorController extends Controller
{
    public function dashboardcreator()
    {
        $orders = Auth::user()->order()->latest()->paginate(10);
        $books = Auth::user()->book()->latest()->paginate(10);
        return view('creators.dashboard-creator',compact('orders','books'));
    }
}
