<?php

namespace Mobile\IpermindBundle\Model\ObjectPool;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConnectionPool
 *
 * @author admin
 */

class ConnectionPool  {
    
  private $poolsize = 10;
  private $available_resources = array();
  private $used_resources = array();
  private $connection_error = null;
  
  public function __construct(){
      $this->init();
  }
  
  private function init(){
      for( $i=0; $i<$this->poolsize; $i++ ) {
            $conn = new Connection();
            array_push($this->available_resources,$conn);
      }
  }
  
  public function getConnection(){
      if(count($this->available_resources)==0){
          $this->connection_error .= "10 resources exhausted,";
          $this->poolsize = $this->poolsize + 10;
      }
      
      $conn = $this->available_resources[0];
      array_shift($this->available_resources);
      array_push($this->used_resources,$conn);
      return $conn;
  }
  
  public function releaseConnection(Connection $conn){
      if(!array_key_exists($conn, $this->used_resources)){
          $this->connection_error .= "object unknown,";
      }
      
      $conn->reset();
      array_push($this->available_resources, $conn);
      $this->used_resources = array_diff($this->used_resources, array($conn));
      
  }
  
  public function getPoolSize(){
      return $this->poolsize;
  }
  
  public function getAvailableResourcesCount(){
      return count($this->available_resources);
  }
  
  public function getUsedResourcesCount(){
      return count($this->used_resources);
  }
  
  public function dump(){
      var_dump("poolsize: ".$this->poolsize.
               ", available resources: ".count($this->available_resources).
               ", used resources: ".count($this->used_resources)." \n\r");
  }  
  
    
}