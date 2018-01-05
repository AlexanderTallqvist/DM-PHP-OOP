<?php

namespace Model;

class BrokenShip extends AbstractShip {

  public function isFunctional() {
    return false;
  }

  public function getJediFactor() {
    return 0;
  }

  public function getType() {
    return "Broken";
  }

}
