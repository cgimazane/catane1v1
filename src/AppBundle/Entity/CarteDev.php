<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="carte_dev")
 */
class CarteDev {
	
	const TYPE_CHEVALIER = 'chevalier';
	const TYPE_PV = 'pv';
	const TYPE_ROUTE = '2 routes';
	const TYPE_RESOURCE = '2 ressources';
	const TYPE_MONOPOLE = 'monopole';
	
	
	/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Partie")
     * @ORM\JoinColumn(name="ppartie_id", referencedColumnName="id")
     */
    protected $partie;
    
    /**
     * @ORM\Column(type="integer", name="position", nullable=true)
     */
	protected $position;

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
     * Set position
     *
     * @param integer $position
     *
     * @return CarteDev
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set partie
     *
     * @param \AppBundle\Entity\Partie $partie
     *
     * @return CarteDev
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
}
