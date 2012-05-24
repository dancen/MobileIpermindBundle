<?php

namespace Mobile\IpermindBundle\Model\Strategy;
use Mobile\IpermindBundle\Model\Strategy\LevelStrategy;
use Mobile\IpermindBundle\Model\Flyweight\UnitConstants;
use Mobile\IpermindBundle\Model\GameMediator;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EasyGame
 *
 * @author admin
 */

class MediumGame implements LevelStrategy,UnitConstants {
    
 
   private function __construct(){}
  
  public static function createSequence(){ 
      $easy_game = new MediumGame();
      do{$secret_sequence = $easy_game->getSequence();}
      while(count(array_unique($secret_sequence))!=3);
      return $secret_sequence;
  }
  
  
  private function getUnit(){
      $sseq = rand(0,99);
      $sp = "";
      if($sseq>=0 && $sseq<25){$sp = GameMediator::getUOSequence(UnitConstants::_GREEN)->getName();}
      if($sseq>=25 && $sseq<50){$sp = GameMediator::getUOSequence(UnitConstants::_BLUE)->getName();}
      if($sseq>=50 && $sseq<75){$sp = GameMediator::getUOSequence(UnitConstants::_GOLD)->getName();}
      if($sseq>=75 && $sseq<100){$sp = GameMediator::getUOSequence(UnitConstants::_RED)->getName();}
      return $sp;
  }
  
  private function getSequence(){
      $secret_sequence = array();
      for( $i=0; $i<4; $i++ ){
          $unit = $this->getUnit();
          array_push( $secret_sequence , $unit);
      }
      return $secret_sequence;
  }
  
  
  
  
  
  
    
}