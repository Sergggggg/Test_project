<?php

namespace App\Http\Controllers\Api\Auth;

use Laravel\Passport\Passport;
use Laravel\Passport\Client;
use Laravel\Passport\Token;
use Laravel\Passport\AuthCode;

use Laravel\Passport\PersonalAccessClient;
//use App\Models\Passport\PersonalAccessClient;
use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\HasApiTokens;



class AuthController extends Controller
{
    //  public function register(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|max:55',
    //         'email' => 'email|required|unique:users',
    //         'password' => 'required|confirmed'
    //     ]);

    //     $validatedData['password'] = bcrypt($request->password);

    //     $user = User::create($validatedData);

    //     $accessToken = $user->createToken('authToken')->accessToken;

    //     return response([ 'user' => $user, 'access_token' => $accessToken]);
    // }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        $users = /*User::find(1)*/DB::table('users')->where('email', $loginData['email'])->get();

        //print_r(User::find(1));
       //  print_r(); 
       // exit;
        //print_r(Auth::user()); exit;

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }


        $accessToken = /*User::find($users[0]->id)*/Auth::user($users[0]->id)->createToken('Token')->accessToken;

        return response(['user' => $user, 'access_token' => $accessToken]);

    }
}
