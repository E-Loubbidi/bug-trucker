<?php

require_once "bootstrap.php";
/*
$dql = "select b, e, r from Bug b join b.engineer e join b.reporter r order by b.created DESC";

$query = $entityManager->createQuery($dql);
$query->setMaxResults(30);
$bugs = $query->getResult();

foreach($bugs as $bug){
  echo $bug->getDescription() . " - " . $bug->getCreated()->format('d.m.Y')."\n";
  echo "    Reported by: ".$bug->getReporter()->getName()."\n";
  echo "    Assigned by: ".$bug->getEngineer()->getName()."\n";
  foreach($bug->getProducts() as $product){
    echo "      Platform: ".$product->getName()."\n";
  }
  echo "\n";
}
*/

$dql = "select b, e, r, p from Bug b join b.engineer e join b.reporter r join b.products p order by b.created DESC";

$query = $entityManager->createQuery($dql);
$bugs = $query->getArrayResult();

foreach($bugs as $bug){
  echo $bug['description']." - ".$bug['created']->format(d.m.Y)."\n";
  echo "    Reported by: ".$bug['reporter']['name']."\n";
  echo "    Assigned to: ".$bug['engineer']['name']."\n";
  foreach ($bug['products'] as $product) {
      echo "    Platform: ".$product['name']."\n";
  }
  echo "\n";
}
