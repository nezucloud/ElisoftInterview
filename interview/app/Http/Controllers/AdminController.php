<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index()
    {
        return redirect('/user-management');
    }

    function fetchApiAccount()
    {
        return response()->view('admin.fetch-api-account', [
            'title'         => 'Fetch Api Account',
            'active'        => 'fetch-api-account',
            'fullName'      => Auth::user()->name
        ]);
    }

    function variableSwap()
    {
        return response()->view('admin.variable-swap', [
            'title'         => 'Variable Swapping',
            'active'        => 'variable-swap',
            'fullName'      => Auth::user()->name
        ]);
    }

    function numberToWords()
    {
        return response()->view('admin.number-to-words', [
            'title'         => 'Number To Words',
            'active'        => 'number-to-words',
            'fullName'      => Auth::user()->name
        ]);
    }
}
