<?php

namespace App\digitcorp\crm\module\task\Entity;

use App\digitcorp\crm\module\task\Repository\TaskRepository;
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
     * @ORM\ManyToOne(targetEntity="App\digitcorp\crm\module\project\Entity\Project", inversedBy="tasks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $project;

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

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

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