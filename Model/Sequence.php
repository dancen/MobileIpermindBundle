<?php

namespace Mobile\IpermindBundle\Model;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sequence
 *
 * @author admin
 */

class Sequence {
    
  private $sequence = array();

  public function __construct(){}

  public function getStartSequence(){
      $this->sequence[0] = "empty";
      $this->sequence[1] = "empty";  
      $this->sequence[2] = "empty";  
      $this->sequence[3] = "empty";
      return $this->sequence;
  }
  
  public function setSequence($sequence){
      $this->sequence = explode("|",$sequence);
  }
  
  public function getSequence(){
      return $this->sequence;
  }
  
}