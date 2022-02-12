<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderTransactionResource;
use App\Models\order_notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderNotificationController extends Controller
{
    public function orderNotification()
    {
        // $orderNotification = Auth
        $orderNotification = order_notification::where('user_id', Auth::user()->id)
            ->orWhere('order_user', Auth::user()->id)->get();
        return response()->json([
            "orderNotification" => OrderTransactionResource::collection($orderNotification),
        ]);
    }

    public function updateorderNotification(order_notification $order_notification)
    {

        $user = auth()->id();
        if ($user == $order_notification->user_id) {
            // print("true");
            $order_notification->update([
                'read_author' => 1,
            ]);
        } else {
            $order_notification->update([
                'read' => 1,
            ]);
        }
    }
}
