<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Symfony\Component\Yaml\Yaml;

require_once __DIR__.'/../vendor/autoload.php';

// instanciation du chargeur de templates
$loader = new FilesystemLoader(__DIR__.'/../templates');

// instanciation du moteur de template
$twig = new Environment($loader);

// traitement des données

$config = Yaml::parseFile(__DIR__.'/../config/config.yaml');

$password = '123';
$errors = [];

if (!password_verify($password, $config['password'])) {
    $errors['password'] = 'le mot de passe ou le login est invalide.';
}


// if (empty($_POST(['password'])) {
//     echo 'le mot de passe ou le login est invalide';
// } elseif (!password_verify($password, $config['password'])) {
//     echo 'le mot de passe est invalide';
// }

// affichage du rendu d'un template
echo $twig->render('password-verify.html.twig', [
    // transmission de données au template
    'errors' => $errors,

]);