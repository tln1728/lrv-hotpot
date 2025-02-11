<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $userAttributes = $request->validate([
            'name'      => 'required|max:30',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:3|confirmed',
        ]);

        $user = User::create($userAttributes);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->intended('/');
    }

    public function login(Request $request)
    {
        $attributes = $request->validate([
            'email'     => 'required|email|max:255',
            'password'  => 'required',
        ]);

        $remember = $request->remember ? true : false;

        if (Auth::attempt($attributes, $remember)) {
            $request->session()->regenerate();
            return redirect()
                ->to(session()->previousUrl())
                ->with('success', 'Hello, ' . Auth::user()->name);
        }

        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->intended();
    }


    // Forgot password
    public function show_forgot_password_form()
    {
        return view('auth.forgot-password');
    }
    public function send_reset_link_email(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );
        
        return $status === Password::RESET_LINK_SENT
            ? back() -> with('success','Check your email')
            : back() -> with('error','Something wrong');
    }
    public function show_reset_password_form($token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => request() -> get('email'),
        ]);
    }
    public function reset_password(Request $request)
    {
        $request -> validate([
            'token'    => 'required',
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:3',
        ]);

        // Tìm kiếm user theo email
        $user = User::where('email', $request->email) -> first();

        if (!$user) {
            return back() -> withErrors(['email' => 'No user found with that email address.']);
        }

        // Kiểm tra token và cập nhật mật khẩu
        $response = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->password = Hash::make($request->password);
                $user->save();
            }
        );

        if ($response == Password::PASSWORD_RESET) {
            return redirect() -> route('home') -> 
                with('success', __('public.reset_pass_success'));
        }

        return back() -> withErrors(['email' => 'Failed to reset password.']);
    }
    public function show_change_password_form() {
        return view('auth.change-password');
    }
    public function change_password(Request $request) {
        $request -> validate([
            'password' => 'required|confirmed|min:3',
        ]);

        return redirect() -> route('home') -> 
            with('success', __('public.reset_pass_success'));
    }
}
