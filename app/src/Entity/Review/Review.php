<?php

namespace App\Entity\Review;

use App\Entity\Client\Client;
use App\Entity\Commit\Commit;
use App\Entity\Construction\Project;
use App\Entity\Interfaces\EntityInterface;
use App\Entity\Review\ReviewItemType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
 * @ORM\Table(name="review")
 */
class Review implements EntityInterface
{
    /**
     * @Groups({"view"})
     */
    private $id;
    /**
     *
     * @Assert\NotNull
     * @Assert\Valid
     * @Groups({"view"})
     */
    private $client;
    /**
     * @Assert\NotNull
     * @Groups({"view"})
     */
    private $project;

    /**
     * @var \DateTimeInterface|null
     */
    protected $created;
    /**
     * @Assert\Valid()
     * @Groups({"view"})
     */
    private $reviewItems;

    public function __construct()
    {
        $this->reviewItems = new ArrayCollection();
        $this->created =  new \DateTime('NOW');
    }
    public function getReviewItems(): Collection
    {
        return $this->reviewItems;
    }
    public function addReviewItem(ReviewItem $reviewItem): self
    {
        if (!$this->reviewItems->contains($reviewItem))
        {
            $this->reviewItems[] = $reviewItem;
            $reviewItem->setReview($this);
        }
        return $this;
    }
    public function removeReviewItem(ReviewItem $reviewItem): self
    {
        if ($this->reviewItems->contains($reviewItem))
        {
            $this->reviewItems->removeElement($reviewItem);
            if ($reviewItem->getReview() === $this)
            {
                $reviewItem->setReview(null);
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
     * @return Client
     */
    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return Project
     */
    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;
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
