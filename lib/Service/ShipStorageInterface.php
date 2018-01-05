<?php

namespace Service;

// All the methods in an interface are allways abstract

interface ShipStorageInterface {

  /**
   * Returns an array of ship arrays with the keys id, name, weaponPower, defense.
   * @return array
   */
   public function fetchAllShipsData();

   /**
    * @param integer $id
    * @return array()
    */
   public function fetchSingleShipData($id);



}
