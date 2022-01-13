<?php

namespace App\Http\Controllers\Api\Dashboard\Purchased;

use App\Http\Controllers\Controller;
use App\Http\Resources\Purchased\PurchasedResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchasedController extends Controller
{
    public function purchased()
    {
        $purchaseds = Auth::user()->purchased()->get();
        return PurchasedResource::collection($purchaseds);
    }
}
