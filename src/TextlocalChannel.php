<?php

namespace Avinashmphp\Textlocal;

use Illuminate\Notifications\Notification;


class TextlocalChannel extends Textlocal
{
    private $sender;

    public function __construct()
    {
        parent::__construct('', '', config('textlocal.key'));
        $this->sender = config('textlocal.sender');
      
    }

    public function send($notifiable, Notification $notification)
    {
        if (! $numbers = $notifiable->routeNotificationFor('textlocal')) {
            return;
        }
        $message = $notification->toTextlocal($notifiable);
         $resutls = $this->sendSms($numbers, $message, $this->sender);
         //    dd($resutls);
         return $resutls;
    }
      
}