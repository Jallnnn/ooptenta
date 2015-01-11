<?php

include_once("nodebite-swiss-army-oop.php");
$ds = new DBObjectSaver(array(
  "host" => "127.0.0.1",
  "dbname" => "wu14oop2",
  "username" => "root",
  "password" => "mysql",
  "prefix" => "wu14oop2"
));

$carryout_challenge = isset($_REQUEST["carryOutChallenge"]);

$new_player = $ds->players[0];

  //PLAY CHALLENGE
  $result = $new_player->acceptChallenge($ds->ongoing_challenge[0], $ds->players);

  //who first etc.
  $winner = $result[0];
  $last = $result[count($result)-1];

  //winner gets 15 points
  $winner->success += 15;

  /*
  //third lose 5 points and a random tool
  $last->success -= 5;
  $last->loseRandomTool($ds->available_tools);
  */
  //data to echo back to frontend
$echo_data = array(
  "result" => $result,
  "playing" => $ds->players,
);

echo(json_encode($echo_data));