<?php

class Character extends Base {

  public $name;
  public $health = 100;
  public $level = 1;
  public $success = 50;
  public $attackspeed = 0;
  public $abilitypower = 0;
  public $attackdamage = 0;
  public $armor = 0;
  public $tools = array();

  public function __construct($name) {
    $this->name = $name;
  }
}