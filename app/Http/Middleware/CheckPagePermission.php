<?php

namespace App\Http\Middleware;

use App\Models\Pages;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPagePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         $user = Auth::user();
        //  dd($user);

        $navigations = Pages::where('active', 1)->pluck('filename')->toArray();
            // dd($navigations);
        $currentPath = '/' . trim($request->path(), '/');
        // dd($navigations,$currentPath);

        if (in_array($currentPath, $navigations)) {
            // dd('test');

            $allowedPages = session('file_names', []);


            if (in_array($currentPath, $allowedPages)) {
                return $next($request);
            }

            return response()->view('errors.error403', ['error_code' => 403], 403);
        }

        return $next($request);
    }
}
