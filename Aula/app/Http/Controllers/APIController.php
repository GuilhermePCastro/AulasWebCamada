<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public $loginAfterSignUp = true;

    public function login(Request $request){
        $token = null;
        $camposJson = Json_decode($request->getContent(), JSON_OBJECT_AS_ARRAY);
        $credenciais = ['email' => $camposJson['email'],
                        'password' => $camposJson['password']];

        try{
            if(!$token = JWTAuth::attempt($credenciais)){
                return response()->json(['success' => false, 'message' => 'Credenciais inválidas!' ],401);
            }
            return response()->json(['success' => true, 'token' => $token]);
        }catch(JWTException $e){

            return response()->json(['error' => 'Token não criado!'], 500);

        }
    }

    public function logout(Request $request){

        try{

            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json(['success'=>true,
                                    'message'=>'Bye Bye ;-;']);
        }catch(JWTException $e){
            return response()->json([   'success' => false,
                                        'message' => 'Erro, vai embora não'],500);
        }

    }
}
