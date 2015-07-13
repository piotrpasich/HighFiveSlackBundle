<?php

namespace XTeam\HighFiveSlackBundle\Listener;

use Doctrine\ORM\EntityManager;
use XTeam\HighFiveSlackBundle\Mapper\HighFiveMapper;
use XTeam\SlackMessengerBundle\Event\MessageEvent;

class MessageListener
{

    /**
     * @var HighFiveMapper
     */
    protected $highFiveMapper;

    protected $em;

    public function __construct(HighFiveMapper $highFiveMapper, EntityManager $em)
    {
        $this->highFiveMapper = $highFiveMapper;
        $this->em = $em;
    }

    public function receiveMessage(MessageEvent $event)
    {
        $message = $event->getMessage();

        $highFive = $this->highFiveMapper->getHighFive($message);

        $this->em->persist($highFive);
        $this->em->flush();

        //we need - publisher_id, publisher_name, receiver_name channel_id, channel_name, created_at,
    }

}