<?php


class Result{

  private $instruction;
  private $result;
  private $createdAt;

  function __construct($instruction, $result, $createdAt){
  	$this->instruction=$instruction;
  	$this->result=$result;
  	$this->createdAt=$createdAt;
  }
  function getInstruction(){
  	return $this->instruction;
  }
  function getResult(){
  	return $this->result;
  }
  function getCreatedAt(){
  	return $this->createdAt;
  }
}

?>