<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (Session::has('locale') && array_key_exists(Session::get('locale'), config('locale'))) {
            App::setLocale(Session::get('locale'));
        } else {
            $userLanguages = preg_split('/[,;]/', $request->server('HTTP_ACCEPT_LANGUAGE'));

            foreach ($userLanguages as $language) {
                if (array_key_exists($language, config('locale'))) {                   
                    App::setLocale($language);
                    break;
                }
            }
        }
    
        return $next($request);
        
    }
}
