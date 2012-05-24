<?php

namespace Mobile\IpermindBundle\Model\Flyweight;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UOSequence
 *
 * @author admin
 */

class UOSequence {
    
  private $name;
  private $value;
  
  public function __construct( $name , $value ){
      $this->name = $name;
      $this->value = $value;               
  }
  
  public function getName(){
      return $this->name;
  }
  
  public function getValue(){
      return $this->value;
  }  
   
    
}