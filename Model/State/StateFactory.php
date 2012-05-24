<?php

namespace Mobile\IpermindBundle\Model\State;
use Mobile\IpermindBundle\Model\State\StartGameState;
use Mobile\IpermindBundle\Model\State\PlayingGameState;
use Mobile\IpermindBundle\Model\State\EndGameState;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StateFactory
 *
 * @author admin
 */

class StateFactory {
    
    public static function createNewGame(){  return new StartGameState(); }
    public static function createPlayingGame(){ return new PlayingGameState(); }
    public static function createEndGame(){ return new EndGameState(); }
    
  
}