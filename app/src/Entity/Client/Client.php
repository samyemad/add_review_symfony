<?php

namespace App\Entity\Client;

use App\Entity\Review\Review;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;



class Client implements UserInterface
{

    /**
     * @Groups({"view"})
     */
    private $id;

    /**
     * @Groups({"view"})
     */
    private $username;

    /**
     * @ORM\Column(type="string")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     *
     */
    private $password;

    /**
     * @var string The hashed password
     *
     */
    private $firstName;

    /**
     * @var string The hashed password
     *
     */
    private $lastName;

    /**
     * @var string apiToken
     */
    private $apiToken;
    /**
     *
     * @Groups({"details"})
     */
    private $reviews;

    public function __construct()
    {

        $this->reviews = new ArrayCollection();
    }

    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->contains($review))
        {
            $this->reviews->removeElement($review);
            if ($review->getClient() === $this)
            {
                $review->setClient(null);
            }
        }
        return $this;
    }


    public function getApiToken(): ?string
    {
        return $this->apiToken;
    }

    public function setApiToken(string $apiToken): self
    {
        $this->apiToken = $apiToken;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUserName(string $userName): self
    {
        $this->username = $userName;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {


        $roles = json_decode($this->roles);
//        // guarantee every user at least has ROLE_USER
//        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = json_encode($roles);
        return $this;
    }

    /**
     * @see UserInterface
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
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUserIdentifier()
    {
        return $this->getId();
    }



}
