<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginUserRequest;


class AuthController extends Controller
{
    public function loginForm()
    {
        $title = 'Login page';
        return view('auth.login', compact('title'));
    }

    public function login(LoginUserRequest $request)
    {
        // 1. Валидация входных данных в LoginUserRequest
        // 2. Попытка авторизации
        if (Auth::attempt($request->validated())) {
            // 3. Защита от фиксации сессии
            $request->session()->regenerate();

            // 4. Успешный вход → редирект
            return redirect('/start');
        }

        // 5. Ошибка → назад с сообщением
        return back()->withErrors([
            'email' => 'Неверный email или пароль',
        ]);
    }

    public function logout(Request $request)
    {
        //Logout user(Delete user from session)
        Auth::logout();

        //Destroy current session to protect against reuse
        $request->session()->invalidate();

        //Update CSRF-token
        $request->session()->regenerateToken();

        //Redirect
        return redirect('/login');
    }
}
