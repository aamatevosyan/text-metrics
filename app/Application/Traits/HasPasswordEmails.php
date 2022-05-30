<?php

namespace App\Traits;

use App\Mail\UserPasswordUpdatedMail;
use App\Mail\WelcomeEmail;
use Hash;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Mail;

/**
 * @mixin Model
 */
trait HasPasswordEmails
{
    public static function bootHasPasswordEmails()
    {
        static::creating(function (Model $model) {
            if (!$model->password) {
                $model->password = Str::random(12);
            }
        });

        static::created(function (Model $model) {
            Mail::queue((new WelcomeEmail($model, $model->password))->onQueue('emails'));
            $model->password = Hash::make($model->password);
            $model->saveQuietly();
        });
    }
}
