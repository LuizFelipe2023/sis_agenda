<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use App\Models\User;

class AuthController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function register_submit(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:255',
            'phone' => 'required|regex:/^\+?[0-9\-\(\) ]+$/',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,user',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O campo nome deve ter pelo menos :min caracteres.',
            'name.max' => 'O campo nome não pode ter mais que :max caracteres.',
            'phone.required' => 'O campo telefone é obrigatório.',
            'phone.regex' => 'O campo telefone deve conter apenas números, parênteses, sinais de adição e traços.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de e-mail válido.',
            'email.unique' => 'Este endereço de e-mail já está sendo utilizado.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
            'role.required' => 'O campo papel é obrigatório.',
            'role.in' => 'O campo papel deve ser "admin" ou "user".',
        ]);


        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'secret_question' => $request->secret_question,
            'secret_answer' => $request->secret_answer,
        ]);


        return redirect()->to('login')->withSuccess('Usuário criado com sucesso');
    }

    public function login()
    {
        return view('login');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->withSuccess('Login realizado com sucesso');
        }

        return redirect()->route('login')->withError('Credenciais inválidas');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
    
    public function forgotPasswordForm()
    {
        return view('forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => trans($status)])
            : back()->withErrors(['email' => trans($status)]);
    }

    public function resetPasswordForm($token)
    {
        return view('reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = bcrypt($password);
                $user->save();
            }
        );

<<<<<<< HEAD
        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', trans($status))
            : back()->withErrors(['email' => [trans($status)]]);
=======
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
>>>>>>> 0c7d9e4617cda4d72d5bbaa556a198920ce909d6
    }
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }
    
}
