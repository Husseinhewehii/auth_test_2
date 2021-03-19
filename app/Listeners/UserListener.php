<?php

namespace App\Listeners;

use App\Events\UserCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class UserListener
{
    public function handleCreatedUser(UserCreatedEvent $event)
    {
        $user = $event->user;
        // $to_name = $user->name;
        // $to_email = $user->email;
        // $data = array('name'=>'Laravel Admin', 'body' => 'Your Account Has Been Registered Successfully');

        // Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
        // $message->to($to_email, $to_name)
        // ->subject('Welcome To SeoEra');
        // $message->from(env('MAIL_USERNAME'),'Congratulations');
        // });

        $data = array(
            'name' => $user->name,
            'email' => $user->email,
            'subject' => 'Welcome to Seoera',
            'body' => 'Your Account Has Been Registered Successfully',
          );
          Mail::to($data['email'])->send(new SendEmail($data));

    }
}
