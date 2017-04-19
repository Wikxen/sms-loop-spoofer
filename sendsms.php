<?php
use IP1\RESTClient\Core\Communicator;
use IP1\RESTClient\SMS\OutGoingSMS;

require_once('vendor/autoload.php');

if (!preg_match('/(07|\+46)[0-9 ]{1,15}/', $_POST['recipeint'])) {
    header("Location:/");
}
if (strlen($_POST['text']) > 160) {
    header("Location:/");
}
$config = json_decode(file_get_contents('config.json'), true);

$api = new Communicator($config['account'], $config['token']);
$prefix = '07';
$alternativePrefix = '+467';
$cellphone = $_POST['recipeint'];
if (substr($cellphone, 0, strlen($prefix)) == $prefix) {
    $cellphone = substr($cellphone, strlen($prefix));
    $cellphone = "467" . $cellphone;
}
if (substr($cellphone, 0, strlen($alternativePrefix)) == $alternativePrefix) {
    $cellphone = substr($cellphone, strlen($alternativePrefix));
    $cellphone = "467" . $cellphone;
}
$cellphone = str_replace(" ", "", $cellphone);
$sms = new OutGoingSMS('iP1Demo', $_POST['text']);
$sms->addNumber($cellphone);
$api->add($sms);

header("Location:/?sent=success");
