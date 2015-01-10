<?php

class Character extends Base {

  public $name;
  public $health = 100;
  public $level = 1;
  public $success = 50;
  public $tools = array();

  public function __construct($name) {
    $this->name = $name;
  }

  public function isAlive() {
    
    return $this->health > 0;
    
  }