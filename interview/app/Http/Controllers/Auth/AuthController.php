<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $requestMethod;

    function __construct(Request $request)
    {
        $this->requestMethod = $request->getMethod();
    }
    //User Registration
    function register(Request $request)
    {
        switch ($this->requestMethod) {
            case 'POST':
                $request->validate([
                    'name'      => 'required|max:255',
                    'email'     => 'required|unique:users',
                    'password'  => 'required|min:8',
                ]);

                $userModel  = new User;
                $userModel->name        = $request->input('name');
                $userModel->email       = $request->input('email');
                $userModel->password    = Hash::make($request->input('password'));
                $userModel->save();

                return redirect('/login')
                    ->with('registerSuccess', 'User register successfully, please login to continue');
            default:
                return response()->view('auth.register', [
                    'title'     => 'Register'
                ]);
                break;
        }
    }

    //Login
    function login(Request $request)
    {
        switch ($this->requestMethod) {
            case 'POST':
                $credentials = $request->validate([
                    'email'     => 'required|exists:users',
                    'password'  => 'required|min:8',
                ]);

                if (Auth::attempt($credentials, $request->input('rememberMe') == 'on')) {
                    $request->session()->regenerate();

                    return redirect('/dashboard')
                        ->with('loginSuccess', 'Login Success');
                }

            default:
                if (Auth::check()) return redirect('/dashboard');

                return response()->view('auth.login', [
                    'title'     => 'Login'
                ]);
        }
    }

    //Logout
    function logout()
    {
        Auth::logout();
        return redirect('/login')->with('registerSuccess', 'Logout Success');
    }
}
