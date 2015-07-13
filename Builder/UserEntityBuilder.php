<?php

namespace XTeam\HighFiveSlackBundle\Builder;

use XTeam\HighFiveSlackBundle\Entity\UserRepositoryInterface;
use XTeam\SlackMessengerBundle\Model\User;
use XTeam\HighFiveSlackBundle\Entity\User as UserEntity;

class UserEntityBuilder
{

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUser(User $user)
    {
        return $this->userRepository->findOneById((string)$user->getId()) ?:
            (new UserEntity())
                ->setName((string)$user->getName())
                ->setId((string)$user->getId());
    }
}
