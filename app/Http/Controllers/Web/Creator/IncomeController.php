<?php

namespace App\Http\Controllers\Web\Creator;

use App\Http\Controllers\Controller;
use App\Models\income;
use App\Models\widraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class IncomeController extends Controller
{
    public function income()
    {
        $widraws = Auth::user()->widraw()->get();
        return view('creators.income.income', compact('widraws'));
    }
    public function widraw(Request $request)
    {
        $income = Auth::user()->income()->get();
        foreach ($income as $total) {
            $ok = $total->residual_income;
        }
        // dd($ok);
        $update = income::where('user_id', auth()->user()->id)->first();
        if ($request->nominal == 0) {
            dd("uppss");
        } else {
            if ($request->nominal < $ok) {
                Auth::user()->widraw()->create([
                    'widraw_key' => 'widraw_key' . '-' . Str::random(10),
                    'nominal' => $request->nominal,
                    'payment' => $request->payment,
                    'payment_name' => $request->payment_name,
                    'status' => 2,
                ]);

                $update->update([
                    'total_income' => $update->total_income,
                    'residual_income' => $update->residual_income - $request->nominal,
                    'expenditure' => $update->expenditure + $request->nominal,
                ]);
                return back();
            } else {
                dd("false");
            }
        }
    }
    public function widrawrequest()
    {
        $widraws = widraw::where('status', 2)->get();
        return view('admin.widraw.widrawrequest', compact('widraws'));
    }
    public function widrawsuccess()
    {
        $widraws = widraw::where('status', 1)->get();
        return view('admin.widraw.widrawsuccess', compact('widraws'));
    }
    public function widrawupdate(widraw $widraw)
    {
        $widraw->update([
            'status' => 1,
        ]);
        return back();
    }
}
