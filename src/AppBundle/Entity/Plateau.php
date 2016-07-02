<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="plateau")
 */
class Plateau
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
 	 * @ORM\OneToOne(targetEntity="Partie", inversedBy="plateau")
 	 * @ORM\JoinColumn(name="partie_id", referencedColumnName="id")
	 */
	protected $partie;
	
	/**
     * @ORM\OneToMany(targetEntity="Tuile", mappedBy="plateau")
     */
     protected $tuiles;
     
    /**
     * @ORM\OneToMany(targetEntity="Route", mappedBy="plateau")
     */
     protected $routes;
     
    /**
     * @ORM\OneToMany(targetEntity="Spot", mappedBy="plateau")
     */
     protected $spots;
	
	 public function __construct() {
        $this->tuiles = new ArrayCollection();
        $this->routes = new ArrayCollection();
        $this->spots = new ArrayCollection();
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
     * Set partie
     *
     * @param \AppBundle\Entity\Partie $partie
     *
     * @return Plateau
     */
    public function setPartie(\AppBundle\Entity\Partie $partie = null)
    {
        $this->partie = $partie;

        return $this;
    }

    /**
     * Get partie
     *
     * @return \AppBundle\Entity\Partie
     */
    public function getPartie()
    {
        return $this->partie;
    }

    /**
     * Add tuile
     *
     * @param \AppBundle\Entity\Tuile $tuile
     *
     * @return Plateau
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
     * @return Plateau
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
     * @return Plateau
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
