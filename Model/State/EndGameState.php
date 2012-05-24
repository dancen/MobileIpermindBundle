<?php

namespace Mobile\IpermindBundle\Model\State;
use Mobile\IpermindBundle\Model\GameModel;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EndGameState
 *
 * @author admin
 */

class EndGameState extends GameState {
    
     public function noGame(){}
     public function newGame($request,$debug=false){}
     public function checkGame($request,$debug=false){}
     public function winnerGame($request){
         
        $gamemodel = new GameModel(false);
        $session = $request->getSession();
        $gamemodel->setTime($session->get('time'));
        $gamemodel->setSecretSequence($session->get('secret_sequence'));
        
        return $gamemodel;
        
     }
     public function loserGame($request){
        
        $gamemodel = new GameModel(false);
        $session = $request->getSession();
        $gamemodel->setSecretSequence($session->get('secret_sequence'));
        
        return $gamemodel;
        
     }

     
}