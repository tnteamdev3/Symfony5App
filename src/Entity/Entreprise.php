<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntrepriseRepository::class)
 */
class Entreprise
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $entreprise_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntrepriseId(): ?int
    {
        return $this->entreprise_id;
    }

    public function setEntrepriseId(int $entreprise_id): self
    {
        $this->entreprise_id = $entreprise_id;

        return $this;
    }
}
