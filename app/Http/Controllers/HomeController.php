<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserKyc;
use App\Models\UserOrder;

use Storage;
use Session;

use Validator;
use Hash;

use DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function account()
    {
        return view('account');
    }

    public function contribute() {
        if (auth()->user()->kyc && auth()->user()->kyc->status == 2) {
            return view("contribute");
        } else {
            Session::flash("alert_contribute", "Alert");
            return redirect()->route("user.kyc");
        }

    }

    public function kyc()
    {
        Session::flash("alert_contribute", "Alert");
        return view('kyc');
    }

    public function kyc_status()
    {
        return view('kyc_status');
    }

    public function transaction_list() 
    {
        return view('transactions');
    }

    public function account_balance() 
    {
        return view('account_balance');
    }

    public function kyc_upload(Request $request) 
    {
        $path = $request->file("file")->store("uploads", "public");
        return $path;
    }

    public function kyc_upload_delete(Request $request)
    {
        if ($request->has("file_id")) {
            if (Storage::disk('public')->exists($request->file_id)) {
                Storage::disk('public')->delete($request->file_id);
                return response()->json("file deleted");
            }
        }
    }

    public function kyc_store(Request $request)
    {
        $request->validate([
            "firstname" => "required",
            "lastname" => "required",
            "reg_first_char" => "required",
            "reg_second_char" => "required",
            "reg_num" => "required",
            "phone" => "required",
            // "birthday" => "required",
            "country" => "required",
            "city" => "required",
            "address" => "required",
            "doc_type" => "required",
            "doc_one" => "required",
        ], [
            "firstname.required" => "Нэрээ оруулна уу",
            "lastname.required" => "Овогоо оруулна уу",
            "reg_first_char.required" => "Регистр эхний үсэг оруулна уу",
            "reg_second_char.required" => "Регистр хоёрдахь үсэг оруулна уу",
            "reg_num.required" => "Регистр тоог оруулна уу",
            "phone.required" => "Утасаа оруулна уу",
            "country.required" => "Улс сонгоно уу",
            "city.required" => "Хот/аймаг оруулна уу",
            "address.required" => "Хаягаа оруулна уу",
            "doc_one.required" => "Эхний файл зураг оруулна уу"
        ]);

        if (auth()->user()->kyc) {
            $userKyc = auth()->user()->kyc;
        } else {
            $userKyc = new UserKyc();
        }

        $userKyc->user_id = $request->user()->id;
        $userKyc->status = 1;
        $userKyc->firstname = $request->firstname;
        $userKyc->lastname = $request->lastname;
        $userKyc->regnum = $request->reg_first_char . $request->reg_second_char . $request->reg_num;
        $userKyc->phone = $request->phone;
        $userKyc->birthday = $request->birth_year . '-' .$request->birth_month . '-' . $request->birth_day;
        $userKyc->country = $request->country;
        $userKyc->city = $request->city;
        $userKyc->address = $request->address;
        $userKyc->doc_type = $request->doc_type;
        $userKyc->doc_one = $request->doc_one;
        $userKyc->doc_two = $request->doc_two;
        $userKyc->doc_three = $request->doc_three;
        $userKyc->save();

        return redirect()->route("home")->with("success", "Хэрэглэгч таних хүсэлт амжилттай илгээгдлээ");
    }

    public function profile_update(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,id," . auth()->user()->id,
            "phone" => "integer|min:8|nullable",
            "birthday" => "nullable",
        ]);
        
        $user = User::findOrFail(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->country = $request->country;
        $user->save();

        return redirect()->back()->with("success", "Профайл шинэчлэгдлээ.");
    }

    public function password_change(Request $request)
    {
        $request->validate([
            "old_password" => "required",
            "new_password" => "required|min:6",
            "confirm_password" => "required|same:new_password",
        ]);


        if (Hash::check($request->old_password, auth()->user()->password)) { 
            auth()->user()->fill([
                'password' => Hash::make($request->new_password)
            ])->save();

            $request->session()->flash('success', 'Нууц үг амжилттай шинэчлэгдлээ!');
            
            return redirect()->back();
        } else {
            $request->session()->flash('error', 'Хуучин нууц үг тохирохгүй байна!');
            return redirect()->back();
        }
    }

    public function order_store(Request $request)
    {
        $request->validate([
            "token" => "required"
        ]);

        $last_order = UserOrder::latest()->first();
        $last_order_id = $last_order ? $last_order->id : 0;
        $generate_order_id = sprintf('%02d', $last_order_id + 1);

        $userOrder = new UserOrder();
        $userOrder->user_id = auth()->user()->id;
        $userOrder->user_name = auth()->user()->name;
        $userOrder->user_email = auth()->user()->email;
        $userOrder->user_phone = auth()->user()->phone;
        $userOrder->token_quantity = $request->token;
        $userOrder->token_unit_price = 0.25;
        $userOrder->token_amount = 0.25 * (int) $request->token;
        $userOrder->invoice_no = "MSC-1720" . $generate_order_id;
        $userOrder->status = 1;
        $userOrder->token_status = 1;
        $userOrder->save();

        return response()->json(["success" => true, "orderId" => $userOrder->invoice_no]);
    }
}
