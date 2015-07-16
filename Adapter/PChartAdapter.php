<?php

namespace XTeam\HighFiveSlackBundle\Adapter;


use XTeam\HighFiveSlackBundle\Statistic\HighFivesCollection;

class PChartAdapter
{
    public function getData(HighFivesCollection $highFivesCollection)
    {
        $preparedData = [];

        foreach ($highFivesCollection as $highFiveStat) {
            foreach ($highFiveStat->getStats() as $statName => $stat) {
                $preparedData[$statName][] = $stat;
            }
        }

        return $preparedData;
    }
}