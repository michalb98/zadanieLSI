<?php
namespace App\Raport\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Core\Entity\Trait\IdTrait;
use App\Core\Entity\Trait\CreatedTrait;

/**
 * @ORM\Entity(repositoryClass="App\Raport\Repository\RaportRepository")
 * @ORM\Table(name="raport")
 * @ORM\HasLifecycleCallbacks
 */

class Raport {

   use IdTrait;
   use CreatedTrait;

   /**
   * @ORM\Column(name="name", type="string", length=250)
   */
   private $name = '';

   /**
   * @ORM\ManyToOne(targetEntity="Place", inversedBy="place")
   * @ORM\JoinColumn(name="place", referencedColumnName="id")
   */
   private $place;

   /**
   * @ORM\ManyToOne(targetEntity="User", inversedBy="userRaport")
   * @ORM\JoinColumn(name="userRaport", referencedColumnName="id")
   */
   private $user;
   

   public function setUser(string $user):void {
      $this->user = $user;
   }

   public function setName(string $name):void {
      $this->name = $name;
   }

   public function setPlace(string $place):void {
      $this->place = $place;
   }

   public function getUser():string {
      return $this->user;
   }
   
   public function getName():string {
      return $this->name;
   }

   public function getPlace():string {
      return $this->place;
   }

}