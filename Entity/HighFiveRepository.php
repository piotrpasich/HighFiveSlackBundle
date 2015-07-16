<?php

namespace XTeam\HighFiveSlackBundle\Entity;

use Doctrine\ORM\EntityRepository;
use XTeam\HighFiveSlackBundle\Statistic\HighFivesCollection;
use XTeam\HighFiveSlackBundle\Statistic\CollectingStrategy\UserCollectingStrategy;

class HighFiveRepository extends EntityRepository
{

    /**
     * @return HighFivesCollection
     */
    public function getUserStats()
    {
        $highFives = $this->findAll();

        return new HighFivesCollection($highFives, new UserCollectingStrategy());
    }
}
