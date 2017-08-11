<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Shelf
 *
 * @ORM\Table(name="shelf")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ShelfRepository")
 */
class Shelf
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\ManyToOne(targetEntity="Shelving", inversedBy="shelfs")
     * @ORM\JoinColumn(name="shelving_id", referencedColumnName="id")
     */
    private $shelving;

    public function __construct()
    {
        $this->shelving = new ArrayCollection();
    }

    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="holding_capacity", type="integer")
     */
    private $holdingCapacity;

    /**
     * @var string
     *
     * @ORM\Column(name="shelf_name", type="string", length=10)
     */
    private $shelfName;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set holdingCapacity
     *
     * @param integer $holdingCapacity
     *
     * @return Shelf
     */
    public function setHoldingCapacity($holdingCapacity)
    {
        $this->holdingCapacity = $holdingCapacity;

        return $this;
    }

    /**
     * Get holdingCapacity
     *
     * @return int
     */
    public function getHoldingCapacity()
    {
        return $this->holdingCapacity;
    }

    /**
     * Set shelfName
     *
     * @param string $shelfName
     *
     * @return Shelf
     */
    public function setShelfName($shelfName)
    {
        $this->shelfName = $shelfName;

        return $this;
    }

    /**
     * Get shelfName
     *
     * @return string
     */
    public function getShelfName()
    {
        return $this->shelfName;
    }
}

