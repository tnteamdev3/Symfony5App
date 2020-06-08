<?php

namespace App\Entity;
use App\Entity\User;
use App\Repository\UserEntrepriseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserEntrepriseRepository::class)
 */
class UserEntreprise extends User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
      public function __construct()
    {
        $this->roles = array("ROLE_USER");

    }
   
}
