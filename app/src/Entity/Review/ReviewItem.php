<?php

namespace App\Entity\Review;

use App\Entity\Client\Client;
use App\Entity\Interfaces\EntityInterface;
use App\Entity\ReviewConstruction\ReviewConstructionItem;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
 * @ORM\Table(name="review_item")
 */
class ReviewItem implements EntityInterface
{
    /**
     *
     * @Groups({"view"})
     */
    private $id;
    /**
     * @Groups({"view"})
     *
     */
    private $reviewConstruction;
    /**
     * @Assert\NotNull()
     *
     */
    private $review;
    /**
     * @var \DateTimeInterface|null
     */
    protected $created;
    /**
     * @Assert\NotBlank()
     * @Groups({"view"})
     */
    private $result;

    public function __construct()
    {
        $this->created =  new \DateTime('NOW');
    }
    /**
     * @return mixed
     */
    public function getResult(): ?string
    {
        return $this->result;
    }
    /**
     * @param mixed $result
     */
    public function setResult($result): void
    {
        $this->result = $result;
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
     * @return ReviewConstructionItem
     */
    public function getReviewConstruction(): ?ReviewConstructionItem
    {
        return $this->reviewConstruction;
    }
    public function setReviewConstruction(?ReviewConstructionItem $reviewConstruction): self
    {
        $this->reviewConstruction = $reviewConstruction;
        return $this;
    }
    /**
     * @return Review
     */
    public function getReview(): ?Review
    {
        return $this->review;
    }

    public function setReview(?Review $review): self
    {
        $this->review = $review;
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
