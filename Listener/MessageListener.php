<?php

namespace XTeam\HighFiveSlackBundle\Listener;

use XTeam\SlackMessengerBundle\Event\MessageEvent;

class MessageListener
{

    public function receiveMessage(MessageEvent $event)
    {
        $message = $event->getMessage();
    }

}