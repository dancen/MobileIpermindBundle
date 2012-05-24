<?php

namespace Mobile\IpermindBundle\Model;
use Mobile\IpermindBundle\Model\RecordManager;
use Mobile\IpermindBundle\Model\Flyweight\UOSequenceFactory;
use Mobile\IpermindBundle\Model\Strategy\StrategyManager;


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GameMediator
 *
 * @author admin
 */

class GameMediator {
    
   
  public static function getTimeFormatted($time){
      return RecordManager::getTimeFormatted($time);
  }  
 
  public static function getRecords($entity_manager){
      return RecordManager::getRecords($entity_manager);
  }
      
  public static function getScore($getTime,$getSecretSequence){
      return RecordManager::calculateScoreStatic($getTime,$getSecretSequence);
  }
  
  public static function getUOSequence($name){
      return UOSequenceFactory::getUOSequence($name);
  }
  
  public static function getStrategy($level){
      return StrategyManager::getStrategy($level);
  }
     
    
  
}