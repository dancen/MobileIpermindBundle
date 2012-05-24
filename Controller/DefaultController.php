<?php

namespace Mobile\IpermindBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Mobile\IpermindBundle\Model\State\StateFactory;
use Mobile\IpermindBundle\Entity\Player;
use Mobile\IpermindBundle\Form\PlayerType;
use Mobile\IpermindBundle\Model\RecordManager;

class DefaultController extends Controller
{
    
    private function increaseLevel(){
        $session = $this->getRequest()->getSession();
        if($session->has('game_level')){            
            $level = $session->get('game_level');
            $level = $level+1; 
            $session->set('game_level', $level);
        } else {            
            $session->set('game_level',0);           
        }       
    }    
    
    public function indexAction()
    {
          $this->increaseLevel();
          $gamestate = StateFactory::createNewGame();
          $gamemodel = $gamestate->newGame($this->getRequest(), false);
        
        return $this->render('MobileIpermindBundle:Default:index.html.twig',array(
            "GameModel" => $gamemodel,
        ));
    }
    
    public function checkitAction()
    {           
        
        $gamestate = StateFactory::createPlayingGame();
        $gamemodel = $gamestate->checkGame($this->getRequest(), false);       
        
        if($gamemodel->getIsWinner()==true){
                $session = $this->getRequest()->getSession();
                $session->set('time', $gamemodel->getTime());
                return $this->forward('MobileIpermindBundle:Default:winner',array(
                    "GameModel" => $gamemodel,
                ));
        } else {
            
            if($gamemodel->getTimeElapsed()==true){
                return $this->forward('MobileIpermindBundle:Default:index',array(
                    "GameModel" => $gamemodel,
                ));
            } else {
                return $this->render('MobileIpermindBundle:Default:index.html.twig',array(
                    "GameModel" => $gamemodel,
                ));
            }
        }
    }
    
    public function winnerAction()
    {          
        $gamestate = StateFactory::createEndGame();
        $gamemodel = $gamestate->winnerGame($this->getRequest());  
        $em = $this->getDoctrine()->getEntityManager();     
        
        if($gamemodel->isRecord($this->getDoctrine())){
            
            $player = new Player();
            $form = $this->createForm(new PlayerType(), $player);
            return $this->render('MobileIpermindBundle:Default:winner.html.twig',array(
                        "GameModel" => $gamemodel,
                        "form" => $form->createView(),
                        "records" => $gamemodel->getRecords($em),
            ));
            
        } else {        
            
            return $this->render('MobileIpermindBundle:Default:winner.html.twig',array(
                        "GameModel" => $gamemodel,
                        "records" => $gamemodel->getRecords($em),
            ));
            
        }
    }
    
    public function loserAction()
    {
        $gamestate = StateFactory::createEndGame();
        $gamemodel = $gamestate->loserGame($this->getRequest());
        
        return $this->render('MobileIpermindBundle:Default:loser.html.twig',array(
                    "GameModel" => $gamemodel,
        ));
    }
    
    public function infoAction()
    {       
        return $this->render('MobileIpermindBundle:Default:info.html.twig');
    }
    
    public function saveAction()
    {
        $gamestate = StateFactory::createEndGame();
        $gamemodel = $gamestate->winnerGame($this->getRequest());  
        $time = $gamemodel->getTime();
        
        $player = new Player();
        $form = $this->createForm(new PlayerType(), $player);
        $form->bindRequest($this->getRequest());
        
        $em = $this->getDoctrine()->getEntityManager();
        
        if ($form->isValid()) {            
            $rm = new RecordManager($em);
            $rm->setComputerSequence($gamemodel->getSecretSequence());
            $rm->setPlayer($player);
            $rm->setTimeGame($time);
            $rm->persist();
            return $this->render('MobileIpermindBundle:Default:start.html.twig',array(
                        "GameModel" => $gamemodel,
                        "records" => $gamemodel->getRecords($em),
            ));
        }
        
        return $this->render('MobileIpermindBundle:Default:winner.html.twig',array(
                        "GameModel" => $gamemodel,
                        "form" => $form->createView(),
                        "records" => $gamemodel->getRecords($em),
            ));
    }
    
    
    public function startAction()
    {
          
          $gamestate = StateFactory::createNewGame();
          $gamemodel = $gamestate->noGame($this->getRequest());
          $em = $this->getDoctrine()->getEntityManager();
        
        return $this->render('MobileIpermindBundle:Default:start.html.twig',array(
            "GameModel" => $gamemodel,
            "records" => $gamemodel->getRecords($em),
        ));
    }
    
    
    
}
