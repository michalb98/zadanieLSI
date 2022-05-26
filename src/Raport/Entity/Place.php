<?php
namespace App\Raport\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Core\Entity\Trait\IdTrait;

/**
 * @ORM\Entity()
 * @ORM\Table(name="place")
 * @ORM\HasLifecycleCallbacks
 */

class Place{
    use IdTrait;

    /**
    * @ORM\Column(name="name", type="string", length=250)
    */
    private $name = '';

    public function setName(String $name):void {
        $this->name = $name;
     }

    public function getName() {
        return $this->name;
    }
}