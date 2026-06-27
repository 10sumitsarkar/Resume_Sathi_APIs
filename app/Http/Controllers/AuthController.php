<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function login(Request $request){
        if ($request->isMethod('post')) {
            $request->validate([
                "email" => 'required|email',
                "password" => 'required',
            ]);

            $msg = "Invalid email or password.";
            $email        = $request->email;
            $password     = $request->password;

            $user  = User::where('email', $email)->first();
            if ($user) {
                if (Auth::attempt(['email' => $email, 'password' => $password])) {
                    if (!$user->is_active) {
                        $msg = "Your account have blocked by admin. Please contact with admin for continue your account.";
                    } else {
                        Auth::login($user);
                        if ($request->remember_me =='remember') {
                           setcookie('user_id',$user->id, time() + (86400 * 30), "/");
                        }
                        return redirect(route('dashboard'));
                    }
                }
            }
            return redirect()->back()->with('fail', $msg)->withInput();
        }
        if(isset($_COOKIE['user_id'])){
            Auth::loginUsingId($_COOKIE['user_id']);
            return redirect(route('dashboard'));
        }else{
            return view('backend.auth.login');
        }

    }

    function logout(Request $request){
        setcookie('user_id',NULL, time() + (86400 * 30), "/");
        Auth::logout();
        $msg = " Please Login! ";
        return redirect(route('login'))->with('success', $msg);
    }
}
