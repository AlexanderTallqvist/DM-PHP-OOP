<?php

namespace Model;

class Ship extends AbstractShip {

  use SettableJediFactorTrait;

  private $underRepair;

  public function __construct($name) {
    parent::__construct($name);
    $this->underRepair = mt_rand(1, 100) < 30;
  }

  public function isFunctional() {
    return !$this->underRepair;
  }

  /*  USE TRAIT INSTEAD
  public function getJediFactor() {
    return $this->jediFactor;
  }

  public function setJediFactor($jediFactor) {
    if(!is_numeric($jediFactor)) {
      throw new Exception("Invalid jediFactor passed " . $jediFactor);
    }
    $this->jediFactor = $jediFactor;
  }
  */

  public function getType() {
    return "Empire";
  }

}
