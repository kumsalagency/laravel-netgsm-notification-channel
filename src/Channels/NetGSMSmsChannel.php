<?php

namespace KumsalAgency\NetGSM\Channels;

use Illuminate\Notifications\Notification;
use KumsalAgency\NetGSM\Messages\NetGSMMessage;
use KumsalAgency\NetGSM\Facades\NetGSM;

class NetGSMSmsChannel
{
    /**
     * Create a new NetGSM channel instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void|int
     * @throws \SoapFault
     */
    public function send($notifiable, Notification $notification)
    {
        if (! $to = ($notifiable->routeNotificationFor('netgsm', $notification) ?: $notifiable->phone)) {
            return;
        }

        $message = $notification->toNetGSM($notifiable);

        if (is_string($message)) {
            $message = new NetGSMMessage($message);
        }

        return NetGSM::send([
            'from' => $message->from ?: config('netgsm.header'),
            'message' => $message->content,
            'to' => $to,
            'encoding' => $message->encoding ?: config('netgsm.encoding'),
            'startDate' => $message->startDate,
            'stopDate' => $message->stopDate,
            'resellerCode' => $message->resellerCode,
            'filter' => $message->filter,
        ]);
    }
}
