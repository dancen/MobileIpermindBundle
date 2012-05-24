<?php

namespace Mobile\IpermindBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mobile\IpermindBundle\Entity\Player
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Player
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $nickname
     *
     * @ORM\Column(name="nickname", type="string", length=100)
     */
    private $nickname;

    /**
     * @var integer $score
     *
     * @ORM\Column(name="score", type="integer")
     */
    private $score;

    /**
     * @var time $time_game
     *
     * @ORM\Column(name="time_game", type="time")
     */
    private $time_game;

    
    /**
     * @var datetime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;


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
     * Set nickname
     *
     * @param string $nickname
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    /**
     * Get nickname
     *
     * @return string 
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set score
     *
     * @param integer $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * Get score
     *
     * @return integer 
     */
    public function getScore()
    {
        return $this->score;
    }

   
    /**
     * Set time_game
     *
     * @param time $timeGame
     */
    public function setTimeGame($timeGame)
    {
        $this->time_game = $timeGame;
    }

    /**
     * Get time_game
     *
     * @return time 
     */
    public function getTimeGame()
    {
        return $this->time_game;
    }

    
    /**
     * Set created_at
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    }

    /**
     * Get created_at
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }
}