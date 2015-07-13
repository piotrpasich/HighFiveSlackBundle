<?php

namespace XTeam\HighFiveSlackBundle\MessageParser;

use XTeam\HighFiveSlackBundle\DataProvider\SlackUserProvider;

class MentionsMessageParser implements MessageParser
{
    /**
     * @var SlackUserProvider
     */
    private $userProvider;

    public function __construct(SlackUserProvider $userProvider)
    {
        $this->userProvider = $userProvider;
    }

    public function parse($text)
    {
        $mentions = [];
        preg_match_all("|\<\@(.*)\>|U", $text, $mentions, PREG_PATTERN_ORDER);

        if (empty($mentions[1])) {
            return [];
        }

        return array_map(function($userId) {
            return $this->userProvider->getUser($userId);
        }, $mentions[1]);
    }

}