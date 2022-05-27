<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'string', length: 100)]
    private $UserName;

    #[ORM\Column(type: 'integer')]
    private $phone;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $ModfiedAt;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $CreatedAt;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $Blocked;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $Speciality;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $Salary;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: PrivateCoaching::class)]
    private $PrivateCoach;

    public function __construct()
    {
        $this->PrivateCoach = new ArrayCollection();
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
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public static function listRoles(){

        return ['ROLE_ADMIN'=>'admin','ROLE_USER'=>'user'];

    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        /*$roles[] = 'ROLE_ADMIN';
        $roles[] = 'ROLE_USER';*/

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUserName(): ?string
    {
        return $this->UserName;
    }

    public function setUserName(string $UserName): self
    {
        $this->UserName = $UserName;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getModfiedAt(): ?\DateTimeImmutable
    {
        return $this->ModfiedAt;
    }

    public function setModfiedAt(?\DateTimeImmutable $ModfiedAt): self
    {
        $this->ModfiedAt = $ModfiedAt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    public function isBlocked(): ?bool
    {
        return $this->Blocked;
    }

    public function setBlocked(?bool $Blocked): self
    {
        $this->Blocked = $Blocked;

        return $this;
    }

    public function getSpeciality(): ?string
    {
        return $this->Speciality;
    }

    public function setSpeciality(?string $Speciality): self
    {
        $this->Speciality = $Speciality;

        return $this;
    }

    public function getSalary(): ?string
    {
        return $this->Salary;
    }

    public function setSalary(?string $Salary): self
    {
        $this->Salary = $Salary;

        return $this;
    }

    /**
     * @return Collection<int, PrivateCoaching>
     */
    public function getPrivateCoach(): Collection
    {
        return $this->PrivateCoach;
    }

    public function addPrivateCoach(PrivateCoaching $privateCoach): self
    {
        if (!$this->PrivateCoach->contains($privateCoach)) {
            $this->PrivateCoach[] = $privateCoach;
            $privateCoach->setUser($this);
        }

        return $this;
    }

    public function removePrivateCoach(PrivateCoaching $privateCoach): self
    {
        if ($this->PrivateCoach->removeElement($privateCoach)) {
            // set the owning side to null (unless already changed)
            if ($privateCoach->getUser() === $this) {
                $privateCoach->setUser(null);
            }
        }

        return $this;
    }



    
}
