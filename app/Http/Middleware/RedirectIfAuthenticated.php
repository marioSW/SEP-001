<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {

            $user = Auth::user();
            $user_role = $user->role;
            if ($user_role === 'admin') {

                return redirect('admin/dashboard');
            } elseif ($user_role === 'data-entry-operator') {
                /**
                 * Add the view you want to redirect to for
                 * DEO
                 *
                 **/
                return redirect('deo/dashboard');
            } elseif ($user_role === 'officer-in-charge') {
                /**
                 * Add the view you want to redirect to for
                 * OIC
                 *
                 **/
                return redirect('oic/dashboard');
            } elseif ($user_role === 'assistant-superintendent-police') {
                /**
                 * Add the view you want to redirect to, for
                 * ASP
                 */
                return redirect('asp/dashboard');
            } elseif( $user_role === 'not-specific'){
                Auth::logout();
                $request->session()->flash('status','Welcome, please wait till the admin assigns a role for you. Thank you.');
                return redirect('auth/login');
            }
            else {
                return $next($request);
            }

        }
        return $next($request);
    }
}
