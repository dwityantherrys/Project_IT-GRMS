<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class SingleSession
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {
            $cachedSessionId = Cache::get('user-session-' . $user->id);

            if ($cachedSessionId && $cachedSessionId !== session()->getId()) {
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'message' => 'Your session has been terminated because your account was logged in from another device.',
                ]);
            }
        }

        return $next($request);
    }
}
