<?php

namespace Aamatevosyan\UserProfileTool\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Laravel\Fortify\Http\Responses\PasswordUpdateResponse;

class UserProfileToolController
{
    /**
     * Update the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Fortify\Contracts\UpdatesUserPasswords  $updater
     * @return \Laravel\Fortify\Contracts\PasswordUpdateResponse
     */
    public function update(Request $request, UpdatesUserPasswords $updater)
    {
        $updater->update($request->user(), $request->all());
    }
}
