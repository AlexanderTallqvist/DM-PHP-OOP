<?php

namespace Model;

// We don't need a use statement, since the AbstractShip has
// the same namespace.

class BountyHunterShip extends AbstractShip {

  // Used the methods from teh SettableJediFactorTrait TRAIT
  use SettableJediFactorTrait;

  public function isFunctional() {
    return true;
  }

  public function getType() {
    return "Bounty Hunter";
  }

}
