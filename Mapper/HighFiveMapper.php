<?php

namespace XTeam\HighFiveSlackBundle\Mapper;

use XTeam\HighFiveSlackBundle\Builder\ChannelEntityBuilder;
use XTeam\HighFiveSlackBundle\Builder\UserEntityBuilder;
use XTeam\HighFiveSlackBundle\Entity\Channel;
use XTeam\HighFiveSlackBundle\Entity\HighFive;
use XTeam\HighFiveSlackBundle\Entity\User;
use XTeam\HighFiveSlackBundle\MessageParser\MentionsMessageParser;
use XTeam\SlackMessengerBundle\Model\Message;

class HighFiveMapper
{

    /**
     * @var UserEntityBuilder
     */
    private $userEntityBuilder;

    /**
     * @var ChannelEntityBuilder
     */
    private $channelEntityBuilder;

    /**
     * @var MentionsMessageParser
     */
    private $mentionsMessageParser;

    public function __construct(
        UserEntityBuilder $userEntityBuilder,
        ChannelEntityBuilder $channelEntityBuilder,
        MentionsMessageParser $mentionsMessageParser
    )
    {
        $this->userEntityBuilder = $userEntityBuilder;
        $this->channelEntityBuilder = $channelEntityBuilder;
        $this->mentionsMessageParser = $mentionsMessageParser;
    }

    /**
     * @param Message $message
     * @return HighFive
     */
    public function getHighFive(Message $message)
    {
        $publisher = $this->userEntityBuilder->getUser($message->getUser());
        $channel   = $this->channelEntityBuilder->getChannel($message->getChannel());
        $highFive  = $this->mapHighFive($message);

        $highFive->setPublisher($publisher);
        $highFive->setChannel($channel);

        return $highFive;
    }

    private function mapHighFive(Message $message)
    {
        $highFive = new HighFive();

        foreach ($this->mentionsMessageParser->parse($message->getText()) as $receiver) {
            $highFive->addReceiver($receiver);
        }

        //@todo catch type (VO)
        $highFive->setType('high five');

        return $highFive;
    }
}