<?php

namespace Mobile\IpermindBundle\Model\State;
use Mobile\IpermindBundle\Model\GameModel;
use Mobile\IpermindBundle\Model\Time;
use Mobile\IpermindBundle\Model\Checker;
use Mobile\IpermindBundle\Model\Sequence;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PlayingGameState
 *
 * @author admin
 */

class PlayingGameState extends GameState {
    
     public function noGame(){}
     public function newGame($request,$debug=false){}
     public function checkGame($request,$debug=false){
         
        $gamemodel = new GameModel($debug);
        
        $time = new Time();
        $time->setTime($request->request->get("time"));
        $gamemodel->setTime($time->getTime());
        
        $sequence = new Sequence();
        $sequence->setSequence($request->request->get("sequence"));
        $gamemodel->setSequence($sequence->getSequence());
        
        $checker = new Checker();
        $checker->setPlayerSequence($gamemodel->getSequence());
        $session = $request->getSession();
        $comp_seq = $session->get('secret_sequence');
        $checker->setComputerSequence($comp_seq);
        $checker->parseSequence();
        
        $gamemodel->setErrors($checker->getErrors());
        $gamemodel->setIsWinner($checker->isWinner());
       
        $gamemodel->getDebug()==true ? 
            $gamemodel->setDebugSequence(implode(" | ",$comp_seq))
                : $gamemodel->setDebugSequence(""); 
        
        return $gamemodel;
        
     }
     public function winnerGame($request){}
     public function loserGame($request){}
     
}