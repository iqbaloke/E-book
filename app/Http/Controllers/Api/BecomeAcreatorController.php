<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BecomeAcreatorController extends Controller
{
    public function becomeacreator(Request $request)
    {
        // $userImage = auth()->user()->userdetail->thumbnail;
        $request->validate([
            'country' => 'required',
            'thumbnail' => 'required',
            'phone' => 'required',
            'status' => 'required',
            'last_education' => 'required',
            'major' => 'required',
            'location_of_education' => 'required',
            'description' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);



        $thumbnail = $request->file('thumbnail');
        $user = auth()->user()->name;

        if ($thumbnail) {
            Storage::delete(auth()->user()->userdetail->thumbnail);
            $thumbnailUrl = $thumbnail->storeAs("UserImages", "{$user}.{$thumbnail->extension()}");
        } else {
            $thumbnailUrl = auth()->user()->userdetail->thumbnail;
        }
        $thumbnailUrl = $thumbnail->storeAs("UserImages", "{$user}.{$thumbnail->extension()}");

        $creator = Auth::user()->userdetail()->update([
            'country' => $request->country,
            'thumbnail' => $thumbnailUrl,
            // 'thumbnail' => $request->thumbnail,
            'phone' => $request->phone,
            'status' => $request->status,
            'last_education' => $request->last_education,
            'major' => $request->major,
            'location_of_education' => $request->location_of_education,
            'description' => $request->description,
            'city' => $request->city,
            'address' => $request->address,
        ]);

        if ($request->facebook || $request->github || $request->instagram || $request->linkdin || $request->twitter) {
            $sosmed =   Auth::user()->sosmed()->create([
                'facebook' => $request->facebook,
                'github' => $request->github,
                'instagram' => $request->instagram,
                'linkdin' => $request->linkdin,
                'twitter' => $request->twitter,
            ]);
        }
        $userRoles = Auth::user()->syncRoles("creator");
        return response()->json([
            'creators' => $creator,
            'sosmed' => $sosmed,
            'userRoles' => $userRoles,

        ]);
    }
}
