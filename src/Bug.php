<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="bugs")
*/
class Bug{
  /**
  * @var int
  * @ORM\Id
  * @ORM\Column(name="id", type="integer")
  * @ORM\GeneratedValue(strategy="IDENTITY")
  */
  private $id;
  /**
  * @var string
  * @ORM\Column(type="string")
  */
  private $description;
  /**
  * @ORM\Column(type="datetime")
  * @var datetime
  */
  private $created;
  /**
  * @ORM\Column(type="string")
  * @var string
  */
  private $status;
  /**
  * @ORM\ManyToMany(targetEntity="Product")
  */
  private $products;
  /**
  * @ORM\ManyToOne(targetEntity="User", inversedBy="assignedBugs")
  */
  private $engineer;
  /**
  * @ORM\ManyToOne(targetEntity="User", inversedBy="reportedBugs")
  */
  private $reporter;

  public function __construct(){
    $this->products = new ArrayCollection();
  }

  public function getId(){
    return $this->id;
  }

  public function getDescription(){
    return $this->descritpion;
  }

  public function setDescription($description){
    $this->description = $description;
  }

  public function getCreated(){
    return $this->created;
  }

  public function setCreated($created){
    $this->created = $created;
  }

  public function getStatus(){
    return $this->status;
  }

  public function setStatus($status){
    $this->status = $status;
  }

  public function getProducts(){
    return $this->products;
  }

  public function getEngineer(){
    return $this->engineer;
  }

  public function getReporter(){
    return $this->reporter;
  }

  public function assignToProduct($product){
    $this->products[] = $product;
  }

  public function setEngineer($engineer){
    $engineer->assignedToBug($this);
    $this->engineer = $engineer;
  }

  public function setReporter($reporter){
    $reporter->addReportedBug($this);
    $this->reporter = $reporter;
  }
}
