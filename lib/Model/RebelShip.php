<?php

namespace Model;

Class RebelShip extends AbstractShip {

  public function getFavoriteJedi() {
    $coolJedis = array('Yoda', 'Ben Kenobi');
    $key = array_rand($coolJedis);
    return $coolJedis[$key];
  }

  public function getType(){
    return "Rebel";
  }

  public function isFunctional() {
    return true;
  }

  public function getNameAndSpecs($userShortFormat = false) {
    $val = parent::getNameAndSpecs($userShortFormat);
    $val .= " (Rebels)";
    return $val;
  }

  public function getJediFactor() {
    return rand(10, 30);
  }



}
