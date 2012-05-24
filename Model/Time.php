<?php

namespace Mobile\IpermindBundle\Model;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Time
 *
 * @author admin
 */

class Time {
    
  const START_TIME = 240;
  private $seconds;

  public function __construct(){}

  public function getStartTime(){
       return $this::START_TIME;
  }
  
  public function setTime($seconds){
      $this->seconds = $seconds;
  }
  
  public function getTime(){
      return $this->seconds;
  }
  
  
}