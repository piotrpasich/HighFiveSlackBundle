<?php

namespace XTeam\HighFiveSlackBundle\Message\Parser;

interface MessageParser
{
    public function parse($text);

}