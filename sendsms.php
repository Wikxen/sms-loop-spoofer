<?php
use IP1\RESTClient\Core\Communicator;
use IP1\RESTClient\SMS\OutGoingSMS;

require_once('vendor/autoload.php');


// Initial setup
$config = json_decode(file_get_contents('config.json'), true);
$api = new Communicator($config['account'], $config['token']);

// If the text is too long we exit
if (strlen($_POST['text']) > 160) {
    header("Location:/");
}


// Parse the text string into an array of numbers
$phoneNumbers = explode("\n", trim($_POST['recipients']));
$phoneNumbers = array_map(function($number){
  return fixNumber($number);
}, $phoneNumbers);
shuffle($phoneNumbers);

// Loop through the numbers sending
// $i sends an SMS to $i+1
for ($i=0; $i < count($phoneNumbers); $i++) {
  $sender = $phoneNumbers[$i];
  $recipient = $i != count($phoneNumbers) - 1 ? $phoneNumbers[$i + 1] : $phoneNumbers[0];

  $sms = new OutGoingSMS($sender, $_POST['text']);
  $sms->addNumber($recipient);
  $api->add($sms);
}

header("Location:/?sent=success");

// Turns the numbers into the correct format
function fixNumber(string $number): string{
  $prefix = '07';
  $alternativePrefix = '+467';

  // Remove unnecessary symbols
  $number = str_replace(['-','(',')',' '], '', $number);
  $number = trim($number);

  // If a number is invalid
  if (!preg_match('/(07|\+46|46)[0-9]{1,15}/', $number)) {
      header("Location:/");
  }
// Replace 07 with 467
  if (substr($number, 0, strlen($prefix)) == $prefix) {
      $number = substr($number, strlen($prefix));
      $number = "467" . $number;
  }
  // Replace +467 with 467
  if (substr($number, 0, strlen($alternativePrefix)) == $alternativePrefix) {
      $number = substr($number, strlen($alternativePrefix));
      $number = "467" . $number;
      $number = str_replace(" ", "", $number);
  }
  return $number;
}
