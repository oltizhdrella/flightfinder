<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use GuzzleHttp;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'username'  => 'required|unique:users,username',
            'email'     => 'required|email|unique:users,email',
            'name' => 'required',
            'password'  => 'required'
        ]);

        $user = User::create(request(['username', 'name', 'email', 'password']));
        
        auth()->login($user);
        
        return redirect()->to('/home');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if(Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])){

            return redirect()->to('/home');

        }
       
        
    }

    public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }


    public function homepage()
    {
        $response = Http::get('abt.test/api/'.API_TOKEN.'/cities');

        $cities = json_decode($response->body(), true);

        $minDate = date('Y-m-d');

        return view('homepage', compact('cities', 'minDate'));
    }

    public function test()
    {
        return view('product');
    }
}
