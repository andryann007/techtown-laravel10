<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Login Admin'
        ];

        return view('auth.login', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Register'
        ];

        return view('auth.register', $data);
    }

    public function register_account(Request $request)
    {
        $validatedData = $request->validate([
            'name'              => 'required|max:30',
            'email'             => 'required|email',
            'password'          => 'required|max:12'
        ]);

        $tokenCharacter = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pieces  = [];
        $max = mb_strlen($tokenCharacter, '8bit') - 1;

        // Generate Random 10 Reset Token
        for ($i = 0; $i < 10; ++$i) {
            $pieces[] = $tokenCharacter[random_int(0, $max)];
        }

        $resetToken = implode('', $pieces);

        $validatedData['remember_token'] = $resetToken;

        if (User::factory()->create($validatedData)) {
            return redirect()->intended('/admin/register')->with('success', 'Akun Anda Berhasil di Buat !!!');
        }

        return back()->with('error', 'Gagal Melakukan Registrasi !!!');
    }

    public function forget_password()
    {
        $data = [
            'title' => 'Forget Password'
        ];

        return view('auth.forget_password', $data);
    }

    public function send_reset_token(Request $request)
    {
        $request->validate([
            'email'         => 'required|email'
        ]);

        $validUser = User::where('email', '=', $request->email)->first();

        if ($validUser) {
            $status = Password::sendResetLink(
                $request->only('email')
            );

            return $status === Password::RESET_LINK_SENT
                ? back()->with('success', 'Sukses Mengirim Token')
                : back()->with('error', 'Gagal Mengirim Token');
        } else {
            return back()->with('error', 'Gagal Melakukan Mengirim Token !!!');
        }
    }

    public function reset_password()
    {
        $data = [
            'title' => 'Reset Password'
        ];

        return view('auth.reset_password', $data);
    }

    public function reset_account_password(Request $request)
    {
        $request->validate([
            'token'     => 'required',
            'email'     => 'required|email',
            'password'  => 'required|max:12|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password'  => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->with('error', 'Gagal mereset password !!!');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'         => 'required|email',
            'password'      => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->hak_akses == 'super-admin') {
                return redirect()->intended('/admin/akun');
            } else if (auth()->user()->hak_akses == 'admin') {
                return redirect()->intended('/admin/brand');
            }
        }

        return back()->with('error', 'Gagal Melakukan Login !!!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
