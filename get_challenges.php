<?php

include_once("nodebite-swiss-army-oop.php");

$ds = new DBObjectSaver(array(
  "host" => "127.0.0.1",
  "dbname" => "wu14oop2",
  "username" => "root",
  "password" => "mysql",
  "prefix" => "wu14oop2"
));

$latestChallenge = isset($_REQUEST["lastestChallenge"]) ? $_REQUEST["lastestChallenge"] : false;


  $randomChallenge = $lastestChallenge;
  while ($random_challenge_index == $last_challenge_index) {
    $random_challenge_index = rand(0, count($ds->challenges)-1);
  }

//remove old challenge
unset($ds->current_challenge);

//add the new one
$ds->current_challenge[] = $ds->challenges[$random_challenge_index];

//and echo it out
echo(json_encode($ds->current_challenge[0]));