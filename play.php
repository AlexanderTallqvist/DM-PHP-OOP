<?php

require_once __DIR__."/lib/Ship.php";

function printShipSummary($someShip) {
  echo 'Shipe name: ' . $someShip->name;
  echo "<hr>";
  $someShip->sayHello();
  echo "<hr>";
  echo $someShip->getName();
  echo "<hr>";
  echo $someShip->getNameAndSpecs(true);
}

$myShip = new Ship();
$myShip->name = "Alexander";
$myShip->weaponPower = 10;
$myShip->strength = 60;

$otherShip = new Ship();
$otherShip->name = "Arttu";
$otherShip->weaponPower = 5;
$otherShip->strength = 50;

print(printShipSummary($myShip));
echo "<hr>";
print(printShipSummary($otherShip));
echo "<hr>";

if ($myShip->doesGivenShipHaveMoreStrength($otherShip)) {
  echo $otherShip->name . " has more strenght";
}else{
  echo $myShip->name . " has more strenght";
}
