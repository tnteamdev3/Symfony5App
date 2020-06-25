<?php

namespace App\digitcorp\crm\module\project\Entity;

use App\digitcorp\crm\module\project\Repository\ProjectRepository;
use App\digitcorp\crm\module\task\Entity\Task;
use App\digitcorp\crm\module\user\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
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
    private $name_project;

   /**
     * @ORM\ManyToMany(targetEntity=App\digitcorp\crm\module\user\Entity\User::class, inversedBy="projects")
     */
    public $user;

    /**
     * @ORM\OneToMany(targetEntity="App\digitcorp\crm\module\task\Entity\Task", mappedBy="project")
     */
    private $tasks;

    public function __construct()
    {
        $this->tasks = new ArrayCollection();
        $this->user = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameProject(): ?string
    {
        return $this->name_project;
    }

    public function setNameProject(string $name_project): self
    {
        $this->name_project = $name_project;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): ?User
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
        }
         
        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
        }

        return $this;
    }


    /**
     * @return Collection|Task[]
    */
    public function getTasks(): Collection
    {
           return $this->tasks;
    }
          
    public function addTask(Task $task): self
         {
               if (!$this->tasks->contains($task)) {
                   $this->tasks[] = $task;
                   $task->addUser($this);
       }

           return $this;
       }
               
     public function removeTask(Task $task): self
     {
        if ($this->tasks->contains($task)) {
           $this->tasks->removeElement($task);
           $task->removeUser($this);
        }
        
            return $this;
     }

          public function __toString(){
               
            return $this->name_project;
                                               
              }

          /**
           * @return Collection|User[]
           */
          public function getUser(): Collection
          {
              return $this->user;
          }
}
