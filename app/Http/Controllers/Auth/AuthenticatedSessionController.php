<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if the user already has an active session
            if (Cache::has('user-session-' . $user->id)) {
                Auth::logout();

                return redirect()->route('login')->withErrors([
                    'message' => 'User Sedang Aktif. Silakan logout dari perangkat lain sebelum login.',
                ]);
            }

            // Regenerate session ID
            $request->session()->regenerate();

            // Store the session ID in the cache
            $user->session_id = session()->getId();
            $user->save();

            Cache::put('user-session-' . $user->id, session()->getId(), now()->addMinutes(config('session.lifetime')));

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        // Authentication failed, return back with error
        return redirect()->route('login')->withErrors([
            'message' => 'Invalid credentials. Please try again.',
        ]);
    }

    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();

        if ($user) {
            Cache::forget('user-session-' . $user->id);
            $user->session_id = null;
            $user->save();
        }

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}


