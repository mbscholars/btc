<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\banks;

class Account extends Controller
{
    protected $_user;
    public function __construct(){
        $this->middleware('auth:api');
        $this->_user =  auth()->user();
        
    }

 
    function update_profile(Request $request){
        if($request->validate([
            'first_name' => 'required|string|max:50',
            'middle_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'phone1' => 'required|string|max:16',
            'phone2' => 'nullable|string|max:16',
            'phone3' => 'nullable|string|max:16',
             'language' => 'nullable|string|max:16',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'sex' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
        ])){

            $_user = User::find(auth()->user()->id);

            $_user -> sex = $request -> sex;
            $_user -> state = $request -> state;
            $_user -> country = $request -> country;
            $_user -> first_name = $request -> first_name;
            $_user -> middle_name = $request -> middle_name;
            $_user -> last_name = $request -> last_name;
            $_user -> phone_1 = $request -> phone1;
            $_user -> phone_2 = $request -> phone2;
            $_user -> phone_3 = $request -> phone3;
            $_user -> city = $request -> city;
            $_user -> language = $request -> language;
           
            if($_user->save()){
                return response()->json([
                    'status'  => 'true',
                    'message' => 'Account updated successfully'
                ]);
            }else{
                return response()->json([
                    'status'  => 'false',
                    'message' => 'Account update failed'
                ]);
            }
        }

    }
    function upload_pics(Request $request){
        $request->validate([
            'file' => 'required|mimes:jpeg,png'
        ]);
        //file upload

    }
    function add_bank_account(Request $request){
        //create or update account information
        $user = auth()->user();
        $request->validate([
            'bank' => 'required|string|max:50',
            'account_name' => 'required|string|max:50',
            'account_number' => 'required|string|max:50',
            'code' => 'nullable|string|max:50',
            'payment' => 'nullable|string|max:150',
        ]);
        if($request->id != null){
            //find column
            $bank = banks::find($request->id);
        }else{
            $bank = new banks;
        }
        if(isset(banks::where(['user_id' => $user->id, 'account_no' => $request->account_number, 'bank_name' => $request->bank])->first()->id)){
            return response()->json([
                'status' => 'true',
                'message' => "Account already exists!"
            ]);

        }
       
        $bank -> user_id = $user->id;
        $bank -> bank_name = $request->bank;
        $bank -> account_no = $request->account_number;
        $bank -> account_name = $request->account_name;
        $bank -> code = (($request -> code) ? $request->code : '0');
        $bank -> payment_method = $request -> payment;
        if($bank->save()){
            return response()->json([
                'status' => 'true',
                'message' => 'record updated successfully'
            ]);
        }

    }
    function change_password(Request $request){
        $request->validate([
            'old' => 'required',
            'new' => 'required|confirmed'
        ]);
        $user = auth()->user();
        if(password_verify($request->old, $user->password)){
            $hash = bcrypt($request->new);
            $user->password = $hash;
            $user->save();
            //redirect to login
           // return redirect('login');
            return response()->json([
                'status' => 'true',
                'message' => 'Password Changed.'
            ]);


        }else{
            return response()->json([
                'status' => 'false',
                'message' => 'Password Incorrect'
            ]);
        }

    }
    function change_status(){
        //this can be used to toggle on/ off the current status of the user
        $toggle = User::find($this->user->id);
        $toggle->working = !$toggle->working;
        $toggle->save();
        return response()->json([
            'status' => 'true',
            'message' => 'record updated successfully'
        ]);
        
    }
    function fetch_accounts(){
        $_user = auth()->user();
        $accounts = banks::where('user_id', $_user->id)->get();
        return response($accounts);
    }
}
