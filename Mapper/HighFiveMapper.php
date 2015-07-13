<?php

namespace XTeam\HighFiveSlackBundle\Mapper;

use XTeam\HighFiveSlackBundle\Entity\Channel;
use XTeam\HighFiveSlackBundle\Entity\ChannelRepositoryInterface;
use XTeam\HighFiveSlackBundle\Entity\HighFive;
use XTeam\HighFiveSlackBundle\Entity\User;
use XTeam\HighFiveSlackBundle\Entity\UserRepositoryInterface;
use XTeam\SlackMessengerBundle\Model\Message;

class HighFiveMapper
{

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var ChannelRepositoryInterface
     */
    private $channelRepository;

    public function __construct(UserRepositoryInterface $userRepository, ChannelRepositoryInterface $channelRepository)
    {
        $this->userRepository = $userRepository;
        $this->channelRepository = $channelRepository;
    }

    /**
     * @param Message $message
     * @return HighFive
     */
    public function getHighFive(Message $message)
    {
        $publisher = $this->mapPublisher($message);
        $channel   = $this->mapChannel($message);
        $highFive  = $this->mapHighFive($message);

        $highFive->setPublisher($publisher);
        $highFive->setChannel($channel);

        return $highFive;
    }

    private function mapChannel(Message $message)
    {
        return $this->channelRepository->findOneById((string)$message->getChannel()->getId()) ?:
            (new Channel())
                ->setName((string)$message->getChannel()->getName())
                ->setId((string)$message->getChannel()->getId());
    }

    private function mapPublisher(Message $message)
    {
        return $this->userRepository->findOneById((string)$message->getUser()->getId()) ?:
            (new User())
                ->setName((string)$message->getUser()->getName())
                ->setId((string)$message->getUser()->getId());
    }

    private function mapHighFive(Message $message)
    {
        $highFive = new HighFive();

        $highFive->setReceiverName('test');
        $highFive->setType('high five');

        return $highFive;
    }
}