<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use JWTAuth;
use Tyumon\JWTAuth\Exceptions\JWTException;

use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        try {
            if( !$token = JWTAuth::attempt($credentials) ) {
                return response([
                    'error' => 'Porfavor revise nuevamente sus credenciales'
                ]);
            }
        } catch( JWTException $e ) {
            return response([
                'error' => 'No se pudo crear el token de acceso'
            ]);
        }

        return response([
            'msg' => '¡Bienvenido!',
            // 'user' => $user,
            'token' => $token
        ]);
    }

    public function getAuthUser() {
        try {
            if( !$user = JWTAuth::parseToken()->authenticate() ) {
                return response([
                    'msg' => 'Usuario no encontrado'
                ]);
            }
        } catch( Tymon\JWTAuth\Exceptions\TokenExpiredException $e ) {
            return response([
                'msg' => 'Su sesión ha expirado'
            ]);
        } catch( Tymon\JWTAuth\Exceptions\TokenInvalidException $e ) {
            return response([
                'msg' => 'Token de acceso inválido'
            ]);
        } catch( Tymon\JWTAuth\Exceptions\JWTException $e ) {
            return response([
                'msg' => 'Token exception'
            ]);
        }

        return response([
            'data' => $user
        ]);
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6'
        ]);

        if( $validator->fails() ) {
            return response([
                'msg' => $validator->errors()->toJson()
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response([
            'msg' => 'Usuario creado exitosamente!'
        ]);
    }
}
