<?php

namespace App\Actions\Fortify;

use App\Models\Admin;
use App\Models\Supervisor;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;

class AuthenticateLoginAttempt
{
    public function __invoke(Request $request)
    {
        if (preg_match('#login_(.+)_.+#', auth()->guard()->getName(), $matches)) {
            $guardName = $matches[1];

            $user = (match ($guardName) {
                'admin' => Admin::query(),
                'supervisor' => Supervisor::query(),
                default => Student::query(),
            });
            $user = $user->where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return false;
            }

            if (auth()->guard()->attempt(
                $request->only(Fortify::username(), 'password'),
                $request->filled('remember')
            )
            ) {
                return $user;
            }
        }

        return false;
    }
}
