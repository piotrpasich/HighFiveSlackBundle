<?php

namespace XTeam\HighFiveSlackBundle\MessageParser;

interface MessageParser
{
    public function parse($text);

}