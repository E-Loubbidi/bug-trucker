<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="users")
*/
class User{
  /**
  * @var int
  * @ORM\Id
  * @ORM\Column(type="integer")
  * @ORM\GeneratedValue(strategy="IDENTITY")
  */
  private $id;
  /**
  * @var string
  * @ORM\Column(type="string")
  */
  private $name;

  /**
  * @ORM\OneToMany(targetEntity="Bug", mappedBy="reporter")
  * @var Bug[]
  */
  private $reportedBugs;
  /**
  * @ORM\OneToMany(targetEntity="Bug", mappedBy="engineer")
  * @var Bug[]
  */
  private $assignedBugs;

  public function __construct(){
    $this->reportedBugs = new ArrayCollection();
    $this->assignedBugs = new ArrayCollection();
  }

  public function getId(){
    return $this->id;
  }

  public function getName(){
    return $this->name;
  }

  public function setName($name){
    $this->name = $name;
  }

  public function addReportedBug(Bug $bug){
    $this->reportedBugs[] = $bug;
  }

  public function assignedToBug(Bug $bug){
    $this->assignedBugs[] = $bug;
  }
}
