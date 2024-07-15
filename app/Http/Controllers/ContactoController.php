<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Contacto;

class ContactoController extends Controller
{
    public function submitForm(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'fullName' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'privacyPolicy' => 'required',
            'newsletter' => '',
        ]);

        // Crea un nuevo contacto en la base de datos
        Contacto::create($request->all());

        // Obtiene el token CSRF
        $token = csrf_token();

        // Configura la cookie con el token CSRF que expira en 60 minutos
        $cookie = Cookie::make('_token', $token, 60);

        // Devuelve una respuesta JSON que incluye el token CSRF y establece la cookie en la respuesta
        return response()->json([
            'success' => true,
            'message' => '¡El formulario se envió correctamente!',
            'token' => $token,
        ])->withCookie($cookie);
    }
}
