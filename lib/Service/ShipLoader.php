<?php

namespace Service;

use Model\AbstractShip;
use Model\RebelShip;
use Model\Ship;
use Model\BountyHunterShip;
use Model\ShipCollection;

class ShipLoader {

  private $shipStorage;

  public function __construct(ShipStorageInterface $shipStorage) {
    $this->shipStorage = $shipStorage;
  }

  /**
   * @return ShipCollection
   */
  public function getShips() {
    try {
      $shipsData = $this->shipStorage->fetchAllShipsData();
    } catch(\PDOException $e) {
      // This error can be saved in a file in php.ini
      trigger_error('Database Execption! ' .$e->getMessage());
      $shipsData = array();
    }
    $ships = array();

    foreach ($shipsData as $shipData) {
      $ships[] = $this->createShipFromData($shipData);
    }

    $ships[] = new BountyHunterShip('Slave 1');

    //return $ships;
    // We return a ShipCollection that treats the data as an array,
    // But also lets us add methods to the array, which normaly would be possible
    return new ShipCollection($ships);
  }

  /**
   * @param $id
   * @return Ship[]
   */
  public function findOneById($id){
    $shipArray = $this->shipStorage->fetchSingleShipData($id);
    return $this->createShipFromData($shipArray);
  }


  private function createShipFromData(array $shipData){

    if($shipData['team'] == 'rebel'){
      $ship = new RebelShip($shipData['name']);
    }else{
      $ship = new Ship($shipData['name']);
      $ship->setJediFactor($shipData['jedi_factor']);
    }

    $ship->setId($shipData['id']);
    $ship->setWeaponPower($shipData['weapon_power']);
    $ship->setStrength($shipData['strength']);

    return $ship;
  }

}
