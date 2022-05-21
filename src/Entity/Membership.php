<?php

namespace App\Entity;

use App\Repository\MembershipRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MembershipRepository::class)]
class Membership
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $DateBegin;

    #[ORM\Column(type: 'date')]
    private $EndDate;

    #[ORM\Column(type: 'decimal', precision: 4, scale: 2)]
    private $price;


    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'membership')]
    #[ORM\JoinColumn(nullable: false)]
    private $client;

    #[ORM\ManyToOne(targetEntity: MembershipType::class, inversedBy: 'type')]
    #[ORM\JoinColumn(nullable: false)]
    private $membershipType;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateBegin(): ?\DateTimeInterface
    {
        return $this->DateBegin;
    }

    public function setDateBegin(\DateTimeInterface $DateBegin): self
    {
        $this->DateBegin = $DateBegin;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->EndDate;
    }

    public function setEndDate(\DateTimeInterface $EndDate): self
    {
        $this->EndDate = $EndDate;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }
    public function getMembershipType(): ?MembershipType
    {
        return $this->membershipType;
    }

    public function setMembershipType(?MembershipType $membershipType): self
    {
        $this->membershipType = $membershipType;

        return $this;
    }
    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    
}
