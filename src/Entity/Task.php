<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TaskRepository::class)
 */
class Task
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
    private $numero_task;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Project::class, inversedBy="tasks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $projet;

/**
 * @var ENUM
 *
 * @ORM\Column(name="status", type="string", columnDefinition="ENUM('Not Started Yet', 'In Process', 'Done')")
 */
  private $status;

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroTask(): ?int
    {
        return $this->numero_task;
    }

    public function setNumeroTask(int $numero_task): self
    {
        $this->numero_task = $numero_task;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getProjet(): ?Project
    {
        return $this->projet;
    }

    public function setProjet(?Project $projet): self
    {
        $this->projet = $projet;

        return $this;
    }
      public function __toString(){
               
        return (string)$this->numero_task;
                                               
      }
      
    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
  
}
