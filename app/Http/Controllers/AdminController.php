<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserKyc;

class AdminController extends Controller
{
    public function kyc_list() {
        $kycs = UserKyc::all();
        
        return view("admin/kyc_list", compact("kycs"));
    }

    public function kyc_change_status(Request $request)
    {
        if ($request->has("kyc_id")) {
            $kyc = UserKyc::findOrFail($request->kyc_id);
            $kyc->status = $request->status;
            $kyc->save();
        }

        return redirect()->route("admin.kyc.list");
    }
}
