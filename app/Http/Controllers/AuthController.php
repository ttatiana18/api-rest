<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(UserRequest $request){
        try{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $token = $user->createToken("auth_token")->plainTextToken;
            return response()->json(["message"=>"Usuario creado correctamente", "access_token" => $token],201);
        }
        catch(Exception $e){
            return response()->json(["message"=>"El usuario no pudo ser creado"], 400);
        }

    }

    public function login(LoginRequest $request){

        $user = User::where('email',$request->email)->first();
        if(isset($user))
        {
            if(Hash::check($request->password,$user->password))
            {
                $token = $user->createToken("auth_token")->plainTextToken;
                return response()->json(["message"=>"Inicio de sesión exitoso", "access_token" => $token],200);
            }
            else
            {
                return response()->json(["message"=>"Contraseña incorrecta."],400);
            }
        }
        else
        {
            return response()->json(["message"=>"El usuario no existe"],404);
        }

    }

    public function edit(){
        return Auth::user();
    }

    public function update(EditUserRequest $request,$id)
    {
        try{
            $user=User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            return response()->json(["response"=>"Usuario actualizado correctamente"],200);
        }
        catch(Exception $e)
        {return response()->json(["response"=>"No existe el usuario"],404);}
    }

    public function logout(){
        Auth::user()->tokens()->delete();
        return response()->json(["message"=>"Sesión finalizada correctamente"],200);
    }
}
