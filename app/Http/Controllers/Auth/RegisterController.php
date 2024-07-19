<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EnviarCorreo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        $data = [
            'name' => 'Usuario',
            'message' => 'Gracias por registrarte en nuestro sitio.'
        ];

        // Datos para el correo
        $data = [
            'name' => $user->name, // Utiliza el nombre del usuario registrado
            'message' => 'Gracias por registrarte en nuestro sitio.'
        ];

        // Enviar el correo
        Mail::to($user->email)->send(new EnviarCorreo($data));
        //        auth()->login($user);

        return redirect('/login');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    
}
