<?php

namespace App\Entity;

use App\Repository\PlanningRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanningRepository::class)]
class Planning
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $roomNumber;

    #[ORM\Column(type: 'string', length: 100)]
    private $BeginHour;

    #[ORM\Column(type: 'string', length: 100)]
    private $EndHour;

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\ManyToOne(targetEntity: Activity::class, inversedBy: 'planning')]
    private $activity;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'Plan')]
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoomNumber(): ?int
    {
        return $this->roomNumber;
    }

    public function setRoomNumber(int $roomNumber): self
    {
        $this->roomNumber = $roomNumber;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getActivity(): ?Activity
    {
        return $this->activity;
    }

    public function setActivity(?Activity $activity): self
    {
        $this->activity = $activity;

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
}
