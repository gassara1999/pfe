<?php

namespace App\Entity;

use App\Repository\MembershipTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MembershipTypeRepository::class)]
class MembershipType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string')]
    #[Assert\NotBlank]
    private $Membershiptype;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank]
    private $description;

    
    #[ORM\OneToMany(targetEntity: Membership::class, mappedBy: 'type')]
    private $memberships;

    public function __construct()
    {
        $this->type = new ArrayCollection();
        $this->memberships = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getMembershiptype(): ?string
    {
        return $this->Membershiptype;
    }

    public function setMembershiptype(string $Membershiptype): self
    {
        $this->Membershiptype = $Membershiptype;

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

   

    /**
     * @return Collection<int, Membership>
     */
    public function getMemberships(): Collection
    {
        return $this->memberships;
    }

    public function addMembership(Membership $membership): self
    {
        if (!$this->memberships->contains($membership)) {
            $this->memberships[] = $membership;
            $membership->setType($this);
        }

        return $this;
    }

   
    
    public function removeMembership(Membership $membership): self
    {
        if ($this->memberships->removeElement($membership)) {
            if ($membership->getType() === $this) {
                $membership->setType(null);
            }
        }

        return $this;
    }
    
}
