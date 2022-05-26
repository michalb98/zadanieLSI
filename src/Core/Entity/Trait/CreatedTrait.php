<?php
namespace App\Core\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

trait CreatedTrait {
    /**
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    public function getCreated(): ?DateTime {
        return $this->created;
    }

    /**
     * @ORM\PrePersist
     */
    public function onPrePresist(){
        $this->created = new DateTime("now");
    }
}