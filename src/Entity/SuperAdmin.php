<?php

namespace App\Entity;

use App\Repository\SuperAdminRepository;
use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SuperAdminRepository::class)
 */
class SuperAdmin extends User
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
        $this->roles = array("ROLE_SUPER_ADMIN");

    }
}