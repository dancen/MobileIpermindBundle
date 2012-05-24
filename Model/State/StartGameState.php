<?php

namespace Mobile\IpermindBundle\Model\State;
use Mobile\IpermindBundle\Model\GameModel;
use Mobile\IpermindBundle\Model\Time;
use Mobile\IpermindBundle\Model\Checker;
use Mobile\IpermindBundle\Model\Sequence;
use Mobile\IpermindBundle\Model\Generator;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StartGameState
 *
 * @author admin
 */

class StartGameState extends GameState {
    
     public function noGame(){
        $gamemodel = new GameModel(false);
        return $gamemodel;
     }
     public function newGame($request,$debug=false){
         
        $session = $request->getSession();        
        $gamemodel = new GameModel($debug);
        $gamemodel->setSecretSequence(Generator::getInstance()->getSecretSequence($session->get('game_level')));
        $session->set('secret_sequence', $gamemodel->getSecretSequence());
        
        $time = new Time();
        $gamemodel->setTime($time->getStartTime());
        
        $sequence = new Sequence();
        $gamemodel->setSequence($sequence->getStartSequence());
        
        $checker = new Checker();
        $gamemodel->setErrors($checker->getErrors());        
        
        $gamemodel->getDebug()==true ? 
            $gamemodel->setDebugSequence(implode(" | ",$gamemodel->getSecretSequence()))
                : $gamemodel->setDebugSequence(""); 
        
        return $gamemodel;
        
     }
     public function checkGame($request,$debug=false){}
     public function winnerGame($request){}
     public function loserGame($request){}
     
}