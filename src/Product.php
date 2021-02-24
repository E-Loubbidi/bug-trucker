<?php

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Table(name="products")
* @ORM\Entity
*/
class Product
{
  /**
  * @var int
  * @ORM\Column(name="id", type="integer")
  * @ORM\Id
  * @ORM\GeneratedValue(strategy="IDENTITY")
  */
  private $id;

  /**
  * @ORM\Column(type="string")
  * @var string;
  */
  private $name;

  public function getId(){
    return $this->id;
  }

  public function getName(){
    return $this->name;
  }

  public function setName($name){
    $this->name = $name;
  }
}
