<?php
require_once '../vendor/autoload.php';
$config = include '../config/configs.php';
require('../api.php');


$API_TOKEN = generateToken($config['clientCreds']);
// print_r($API_TOKEN);
// print_r(getAllRealmID($API_TOKEN));