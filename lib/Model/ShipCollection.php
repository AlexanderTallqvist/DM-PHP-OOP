<?php

namespace Model;

class ShipCollection implements \ArrayAccess, \IteratorAggregate {


  /**
   * @var AbstractShip
   */

  private $ships;

  public function __construct(array $ships){
    $this->ships = $ships;
  }

  public function offsetExists($offset) {
    return property_exists($offset, $this->ships);
  }

  public function offsetGet($offset) {
    return $this->ships[$offset];
  }

  public function offsetSet($offset, $value) {
    $this->ships[$offset] = $value;
   }

  public function offsetUnset($offset){
    unset($this->ships[$offset]);
  }

  // This is used to loop thourh the object as an array in index.php
  public function getIterator() {
    return new \ArrayIterator($this->ships);
  }

  public function removeAllBrokenShips() {
    foreach ($this->ships as $key => $ship) {
      if (!$ship->isFunctional()){
        unset($this->ships[$key]);
      }
    }
  }

}
