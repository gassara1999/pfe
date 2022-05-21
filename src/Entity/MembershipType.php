<?php

namespace App\Entity;

use App\Repository\MembershipTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MembershipTypeRepository::class)]
class MembershipType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $Membershiptype;

    #[ORM\Column(type: 'text')]
    private $description;

    
    #[ORM\OneToMany(mappedBy: 'membershipType', targetEntity: Membership::class)]
    private $type;

    public function __construct()
    {
        $this->type = new ArrayCollection();
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
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(Membership $type): self
    {
        if (!$this->type->contains($type)) {
            $this->type[] = $type;
            $type->setMembershipType($this);
        }

        return $this;
    }

    public function removeType(Membership $type): self
    {
        if ($this->type->removeElement($type)) {
            // set the owning side to null (unless already changed)
            if ($type->getMembershipType() === $this) {
                $type->setMembershipType(null);
            }
        }

        return $this;
    }
}
