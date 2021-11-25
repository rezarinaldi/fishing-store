<?php

namespace App\Http\Controllers\Ap;

use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use App\User as AppUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.Ap.change-password.reset-password');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        AppUser::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        
        return view('auth.login');
    }
}
