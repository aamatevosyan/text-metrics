<?php

namespace App\Http\Responses\Fortify;

use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return RedirectResponse|JsonResponse
     */
    public function toResponse($request): RedirectResponse|JsonResponse
    {
        /** @var Student $user */
        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect()->intended(route(config('fortify.home')));
    }
}
