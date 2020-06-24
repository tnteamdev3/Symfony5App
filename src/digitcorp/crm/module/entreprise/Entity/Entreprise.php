<?php

namespace  App\digitcorp\crm\module\entreprise\Entity;

use App\digitcorp\crm\module\entreprise\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="string", length=255)
     */
    private $name_entreprise;

    /**
     * @ORM\ManyToMany(targetEntity=App\digitcorp\crm\module\user\Entity\User::class, inversedBy="entreprises")
     */
    private $users;

    
    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameEntreprise(): ?string
    {
        return $this->name_entreprise;
    }

    public function setNameEntreprise(string $name_entreprise): self
    {
        $this->name_entreprise = $name_entreprise;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $users): self
    {
        if (!$this->users->contains($users)) {
            $this->users[] = $users;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($users)) {
            $this->users->removeElement($users);
        }

        return $this;
    }
    public function __toString(){
                                
        return $this->name_entreprise;
                                
          }


    }