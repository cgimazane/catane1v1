<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="spot")
 */
class Spot
{
		
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="decimal", scale=2, name="x")
     */
    protected $x;
    
    /**
     * @ORM\Column(type="decimal", scale=2, name="y")
     */
    protected $y; 
    
	
	/**
     * @ORM\ManyToOne(targetEntity="Plateau", inversedBy="spots")
     * @ORM\JoinColumn(name="plateau_id", referencedColumnName="id")
     */
    protected $plateau;
    
    /**
     * @ORM\Column(type="text", name="plateau_location", nullable=true)
     */
    protected $plateauLocation;
    
    /**
     * @ORM\Column(type="text", name="port_type", nullable=true)
     */
    protected $portType; 
      
    /**
     * @ORM\ManyToMany(targetEntity="Tuile", mappedBy="spots")
     */
    protected $tuiles;
    
    /**
     * @ORM\ManyToMany(targetEntity="Route", mappedBy="spots")
     */
    protected $routes;
      
    public function __construct() {
        $this->tuiles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->routes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set x
     *
     * @param string $x
     *
     * @return Spot
     */
    public function setX($x)
    {
        $this->x = $x;

        return $this;
    }

    /**
     * Get x
     *
     * @return string
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Set y
     *
     * @param string $y
     *
     * @return Spot
     */
    public function setY($y)
    {
        $this->y = $y;

        return $this;
    }

    /**
     * Get y
     *
     * @return string
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * Set plateauLocation
     *
     * @param string $plateauLocation
     *
     * @return Spot
     */
    public function setPlateauLocation($plateauLocation)
    {
        $this->plateauLocation = $plateauLocation;

        return $this;
    }

    /**
     * Get plateauLocation
     *
     * @return string
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
     * @return Spot
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
     * @return Spot
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
     * Add route
     *
     * @param \AppBundle\Entity\Route $route
     *
     * @return Spot
     */
    public function addRoute(\AppBundle\Entity\Route $route)
    {
        $this->routes[] = $route;

        return $this;
    }

    /**
     * Remove route
     *
     * @param \AppBundle\Entity\Route $route
     */
    public function removeRoute(\AppBundle\Entity\Route $route)
    {
        $this->routes->removeElement($route);
    }

    /**
     * Get routes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * Set portType
     *
     * @param string $portType
     *
     * @return Spot
     */
    public function setPortType($portType)
    {
        $this->portType = $portType;

        return $this;
    }

    /**
     * Get portType
     *
     * @return string
     */
    public function getPortType()
    {
        return $this->portType;
    }
}
