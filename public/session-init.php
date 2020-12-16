<?php

session_start();

use Symfony\Component\Yaml\Yaml;

// activation du système d'autoloading de Composer
require_once __DIR__.'/../vendor/autoload.php';

$config = Yaml::parseFile(__DIR__.'/../vendor/config/config.yaml');

$_SESSION['login'] = $config['login'];
$_SESSION['email'] = $config['email'];