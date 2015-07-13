<?php

namespace XTeam\HighFiveSlackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HighFive
 */
class HighFive
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var string
     */
    private $type;

    /**
     * @var Channel
     */
    private $channel;

    /**
     * @var User
     */
    private $publisher;

    /**
     * @var string
     */
    private $receiverName;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return HighFive
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }


    public function setCreatedAtValue()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return HighFive
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set channelId
     *
     * @param integer $channelId
     * @return HighFive
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * Get channelId
     *
     * @return integer 
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Set publisherId
     *
     * @param integer $publisherId
     * @return HighFive
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Get publisherId
     *
     * @return integer 
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Set receiverName
     *
     * @param string $receiverName
     * @return HighFive
     */
    public function setReceiverName($receiverName)
    {
        $this->receiverName = $receiverName;

        return $this;
    }

    /**
     * Get receiverName
     *
     * @return string 
     */
    public function getReceiverName()
    {
        return $this->receiverName;
    }
}
