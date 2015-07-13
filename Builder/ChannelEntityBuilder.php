<?php

namespace XTeam\HighFiveSlackBundle\Builder;

use XTeam\HighFiveSlackBundle\Entity\ChannelRepositoryInterface;
use XTeam\SlackMessengerBundle\Model\Channel;
use XTeam\HighFiveSlackBundle\Entity\Channel as ChannelEntity;

class ChannelEntityBuilder
{

    /**
     * @var ChannelRepositoryInterface
     */
    private $channelRepository;

    public function __construct(ChannelRepositoryInterface $channelRepository)
    {
        $this->channelRepository = $channelRepository;
    }

    public function getChannel(Channel $channel)
    {
        return $this->channelRepository->findOneById((string)$channel->getId()) ?:
            (new ChannelEntity())
                ->setName((string)$channel->getName())
                ->setId((string)$channel->getId());
    }

}