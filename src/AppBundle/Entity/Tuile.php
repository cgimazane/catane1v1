<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tuile")
 */
class Tuile
{
	const TYPE_DESERT = 'desert';
	const TYPE_ARGILE = 'argile';
	const TYPE_BOIS = 'bois';
	const TYPE_PAILLE = 'paille';
	const TYPE_MOUTON = 'mouton';
	const TYPE_CAILLOU = 'caillou';
	const TYPE_EAU = 'eau';
	
	
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="text", name="type")
     */
    protected $type;
    
    /**
     * @ORM\Column(type="integer", name="x")
     */
    protected $x;
    
    /**
     * @ORM\Column(type="integer", name="y")
     */
    protected $y;   
    
    /**
     * @ORM\Column(type="integer", name="palet", nullable=true)
     */
	protected $palet;
	
	/**
     * @ORM\ManyToOne(targetEntity="Plateau", inversedBy="tuiles", cascade={"persist"})
     * @ORM\JoinColumn(name="plateau_id", referencedColumnName="id")
     */
    protected $plateau;
    
    /**
     * @ORM\Column(type="integer", name="plateau_location")
     */
    protected $plateauLocation;  
    
    /**
     * @ORM\ManyToMany(targetEntity="Route", inversedBy="tuiles")
     * @ORM\JoinTable(name="tuiles_routes")
     */
    protected $routes;
    
    /**
     * @ORM\ManyToMany(targetEntity="Spot", inversedBy="tuiles")
     * @ORM\JoinTable(name="spots_tuiles")
     */
    protected $spots;
      
    public function __construct() {
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
     * Set type
     *
     * @param string $type
     *
     * @return Tuile
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set x
     *
     * @param integer $x
     *
     * @return Tuile
     */
    public function setX($x)
    {
        $this->x = $x;

        return $this;
    }

    /**
     * Get x
     *
     * @return integer
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Set y
     *
     * @param integer $y
     *
     * @return Tuile
     */
    public function setY($y)
    {
        $this->y = $y;

        return $this;
    }

    /**
     * Get y
     *
     * @return integer
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * Set palet
     *
     * @param integer $palet
     *
     * @return Tuile
     */
    public function setPalet($palet)
    {
        $this->palet = $palet;

        return $this;
    }

    /**
     * Get palet
     *
     * @return integer
     */
    public function getPalet()
    {
        return $this->palet;
    }

    /**
     * Set plateau
     *
     * @param \AppBundle\Entity\Plateau $plateau
     *
     * @return Tuile
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
     * Set plateauId
     *
     * @param integer $plateauId
     *
     * @return Tuile
     */
    public function setPlateauId($plateauId)
    {
        $this->plateauId = $plateauId;

        return $this;
    }

    /**
     * Get plateauId
     *
     * @return integer
     */
    public function getPlateauId()
    {
        return $this->plateauId;
    }

    /**
     * Set plateauLocation
     *
     * @param integer $plateauLocation
     *
     * @return Tuile
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
     * Add route
     *
     * @param \AppBundle\Entity\Route $route
     *
     * @return Tuile
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
     * Add spot
     *
     * @param \AppBundle\Entity\Spot $spot
     *
     * @return Tuile
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
