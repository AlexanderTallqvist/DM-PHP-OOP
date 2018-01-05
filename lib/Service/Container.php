<?php

namespace Service;

class Container {

  private $configuration;
  private $pdo;
  private $shipLoader;
  private $shipStorage;
  private $battleManager;


  public function __construct($configuration) {
    $this->configuration = $configuration;
  }


/**
 * @return \PDO
 */
  public function getPdo() {

    if($this->pdo === null){
      //We need the backslash so that PHP dosent use Service\PDO
      $this->pdo = new \PDO(
        $this->configuration['db_dsn'],
        $this->configuration['db_user'],
        $this->configuration['db_pass']
      );
      $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    return $this->pdo;

  }


  /**
   * @return ShipLoader
   */
  public function getShipLoader() {
    if($this->shipLoader === null){
      $this->shipLoader = new ShipLoader($this->getShipStorage());
    }
    return $this->shipLoader;
  }


  /**
   * @return ShipStorageInterface
   */
  public function getShipStorage() {
    if($this->shipStorage === null){
      $this->shipStorage = new PdoShipStorage($this->getPdo());
      //$this->shipStorage = new JsonFileShipStorage(__DIR__ . "/../../ships.json");

      // We pass the PdoShipStorage to LoggableShipStorage
      // We pretend that PdoShipStorage is a class that we cant change,
      // But doing it this way we are able to.
      // We esentilly alter the information in our own class before we return it
      $this->shipStorage = new LoggableShipStorage($this->shipStorage);
    }
    return $this->shipStorage;
  }


  /**
   * @return BattleManager
   */
  public function getBattleManager() {
    if($this->battleManager === null){
      $this->battleManager = new BattleManager();
    }
    return $this->battleManager;
  }
}
