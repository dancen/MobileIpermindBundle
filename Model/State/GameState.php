<?php

namespace Mobile\IpermindBundle\Model\State;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GameState
 *
 * @author admin
 */

abstract class GameState {
    
     public abstract function noGame();
     public abstract function newGame($request,$debug);
     public abstract function checkGame($request,$debug);
     public abstract function winnerGame($request);
     public abstract function loserGame($request);
     
}