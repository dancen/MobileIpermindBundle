<?php

namespace Mobile\IpermindBundle\Model;
use Mobile\IpermindBundle\Model\GameMediator;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Generator
 *
 * @author admin
 */

class Generator {
    
  private $secret_sequence = array();
  private function __construct(){}
  
  public static function getInstance(){
      $instance = null;
      if( $instance == null ){
          $instance = new Generator();
      }
      return $instance;
  }
  
  public function getSecretSequence($level){
      $this->secret_sequence = GameMediator::getStrategy($level);
      return $this->secret_sequence;
  }
  
    
}