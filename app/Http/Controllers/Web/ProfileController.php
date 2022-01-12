<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile()
    {
       $order = order::where('user_order', Auth::user()->id)->get();
        // dd($order);
        return view('creators.profile.profile',compact('order'));
    }

    public function profileupdate(Request $request, User $user)
    {
        $thumbnail = $request->file('thumbnail');
        if ($thumbnail) {
            Storage::delete($user->userdetail->thumbnail);
            $thumbnailUrl = $thumbnail->storeAs("UserImages", "{$user}.{$thumbnail->extension()}");
        } else {
            $thumbnailUrl = $user->userdetail->thumbnail;
        }

        $user->userdetail->update([
            'country' => $request->country,
            'thumbnail' => $thumbnailUrl,
            'phone' => $request->phone,
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return back();
    }
}
