<?php

$config = include '../config/configs.php';
require('../api.php');
echo "\n".$config;
$API_TOKEN = generateToken($config[$clientCreds]);