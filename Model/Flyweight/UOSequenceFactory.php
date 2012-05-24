<?php

namespace Mobile\IpermindBundle\Model\Flyweight;
use Mobile\IpermindBundle\Model\Flyweight\UOSequence;
use Mobile\IpermindBundle\Model\Flyweight\UnitConstants;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UOSequenceFactory
 *
 * @author admin
 */

class UOSequenceFactory implements UnitConstants {
    
  private static $units = array();
  private function __construct(){
      $unitsmap = array(
          UnitConstants::_RED => new UOSequence( "red" , 1 ) ,
          UnitConstants::_GREEN => new UOSequence( "green" , 1 ) ,
          UnitConstants::_BLUE => new UOSequence( "blue" , 1 ) ,
          UnitConstants::_GOLD => new UOSequence( "gold" , 1 ) ,
      );
      static::$units = $unitsmap;       
              
  }
  public static function getUOSequence($name){
      $instance = new UOSequenceFactory();
      return static::$units[$name];
  }  
   
    
}