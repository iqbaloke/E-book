<?php

namespace App\Http\Controllers\Web\Creator;

use App\Http\Controllers\Controller;
use App\Models\purchased;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchasedController extends Controller
{
    public function purchased()
    {
        $purchaseds = Auth::user()->purchased()->get();
        return view('creators.purchased.purchased',compact('purchaseds'));
    }
}
