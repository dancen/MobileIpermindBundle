<?php

namespace Mobile\IpermindBundle\Model;
use Mobile\IpermindBundle\Model\CheckerConstants;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Checker
 *
 * @author admin
 */

class Checker implements CheckerConstants {
    
  private $result_matrix = array(CheckerConstants::_EMPTY,
                                 CheckerConstants::_EMPTY,
                                 CheckerConstants::_EMPTY,
                                 CheckerConstants::_EMPTY);
  private $player_sequence;
  private $computer_sequence;

  public function __construct(){}
  
  public function setPlayerSequence($player_sequence){
      $this->player_sequence = $player_sequence;
  }
  
  public function setComputerSequence($secret_sequence){
      $this->computer_sequence = $secret_sequence;
  }  
  

  public function parseSequence(){
    
      
      $player_sequence_clone = $this->player_sequence;
      
      // PARSE RIGHT COLOR IN RIGHT PLACE
      
      for( $i=0; $i<count($this->player_sequence); $i++ ){          
               if( $this->player_sequence[$i] == $this->computer_sequence[$i] ) { 
                   $this->result_matrix[$i] = CheckerConstants::_BLACK;
                   $player_sequence_clone[$i] = CheckerConstants::_PARSED;
               } else {
                   $this->result_matrix[$i] = "e";
               }
      }
      
      // PARSE RIGHT COLOR IN WRONG PLACE
      
      for( $i=0; $i<count($player_sequence_clone); $i++ ){
                 for( $y=0; $y<count($this->computer_sequence); $y++ ){
                             if( $this->result_matrix[$y] == CheckerConstants::_EMPTY ){                                     
                                     if( $player_sequence_clone[$i] == $this->computer_sequence[$y] ){
                                                $this->result_matrix[$y] = CheckerConstants::_WHITE;
                                                $player_sequence_clone[$i] = CheckerConstants::_PARSED;
                                     }
                             }
               } 
      }
      
      
  }
  
  public function getErrors(){
      $this->mixErrors();
      return $this->result_matrix;
  }
  
  public function mixErrors(){
      shuffle( $this->result_matrix );
  }
  
  public function isWinner(){
      $isWinner = true;
      for( $i=0; $i<count($this->result_matrix); $i++ ){
           if( $this->result_matrix[$i] != CheckerConstants::_BLACK ){
               $isWinner = false;
               break;
           }
      }
      return $isWinner;
  }
  
  
  
    
}