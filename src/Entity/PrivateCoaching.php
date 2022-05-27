<?php

namespace App\Entity;

use App\Repository\PrivateCoachingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrivateCoachingRepository::class)]
class PrivateCoaching
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $DateSession;

    #[ORM\Column(type: 'string', length: 100)]
    private $BeginHour;

    #[ORM\Column(type: 'string', length: 100)]
    private $EndHour;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'PrivateCoach')]
    private $user;
    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'PrivateCoaching')]
    private $Client;
 

    


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateSession(): ?\DateTimeInterface
    {
        return $this->DateSession;
    }

    public function setDateSession(\DateTimeInterface $DateSession): self
    {
        $this->DateSession = $DateSession;

        return $this;
    }

    public function getBeginHour(): ?string
    {
        return $this->BeginHour;
    }

    public function setBeginHour(string $BeginHour): self
    {
        $this->BeginHour = $BeginHour;

        return $this;
    }

    public function getEndHour(): ?string
    {
        return $this->EndHour;
    }

    public function setEndHour(string $EndHour): self
    {
        $this->EndHour = $EndHour;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
    public function getClient(): ?Client
    {
        return $this->Client;
    }

    public function setClient(?Client $client): self
    {
        $this->Client = $client;

        return $this;
    }

    
}