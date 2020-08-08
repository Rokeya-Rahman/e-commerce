<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function accountSetting() {
        return view('admin.setting.account-setting');
    }

    public function editPassword() {
        return view('admin.setting.edit-password');
    }

    public function changePassword(Request $request) {
        //$user = User::find(Auth::user()->id);
        if (password_verify($request->current_password, Auth::user()->password)) {
            return view('admin.setting.change-password');
        } else {
            return redirect('setting/edit-password')->with('message', 'Password does not matched. Please enter valid password.');
        }
    }

    public function newPassword(Request $request) {
        $user = User::find(Auth::user()->id);

        $user->password  =  bcrypt($request->new_password);
        $user->save();

        return redirect('setting/account-setting')->with('message', 'Your password is successfully reset.');
    }
}
