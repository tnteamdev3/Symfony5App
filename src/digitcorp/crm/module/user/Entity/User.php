<?php

namespace App\digitcorp\crm\module\user\Entity;

use App\digitcorp\crm\module\user\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
 class User implements UserInterface
                                       {
                                           /**
                                            * @ORM\Id()
                                            * @ORM\GeneratedValue()
                                            * @ORM\Column(type="integer")
                                            */
                                           private $id;
                                       
                                           /**
                                            * @ORM\Column(type="string", length=180, unique=true)
                                            */
                                           private $email;
                                       
                                           /**
                                            * @ORM\Column(type="json")
                                            */
                                           private $roles = [];
                                       
                                           /**
                                            * @var string The hashed password
                                            * @ORM\Column(type="string")
                                            */
                                           private $password;
                              
                                           /**
                                            * @ORM\ManyToMany(targetEntity=App\digitcorp\crm\module\entreprise\Entity\Entreprise::class, mappedBy="user")
                                            */
                                           private $entreprises;
            
                                           /**
                                            * @ORM\ManyToMany(targetEntity=App\digitcorp\crm\module\project\Entity\Project::class, mappedBy="users")
                                            */
                                           private $projects;
                           
                                           public function __construct()
                                           {
                                               $this->entreprises = new ArrayCollection();
                                               $this->projects = new ArrayCollection();
                                           }
                                       
                                           public function getId(): ?int
                                           {
                                               return $this->id;
                                           }
                                       
                                           public function getEmail(): ?string
                                           {
                                               return $this->email;
                                           }
                                       
                                           public function setEmail(string $email): self
                                           {
                                               $this->email = $email;
                                       
                                               return $this;
                                           }
                                       
                                           /**
                                            * A visual identifier that represents this user.
                                            *
                                            * @see UserInterface
                                            */
                                           public function getUsername(): string
                                           {
                                               return (string) $this->email;
                                           }
                                       
                                           /**
                                            * @see UserInterface
                                            */
                                           public function getRoles(): array
                                           {
                                               $roles = $this->roles;
                                               // guarantee every user at least has ROLE_USER
                                               $roles[] = 'ROLE_USER';
                                       
                                               return array_unique($roles);
                                           }
                                       
                                           public function setRoles(array $roles): self
                                           {
                                               $this->roles = $roles;
                                       
                                               return $this;
                                           }
                                       
                                           /**
                                            * @see UserInterface
                                            */
                                           public function getPassword(): string
                                           {
                                               return (string) $this->password;
                                           }
                                       
                                           public function setPassword(string $password): self
                                           {
                                               $this->password = $password;
                                       
                                               return $this;
                                           }
                                       
                                           /**
                                            * @see UserInterface
                                            */
                                           public function getSalt()
                                           {
                                               // not needed when using the "bcrypt" algorithm in security.yaml
                                           }
                                       
                                           /**
                                            * @see UserInterface
                                            */
                                           public function eraseCredentials()
                                           {
                                               // If you store any temporary, sensitive data on the user, clear it here
                                               // $this->plainPassword = null;
                                           }
                     
                                           /**
                                            * @return Collection|Entreprise[]
                                            */
                                           public function getEntreprises(): Collection
                                           {
                                               return $this->entreprises;
                                           }
               
                                           public function addEntreprise(Entreprise $entreprise): self
                                           {
                                               if (!$this->entreprises->contains($entreprise)) {
                                                   $this->entreprises[] = $entreprise;
                                                   $entreprise->addUser($this);
                                               }
                  
                                               return $this;
                                           }
               
                                           public function removeEntreprise(Entreprise $entreprise): self
                                           {
                                               if ($this->entreprises->contains($entreprise)) {
                                                   $this->entreprises->removeElement($entreprise);
                                                   $entreprise->removeUser($this);
                                               }
               
                                               return $this;
                                           }
                                           public function __toString(){
               
                                                return $this->email;
                                               
                                                   }
      
                                           /**
                                            * @return Collection|Project[]
                                            */
                                           public function getProjects(): Collection
                                           {
                                               return $this->projects;
                                           }
   
                                           public function addProject(Project $project): self
                                           {
                                               if (!$this->projects->contains($project)) {
                                                   $this->projects[] = $project;
                                                   $project->addUser($this);
                                               }
   
                                               return $this;
                                           }

                                           public function removeProject(Project $project): self
                                           {
                                               if ($this->projects->contains($project)) {
                                                   $this->projects->removeElement($project);
                                                   $project->removeUser($this);
                                               }

                                               return $this;
                                           }
                                               }