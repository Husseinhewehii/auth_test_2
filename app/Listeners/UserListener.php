<?php

namespace App\Listeners;

use App\Events\UserCreatedEvent;
use App\Jobs\SendEmailJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserListener
{
    public function handleCreatedUser(UserCreatedEvent $event)
    {
        $user = $event->user;

        $data = array(
            'name' => $user->name,
            'email' => $user->email,
            'subject' => 'Welcome to Seoera',
            'body' => 'Your Account Has Been Registered Successfully',
          );
        dispatch(new SendEmailJob($data));
        

    }
}
