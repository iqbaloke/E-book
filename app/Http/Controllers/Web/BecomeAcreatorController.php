<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BecomeAcreatorController extends Controller
{
    public function becomeacreator()
    {
        return view('landing.becomeacreator');
    }
    public function addbecomeacreator(Request $request)
    {
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
        $thumbnailUrl = $thumbnail->storeAs("UserImages", "{$user}.{$thumbnail->extension()}");

        Auth::user()->userdetail()->create([
            'country' => $request->country,
            'thumbnail' => $thumbnailUrl,
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
            Auth::user()->sosmed()->create([
                'facebook' => $request->facebook,
                'github' => $request->github,
                'instagram' => $request->instagram,
                'linkdin' => $request->linkdin,
                'twitter' => $request->twitter,
            ]);
        }
        Auth::user()->syncRoles("creator");

        return back();
    }
}
