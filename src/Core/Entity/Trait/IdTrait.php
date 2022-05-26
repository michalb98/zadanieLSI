<?php
namespace App\Core\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Uuid;

trait IdTrait {
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="doctrine.ulid_generator")
     */
    private $id;

    public function getId(): ?Uuid {
        return $this->id;
    }
}