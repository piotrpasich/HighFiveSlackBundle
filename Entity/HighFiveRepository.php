<?php

namespace XTeam\HighFiveSlackBundle\Entity;

use Doctrine\ORM\EntityRepository;
use XTeam\HighFiveSlackBundle\Entity\DataManipulator\Period;
use XTeam\HighFiveSlackBundle\Statistic\HighFivesCollection;
use XTeam\HighFiveSlackBundle\Statistic\CollectingStrategy\UserCollectingStrategy;

class HighFiveRepository extends EntityRepository
{

    /**
     * @return HighFivesCollection
     */
    public function getUserStats(Period $period = null)
    {
        $highFivesQueryBuilder = $this->createQueryBuilder('hv');

        if (null !== $period) {
            $highFivesQueryBuilder = $period->manipulateQuery($highFivesQueryBuilder);
        }

        $highFives = $highFivesQueryBuilder->getQuery()->getResult();

        return new HighFivesCollection($highFives, new UserCollectingStrategy());
    }
}
