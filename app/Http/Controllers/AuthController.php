<?php

namespace App\Http\Controllers;


use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function login(Request $request){
        $fields = $request->validate([
            'email'=>'required|email',
            'password'=>'required|string'
 
        ]); 
        //check email
        $user = User::where('email',$fields['email'])->first(); 

        //Check Password
        if(!$user || !Hash::check($fields['password'],$user->password)){
                return response([
                    'message'=>'bad creds'
                ],401);
        }
 
        $token = $user->createToken('mytoken')->plainTextToken;
 
        $response = [
            'user'=>$user,
            'token'=>$token,
            'password'=>bcrypt($fields['password']),
            'message'=>'Login Successful'
         ];

        //return response($response,201);
        return json_encode($response,201);
 
    }

    public function register(Request $request){
        $fields = $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|confirmed'
 
        ]); 
 
        $user= User::create([
            'name'=>$fields['name'],
            'email'=>$fields['email'],
            'password'=>bcrypt($fields['password'])
 
        ]);
 
        $token = $user->createToken('mytoken')->plainTextToken;
 
        $response = [
            'user'=>$user,
            'token'=>$token,
            'password'=>bcrypt($fields['name'])
         ];
 
 
        return response($response,201);

    }
    public function logout (Request $request){
        auth()->user()->tokens()->delete();

        return [
            'message'=>'Logged out'
        ];
    }

}
