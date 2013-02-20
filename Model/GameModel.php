<?php

namespace Mobile\IpermindBundle\Model;
use Mobile\IpermindBundle\Model\GameMediator;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GameModel
 *
 * @author admin
 */

class GameModel {
    
  private $sequence;
  private $time;
  private $errors;
  private $debug;
  private $secret_sequence;
  private $debug_sequence;
  private $is_winner;
  private $time_elapsed;

  public function __construct($debug = false){
      $this->debug = $debug;
  }
  
  public function setSequence($player_sequence){
      $this->sequence = $player_sequence;
  }
  
  public function getSequence(){
      return $this->sequence;
  }
  
  public function setTime($time){
      $this->time = $time;
      if($time==0){
          $this->time_elapsed = true;
      }
  }
  
  public function getTime(){
      return $this->time;
  }
  
  public function setErrors($errors){
      $this->errors = $errors;
  }
  
  public function getErrors(){
      return $this->errors;
  }
  
  public function setDebug($debug){
      $this->debug = $debug;
  }
  
  public function getDebug(){
      return $this->debug;
  }
  
  public function setSecretSequence($secret_sequence){
      $this->secret_sequence = $secret_sequence;
  }
  
  public function getSecretSequence(){
      return $this->secret_sequence;
  }
      
  public function setDebugSequence($debug_sequence){
      $this->debug_sequence = $debug_sequence;
  }
  
  public function getDebugSequence(){
      return $this->debug_sequence;
  }
  
  public function setIsWinner($is_winner){
      $this->is_winner = $is_winner;
  }
  
  public function getIsWinner(){
      return $this->is_winner;
  }
  
  public function setTimeElapsed($time_elapsed){
      $this->time_elapsed = $time_elapsed;
  }
  
  public function getTimeElapsed(){
      return $this->time_elapsed;
  }
  
  public function getTimeFormatted(){      
      return GameMediator::getTimeFormatted($this->getTime());
  }
  
  public function isRecord($entity_manager){
       $is_record = false;
      $records = $this->getRecords($entity_manager);
      $score = $this->getScore();
      if(count($records)>0){
        foreach($records as $record){
            if( $score > $record->getScore() ) {
                $is_record = true;
                break;
            }
        }
        } else {
          $is_record = true;
      }
      return $is_record;
  }
  
  public function getRecords($entity_manager){      
      return GameMediator::getRecords($entity_manager);
  }
      
  public function getScore(){      
      return GameMediator::getScore($this->getTime(),$this->getSecretSequence());
  }
  
   
    
  
}