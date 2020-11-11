<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    // protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $filter = $user->keterangan;

        if ($filter === 'admin') {
            return '/admin/home';
        } elseif ($filter === 'guru') {
            return '/guru/home';
        } elseif ($filter === 'siswa') {
            return '/siswa/home';
        } else {
            return '/';
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
