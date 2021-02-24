<?php

require_once "bootstrap.php";

$newUserName = $argv[1];

$user = new User();
$user->setName($newUserName);

$entityManager->persist($user);
$entityManager->flush();

echo "User created with id = " . $user->getId() . " and name = " .  $user->getName() . "\n";
