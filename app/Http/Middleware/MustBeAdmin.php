<?php

namespace App\Http\Middleware;

use Closure;

class MustBeAdmin
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$user = $request->user();

		if ($user && $user->email == 'FlorisSchippers@gmail.com') {
			return $next($request);
		}
		abort(404, 'No way, José. You shall not pass.');
	}
}