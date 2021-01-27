<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\UserAmount;
use App\Models\User;

class HomeController extends Controller
{
    public function __invoke()
    {
        $users = User::get();
        return view('home', compact('users'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'amount' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.index')
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            // Step 1 : Create User
            $user = new User();
            $user->email = $request->email;
            $user->username = $request->username;
            $user->save();

            //Step 2 : Amount Charged
            $user_amount = new UserAmount();
            $user_amount->user_id = $user->id;
            $user_amount->amount = $request->amount;
            $user_amount->save();

            DB::commit();

            return redirect()->route('user.index')->with('success', 'Thank You for your subscription');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('user.index')
                ->with('warning', 'Something Went Wrong!');
        }
    }
}
