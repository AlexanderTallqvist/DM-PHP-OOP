<?php

//Doing this gives us the opportonity to modify data before passing
// it to the PdoShipStorage methods.

//This is called COMPOSTION
//We change the behaviour of an existing class without
//extending it and overriding its methods

namespace Service;

class LoggableShipStorage implements ShipStorageInterface {

  private $shipStorage;

  public function __construct(ShipStorageInterface $shipStorage) {
    $this->shipStorage = $shipStorage;
  }

  public function fetchAllShipsData(){
    $ships =  $this->shipStorage->fetchAllShipsData();

    // Make the change we could do in PdoShipStorage
    $this->log(sprintf('Just fetched %s ships', count($ships)));

    return $ships;
  }


  public function fetchSingleShipData($id){
    return $this->shipStorage->fetchSingleShipData();
  }

  public function log($message){
    echo $message;
  }

}
