<?php
namespace App\Raport\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Core\Entity\Trait\IdTrait;
use App\Raport\Entity\Raport;

/**
 * @ORM\Entity()
 * @ORM\Table(name="userRaport")
 * @ORM\HasLifecycleCallbacks
 */

class User{
    use IdTrait;

    /**
    * @ORM\Column(name="userRaport", type="string", length=250)
    */
   private $userRaport='';

    public function setUserRaport(String $userRaport):void {
       $this->userRaport = $userRaport;
    }

    public function getUser() {
        return $this->user;
     }
}