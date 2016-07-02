<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="route")
 */
class Route
{
		
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="decimal", scale=2, name="x1")
     */
    protected $x1;
    
    /**
     * @ORM\Column(type="decimal", scale=2, name="y1")
     */
    protected $y1; 
    
    /**
     * @ORM\Column(type="decimal", scale=2, name="x2")
     */
    protected $x2;
    
    /**
     * @ORM\Column(type="decimal", scale=2, name="y2")
     */
    protected $y2; 
	
	/**
     * @ORM\ManyToOne(targetEntity="Plateau", inversedBy="routes")
     * @ORM\JoinColumn(name="plateau_id", referencedColumnName="id")
     */
    protected $plateau;
    
    /**
     * @ORM\Column(type="text", name="plateau_location", nullable=true)
     */
    protected $plateauLocation;  
      
    /**
     * @ORM\ManyToMany(targetEntity="Tuile", mappedBy="routes")
     */
    protected $tuiles;
    
    /**
     * @ORM\ManyToMany(targetEntity="Spot", inversedBy="routes")
     * @ORM\JoinTable(name="spots_routes")
     */
    protected $spots;
      
    public function __construct() {
        $this->tuiles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->spots = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set x1
     *
     * @param integer $x1
     *
     * @return Route
     */
    public function setX1($x1)
    {
        $this->x1 = $x1;

        return $this;
    }

    /**
     * Get x1
     *
     * @return integer
     */
    public function getX1()
    {
        return $this->x1;
    }

    /**
     * Set y1
     *
     * @param integer $y1
     *
     * @return Route
     */
    public function setY1($y1)
    {
        $this->y1 = $y1;

        return $this;
    }

    /**
     * Get y1
     *
     * @return integer
     */
    public function getY1()
    {
        return $this->y1;
    }

    /**
     * Set x2
     *
     * @param integer $x2
     *
     * @return Route
     */
    public function setX2($x2)
    {
        $this->x2 = $x2;

        return $this;
    }

    /**
     * Get x2
     *
     * @return integer
     */
    public function getX2()
    {
        return $this->x2;
    }

    /**
     * Set y2
     *
     * @param integer $y2
     *
     * @return Route
     */
    public function setY2($y2)
    {
        $this->y2 = $y2;

        return $this;
    }

    /**
     * Get y2
     *
     * @return integer
     */
    public function getY2()
    {
        return $this->y2;
    }

    /**
     * Set plateauLocation
     *
     * @param integer $plateauLocation
     *
     * @return Route
     */
    public function setPlateauLocation($plateauLocation)
    {
        $this->plateauLocation = $plateauLocation;

        return $this;
    }

    /**
     * Get plateauLocation
     *
     * @return integer
     */
    public function getPlateauLocation()
    {
        return $this->plateauLocation;
    }

    /**
     * Set plateau
     *
     * @param \AppBundle\Entity\Plateau $plateau
     *
     * @return Route
     */
    public function setPlateau(\AppBundle\Entity\Plateau $plateau = null)
    {
        $this->plateau = $plateau;

        return $this;
    }

    /**
     * Get plateau
     *
     * @return \AppBundle\Entity\Plateau
     */
    public function getPlateau()
    {
        return $this->plateau;
    }

    /**
     * Add tuile
     *
     * @param \AppBundle\Entity\Tuile $tuile
     *
     * @return Route
     */
    public function addTuile(\AppBundle\Entity\Tuile $tuile)
    {
        $this->tuiles[] = $tuile;

        return $this;
    }

    /**
     * Remove tuile
     *
     * @param \AppBundle\Entity\Tuile $tuile
     */
    public function removeTuile(\AppBundle\Entity\Tuile $tuile)
    {
        $this->tuiles->removeElement($tuile);
    }

    /**
     * Get tuiles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTuiles()
    {
        return $this->tuiles;
    }

    /**
     * Add spot
     *
     * @param \AppBundle\Entity\Spot $spot
     *
     * @return Route
     */
    public function addSpot(\AppBundle\Entity\Spot $spot)
    {
        $this->spots[] = $spot;

        return $this;
    }

    /**
     * Remove spot
     *
     * @param \AppBundle\Entity\Spot $spot
     */
    public function removeSpot(\AppBundle\Entity\Spot $spot)
    {
        $this->spots->removeElement($spot);
    }

    /**
     * Get spots
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSpots()
    {
        return $this->spots;
    }
}
