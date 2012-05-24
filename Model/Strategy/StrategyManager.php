<?php

namespace Mobile\IpermindBundle\Model\Strategy;
use Mobile\IpermindBundle\Model\Strategy\EasyGame;
use Mobile\IpermindBundle\Model\Strategy\MediumGame;
use Mobile\IpermindBundle\Model\Strategy\DifficultGame;
use Mobile\IpermindBundle\Model\Strategy\VeryHardGame;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StrategyManager
 *
 * @author admin
 */

class StrategyManager {
    
  const LEVEL_EASY = 0;
  const LEVEL_MEDIUM = 1;
  const LEVEL_DIFFICULT = 2;
    
  private function __construct(){}
  
  public static function getStrategy($level){ 
      
      $strategic_sequence = array();
        if( static::LEVEL_EASY == $level ){
            $strategic_sequence = EasyGame::createSequence();
        } 
        else if( static::LEVEL_MEDIUM == $level ){
            $strategic_sequence = MediumGame::createSequence();
        }
        else if( static::LEVEL_DIFFICULT == $level ){
            $strategic_sequence = DifficultGame::createSequence();
        }
        else {
            $strategic_sequence = DifficultGame::createSequence();
        }
      return $strategic_sequence;
      
  }
  
  
    
}