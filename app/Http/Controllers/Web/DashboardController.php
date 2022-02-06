<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $books = book::get();
        $orders = order::get();
        $creators = User::role('creator')->get();
        $writers = User::role('writer')->get();
        return view('admin.dashboard',compact('books','orders','creators','writers'));
    }
}
