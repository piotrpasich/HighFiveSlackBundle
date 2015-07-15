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

        try {
            $highFive = $this->highFiveMapper->getHighFive($message);
        } catch (\Exception $e) {
            return false;
        }

        $this->em->persist($highFive);
        $this->em->flush();
    }

}