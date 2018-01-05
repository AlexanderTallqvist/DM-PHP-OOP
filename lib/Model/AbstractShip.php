<?php

namespace Model;

abstract class AbstractShip {

  private $name;
  private $id;
  private $weaponPower = 0;
  private $strength = 0;

  // Forse childeren to have these methods
  abstract public function getJediFactor();
  abstract public function getType();
  abstract public function isFunctional();


  public function __construct($name) {
    $this->name = $name;
  }

  public function sayHello() {
    echo "Hello World";
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }

  public function getNameAndSpecs($userShortFormat = false) {
    if ($userShortFormat) {
      return sprintf (
        '%s: /%s /%s /%s',
        $this->name,
        $this->weaponPower,
        $this->getJediFactor(),
        $this->strength
      );
    }else {
      return sprintf (
        '%s: w:%s, j:%s, s:%s',
        $this->name,
        $this->weaponPower,
        $this->getJediFactor(),
        $this->strength
      );
    }
  }

  public function doesGivenShipHaveMoreStrength($givenShip) {
    return $givenShip->strength > $this->strength;
  }

  public function setStrength($strength) {
    if(!is_numeric($strength)) {
      throw new \Exception("Invalid strength passed " . $strength);
    }
    $this->strength = $strength;
  }

  public function getStrength() {
    return $this->strength;
  }

  public function setWeaponPower($weaponPower) {
    if(!is_numeric($weaponPower)) {
      throw new \Exception("Invalid weaponPower passed " . $weaponPower);
    }
    $this->weaponPower = $weaponPower;
  }

  public function getWeaponPower() {
    return $this->weaponPower;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }

  public function __toString() {
    return $this->getName();
  }

 /*
  public function __get() {
    return someProtectedValue;
  }

  public function __set() {
    setProtectedValue
  }
 */


}
