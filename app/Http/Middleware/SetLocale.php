<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class SetLocale
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

        app()->setLocale($request->segment(1));

        $locale = $request->segment(1);

        if(in_array($locale, ['az','ru', 'en'])){
            app()->setLocale($locale);
        }else{
            app()->setLocale('az');
            return redirect(route('homepage', app()->getLocale()));
            $locale = '';
        }
        return $next($request);
    }
}
