<?php

namespace App\Entity\Construction;


use App\Entity\Interfaces\EntityInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Entity\Review\Review;

/**
 * @ORM\Entity
 * @ORM\Table(name="projects")
 */
class Project implements EntityInterface
{
    /**
     * @var integer
     * @Groups({"view"})
     * @Assert\NotBlank
     */
    private $id;
    /**
     * @var string
     * @Groups({"view"})
     * @Assert\NotBlank
     */
    private $title;
    /**
     * @var Vico
     *
     */
    private $vico;
    /**
     * @var \DateTimeInterface|null
     */
    protected $created;
    /**
     * @var array
     * @Groups({"group1"})
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
            if ($review->getProject() === $this)
            {
                $review->setProject(null);
            }
        }
        return $this;
    }

    public function getId():int
    {
        return $this->id;
    }
    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
    /**
     * @return mixed
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }
    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }
    /**
     * @return Vico
     */
    public function getVico(): ?Vico
    {
        return $this->vico;
    }

    public function setVico(?Vico $vico): self
    {
        $this->vico = $vico;
        return $this;
    }
    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }
    public function setCreated(?\DateTimeInterface $created): void
    {
        $this->created = $created;
    }
}
