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
  // get name from message
  $name = substr($msg, 6);
  // print name and number to file
  $printed = file_put_contents('santa.txt', $sender . ";" . $name . PHP_EOL, FILE_APPEND | LOCK_EX);
  // send response
  $sms = new OutGoingSMS("Tomten", "Du är med som " . $name . "!");
  $sms->addNumber($sender);
  $api->add($sms);
} else if (strtolower(substr($msg, 0, 2)) == "go") { // send
  // Parse the file string into an array of people
  $file = file_get_contents("santa.txt");
  $people = explode(PHP_EOL, $file);
  array_pop($people);
  $people = array_unique($people);
  shuffle($people);

  // Loop through the numbers sending
  // $i sends an SMS to $i+1
  for ($i=0; $i < count($people); $i++) {
    $sender = explode(";", $people[$i]);
    $recipient = explode(";", $i != count($people) - 1 ? $people[$i + 1] : $people[0]);

    $sms = new OutGoingSMS($sender[0], "Hej " . $recipient[1] . "!\nDu fick mig. Köp något bra nu för ungefär 100 kr.\n// " . $sender[1]);
    $sms->addNumber($recipient[0]);
    $api->add($sms);
  }
}

echo "OK";
