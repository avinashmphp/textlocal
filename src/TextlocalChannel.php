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
        if (empty($numbers)) {
            return;
        }
        if (!is_array($numbers)) {
            $numbers = [$numbers];
        }
        $message = $notification->toTextlocal($notifiable);
        if (empty($message)) {
            return;
        }
         $resutls = $this->sendSms($numbers, $message, $this->sender);
         //    dd($resutls);
         return $resutls;
    }
}