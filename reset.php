<?php

//Nodebite black box
include_once("nodebite-swiss-army-oop.php");


$ds = new DBObjectSaver(array(
  "host" => "127.0.0.1",
  "dbname" => "",
  "username" => "root",
  "password" => "mysql",
  "prefix" => "",
));



if (isset($_REQUEST["startOver"])) {
  unset($ds->players);
  unset($ds->computer_player);
  unset($ds->tools);
  unset($ds->gameplay);
}

echo(json_encode(true));