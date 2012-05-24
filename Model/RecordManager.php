<?php

namespace Mobile\IpermindBundle\Model;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Record
 *
 * @author admin
 */

class RecordManager {
    
  private $player;
  private $timegame;
  private $entity_manager;
  private $computer_sequence;

  public function __construct($entity_manager){
      $this->entity_manager = $entity_manager;
  }
  
  public function setTimeGame($time){
      $this->timegame = $time;
  } 
  
  public function setPlayer($player){
      $this->player = $player;
  } 
  
  public function setComputerSequence($secret_sequence){
      $this->computer_sequence = $secret_sequence;
  }   
   
  public static function getRecords($em){
      $repository = $em->getRepository('MobileIpermindBundle:Player');
      $query = $repository->createQueryBuilder('p')
                          ->orderBy('p.score', 'DESC')
                          ->setMaxResults( 3 )
                          ->getQuery();
      
      return $query->getResult();
  }
  
   
  public static function getTimeFormatted($time){ 
      $avail_time = new \Mobile\IpermindBundle\Model\Time();
      $time = $avail_time->getStartTime() - $time;      
      $secs = $time % 60;      
      $time2 = ( $time - $secs ) / 60;
      $mins = $time2 % 60;
      if ( $secs < 10 ) { $secs = '0'.$secs; }
      if ( $mins < 10 ) { $mins = '0'.$mins; }
      $timeformatted = $mins.":".$secs;
      return $timeformatted;
  }
  
  public function persist(){ 
      $this->player->setScore($this->calculateScore());
      $this->player->setTimeGame($this->timeDataTrasform());
      $this->player->setCreatedAt(new \DateTime());
      $this->entity_manager->persist($this->player);
      $this->entity_manager->flush();
  }  
  
  
  public function timeDataTrasform(){
      $time_formatted = RecordManager::getTimeFormatted($this->timegame);
      $time_array = explode(":",$time_formatted);
      $time = new \DateTime();
      $time->setTime("00", $time_array[0], $time_array[1]);
      return $time;
  }
  
 
  public function calculateScore(){
      $time = $this->timegame * 10;
      $sequence = $this->computer_sequence;
      $val = count(array_unique($sequence));
      $diff_level = $time * (1+($val*0.1));
      return ceil($diff_level);
  }
  
  
  public static function calculateScoreStatic($timegame,$computer_sequence){
      $time = $timegame * 10;
      $val = count(array_unique($computer_sequence));
      $diff_level = $time * (1+($val*0.1));
      return ceil($diff_level);
  }
  
  
  
   
}