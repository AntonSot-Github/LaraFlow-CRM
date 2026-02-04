<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // 1. Валидация входных данных
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Попытка авторизации
        if (Auth::attempt($credentials)) {
            // 3. Защита от фиксации сессии
            $request->session()->regenerate();

            // 4. Успешный вход → редирект
            return redirect('/dashboard');
        }

        // 5. Ошибка → назад с сообщением
        return back()->withErrors([
            'email' => 'Неверный email или пароль',
        ]);
    }
}
