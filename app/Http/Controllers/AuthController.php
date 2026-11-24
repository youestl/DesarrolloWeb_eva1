<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function registro(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255|unique:usuarios,correo',
            'clave'  => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Error de validación',
                'errors'  => $validator->errors()
            ], 422);
        }

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'clave'  => Hash::make($request->clave),
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Usuario registrado exitosamente',
            'usuario' => [
                'id'     => $usuario->id,
                'nombre' => $usuario->nombre,
                'correo' => $usuario->correo,
            ]
        ], 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'correo' => 'required|email',
            'clave'  => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Datos incompletos',
                'errors'  => $validator->errors()
            ], 422);
        }

        $usuario = Usuario::where('correo', $request->correo)->first();

        if (!$usuario || !Hash::check($request->clave, $usuario->clave)) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Credenciales incorrectas'
            ], 401);
        }

        $token = JWTAuth::fromUser($usuario);

        return response()->json([
            'status'       => 'success',
            'message'      => 'Inicio de sesión exitoso',
            'access_token' => $token,
            'token_type'   => 'bearer',
            'usuario'      => [
                'id'     => $usuario->id,
                'nombre' => $usuario->nombre,
                'correo' => $usuario->correo,
            ]
        ], 200);
    }
}
