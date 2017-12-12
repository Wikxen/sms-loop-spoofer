<?php
use IP1\RESTClient\Core\Communicator;
use IP1\RESTClient\SMS\OutGoingSMS;

require_once('vendor/autoload.php');

// Initial setup
$config = json_decode(file_get_contents('config.json'), true);
$api = new Communicator($config['account'], $config['token']);

// handle parameters
$sender = $_GET["sender"];
$msg = $_GET["text"];

// pick action
if (strtolower(substr($msg, 0, 5)) == "santa") { // signup
  $name = substr($msg, 6);
  $printed = file_put_contents('santa.txt', $sender . ";" . $name . PHP_EOL, FILE_APPEND | LOCK_EX);
  $sms = new OutGoingSMS("Tomten", "Du är med som " . $name . "!");
  $sms->addNumber($sender);
  $api->add($sms);
} else if (strtolower(substr($msg, 0, 2)) == "go") { // send

}

echo "OK";
