<?php

namespace App\Entity\ReviewConstruction;

use App\Entity\Commit\Commit;
use App\Entity\Interfaces\EntityInterface;
use App\Entity\ReviewConstruction\ReviewConstructionItemType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
 * @ORM\Table(name="review_construction_item")
 */
class ReviewConstructionItem implements EntityInterface
{
    private $id;
    /**
     * @Groups({"view"})
     */
    private $title;

    /**
     * @Groups({"view"})
     */
    private $page;
    /**
     * @Groups({"view"})
     *
     */
    private $reviewConstructionItemType;

    /**
     * @var \DateTimeInterface|null
     */
    protected $created;

    /**
     * @Groups({"details"})
     */
    private $reviewItems;

    public function __construct()
    {

        $this->reviewItems = new ArrayCollection();
    }

    public function getReviewItems(): Collection
    {
        return $this->reviewItems;
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
    public function getPage():int
    {
        return $this->page;
    }
    /**
     * @param mixed $page
     */
    public function setPage($page): void
    {
        $this->page = $page;
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
    public function getReviewConstructionItemType(): ?ReviewConstructionItemType
    {
        return $this->reviewConstructionItemType;
    }

    public function setReviewConstructionItemType(?ReviewConstructionItemType $reviewConstructionItemType): self
    {
        $this->reviewConstructionItemType = $reviewConstructionItemType;
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
