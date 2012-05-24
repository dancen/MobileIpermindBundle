<?php

namespace Mobile\IpermindBundle\Model\ObjectPool;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connection
 *
 * @author admin
 */

class Connection  {
    
  private $object;
  
  public function __construct(){}
  
  public function getObject(){
      return $this->object;
  }
      
  public function setObject($object){
      $this->object = $object;
  }  
    
  public function reset(){
      $this->object = null;
  }
    
}