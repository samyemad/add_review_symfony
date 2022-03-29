<?php

namespace App\Entity\ReviewConstruction;

use App\Entity\Interfaces\EntityInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
 * @ORM\Table(name="review_construction_item_type")
 */
class ReviewConstructionItemType implements EntityInterface
{
    private $id;
    /**
     *
     * @Groups({"view","details"})
     */
    private $name;
    /**
     *
     * @Groups({"details"})
     */
    private $reviewConstructionItems;

    /**
     * @var \DateTimeInterface|null
     */
    protected $created;
    /**
     * @return mixed
     */
    public function __construct()
    {
        $this->reviewConstructionItems = new ArrayCollection();
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
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }
    /**
     * @return ArrayCollection|ReviewItem[]
     */
    public function getReviewConstructionItems(): Collection
    {
        return $this->reviewConstructionItems;
    }
    public function addReviewConstructionItem(ReviewConstructionItem $reviewConstructionItem): self
    {
        if (!$this->reviewConstructionItems->contains($reviewConstructionItem))
        {
            $this->reviewConstructionItems[] = $reviewConstructionItem;
            $reviewConstructionItem->setReviewConstructionItemType($this);
        }
        return $this;
    }
    public function removeReviewConstructionItem(ReviewConstructionItem $reviewConstructionItem): self
    {
        if ($this->reviewConstructionItems->contains($reviewConstructionItem))
        {
            $this->reviewConstructionItems->removeElement($reviewConstructionItem);
            if ($reviewConstructionItem->getReviewConstructionItemType() === $this)
            {
                $reviewConstructionItem->setReviewConstructionItemType(null);
            }
        }
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
