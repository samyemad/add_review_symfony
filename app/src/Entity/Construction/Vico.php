<?php

namespace App\Entity\Construction;

use App\Entity\Interfaces\EntityInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
 * @ORM\Table(name="vico")
 */
class Vico implements EntityInterface
{
    /**
     * @var integer
     */
    private $id;
    /**
     * @var string
     * @Groups({"view"})
     */
    private $name;
    /**
     * @var array
     * @Groups({"view"})
     */
    private $projects;

    /**
     * @var \DateTimeInterface|null
     */
    protected $created;
    /**
     * @return mixed
     */
    public function __construct()
    {

        $this->projects = new ArrayCollection();
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
     * @return ArrayCollection|Project[]
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }
    /**
     * add Project to Collection
     * @param Project $project
     * @return self
     */
    public function addProject(Project $project): self
    {
        if (!$this->projects->contains($project))
        {
            $this->projects[] = $project;
            $project->setVico($this);
        }
        return $this;
    }
    /**
     * remove Project from Collection
     * @param Project $project
     * @return self
     */
    public function removeProject(Project $project): self
    {
        if ($this->projects->contains($project))
        {
            $this->projects->removeElement($project);
            if ($project->getVico() === $this)
            {
                $project->setVico(null);
            }
        }
        return $this;
    }
    /**
     * @return DateTimeInterface
     */
    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }
    /**
     * @param DateTimeInterface $created
     * @return vpid
     */
    public function setCreated(?\DateTimeInterface $created): void
    {
        $this->created = $created;
    }
}
