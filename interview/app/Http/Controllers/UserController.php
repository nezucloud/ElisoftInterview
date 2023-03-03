<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function index()
    {
        return response()->view('admin.user-management', [
            'title'         => 'User Management',
            'active'        => 'user-management',
            'users'         => User::paginate(10),
            'fullName'      => Auth::user()->name
        ]);
    }

    function fetchUsers()
    {
        return response()->view('admin.fetch-users', [
            'title'         => 'Fetch Users',
            'active'        => 'fetch-users',
            'users'         => User::paginate(10),
            'fullName'      => Auth::user()->name
        ]);
    }

    //Api
    function getUsers()
    {
        $users      =  User::all()->toArray();

        return response()->json([
            'status'    => true,
            'message'   => 'Get users data success',
            'array'     => $users,
        ], 200);
    }

    function create(Request $request)
    {
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

        return response()->json(
            ['status' => 200, "message" => "User successfully created"],
            200,
            ["Content-type: application/json", "charset=utf-8"]
        );
    }

    function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'        => 'required',
            'name'      => 'required|max:255',
            'email'     => [
                'required',
                Rule::unique('users')
                    ->ignore($request->input('id')),
            ],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $userModel  = User::find($request->input('id'));
        $userModel->name        = $request->input('name');
        $userModel->email       = $request->input('email');
        if ($request->input('password')) {
            $userModel->password    = Hash::make($request->input('password'));
        }
        $userModel->save();

        return response()->json(
            ['status' => 200, "message" => "User successfully created"],
            200,
            ["Content-type: application/json", "charset=utf-8"]
        );
    }

    function delete(Request $request)
    {
        $userId     = Auth::user()->id;

        $request->validate([
            'id'     => "required|not_in:$userId",
        ]);

        User::find($request->input('id'))->delete();

        return redirect('/user-management')->with('success', 'Delete User Success');
    }
}
