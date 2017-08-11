<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shelving
 *
 * @ORM\Table(name="shelving")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ShelvingRepository")
 */
class Shelving
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=255)
     */
    private $number;

    /**
     * @var int
     *
     * @ORM\Column(name="shelvings_quantity", type="integer")
     */
    private $shelvingsQuantity;

    /**
     * @var int
     *
     * @ORM\Column(name="shelfs_quantity", type="integer")
     */
    private $shelfsQuantity;


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
     * Set number
     *
     * @param string $number
     *
     * @return Shelving
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set shelvingsQuantity
     *
     * @param integer $shelvingsQuantity
     *
     * @return Shelving
     */
    public function setShelvingsQuantity($shelvingsQuantity)
    {
        $this->shelvingsQuantity = $shelvingsQuantity;

        return $this;
    }

    /**
     * Get shelvingsQuantity
     *
     * @return int
     */
    public function getShelvingsQuantity()
    {
        return $this->shelvingsQuantity;
    }

    /**
     * Set shelfsQuantity
     *
     * @param integer $shelfsQuantity
     *
     * @return Shelving
     */
    public function setShelfsQuantity($shelfsQuantity)
    {
        $this->shelfsQuantity = $shelfsQuantity;

        return $this;
    }

    /**
     * Get shelfsQuantity
     *
     * @return int
     */
    public function getShelfsQuantity()
    {
        return $this->shelfsQuantity;
    }
}

