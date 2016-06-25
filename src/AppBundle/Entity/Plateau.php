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
 	 * @ORM\OneToOne(targetEntity="Partie")
 	 * @ORM\JoinColumn(name="partie_id", referencedColumnName="id")
	 */
	protected $partie;
	
	/**
     * @ORM\OneToMany(targetEntity="Tuile", mappedBy="plateau")
     */
     protected $tuiles;
	
	 public function __construct() {
        $this->tuiles = new ArrayCollection();
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
}
