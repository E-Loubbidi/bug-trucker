<?php

require_once "bootstrap.php";

$newProductName = $argv[1];

$product = new Product();
$product->setName($newProductName);

$entityManager->persist($product);
$entityManager->flush();

echo "Product Created with Id = " . $product->getId() . " and Name = " . $product->getName() . "\n";

echo var_dump($product);
