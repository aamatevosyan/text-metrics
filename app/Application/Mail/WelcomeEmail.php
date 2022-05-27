<?php

namespace App\Mail;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Supervisor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param  Student|Supervisor|Admin  $user
     * @param  string  $password
     */
    public function __construct(protected Student|Supervisor|Admin $user, protected string $password)
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        $url = match ($this->user->getTable()) {
            'students' => route('front.login'),
            'supervisors' => route('supervisor.login'),
            'admins' => route('nova.login'),
        };

        $mailable = $this->to($this->user->email)
            ->from('info@amatech.studio', 'TextMetrics')
            ->subject('TextMetrics: Welcome')
            ->markdown('emails.users.welcome', [
                'url' => $url,
                'name' => $this->user->name,
                'password' => $this->password,
            ]);

        return $mailable;
    }
}
