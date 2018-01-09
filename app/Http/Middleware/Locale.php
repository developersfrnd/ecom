<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Config;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        //$language = Session::get('language', Config::get('app.locale'));
        $language = $request->session()->get('language', Config::get('app.locale'));
        App::setLocale($language);

        if(!$request->session()->has('language')){
            Session::put('language', $language);
        }
        
        return $next($request);
    }
}
