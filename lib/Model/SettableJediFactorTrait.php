<?php

// Horizontal RE-USE
// You cant extend multiple classes,
// But you can use multiple traits

namespace Model;

trait SettableJediFactorTrait {

  private $jediFactor;


  public function setJediFactor($jediFactor) {
    if(!is_numeric($jediFactor)) {
      throw new Exception("Invalid jediFactor passed " . $jediFactor);
    }
    $this->jediFactor = $jediFactor;
  }

  public function getJediFactor() {
    return $this->jediFactor;
  }
}
