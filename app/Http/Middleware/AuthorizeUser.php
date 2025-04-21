<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response 
    {
        $user_role = $request->user()->getRole(); //ambil data user yang login
        if (in_array($user_role, $roles)) { //fungsi user diambil dari usermodel.php
            return $next($request); //cek apakah user punya role yang diiinginkan
        }

        //jika tidak punya maka tampilan error
        abort(403, 'Forbidden. Kamu tidak punya akses ke halaman ini');
    }
}
