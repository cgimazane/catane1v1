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
     * @ORM\JoinColumn(name="partie_id", referencedColumnName="id")
     */
    protected $partie;
    
    /**
     * @ORM\ManyToOne(targetEntity="Reserve", inversedBy="cartesDev")
     * @ORM\JoinColumn(name="reserve_id", referencedColumnName="id")
     */
    protected $reserve;
    
    /**
     * @ORM\Column(type="boolean", name="played", nullable=true)
     */
    protected $played = false;
    
    /**
     * @ORM\Column(type="integer", name="position", nullable=true)
     */
	protected $position;
	
	/**
     * @ORM\Column(type="text", name="type")
     */
    protected $type;

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

    /**
     * Set type
     *
     * @param string $type
     *
     * @return CarteDev
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
     * Set played
     *
     * @param boolean $played
     *
     * @return CarteDev
     */
    public function setPlayed($played)
    {
        $this->played = $played;

        return $this;
    }

    /**
     * Get played
     *
     * @return boolean
     */
    public function getPlayed()
    {
        return $this->played;
    }

    /**
     * Set reserve
     *
     * @param \AppBundle\Entity\Reserve $reserve
     *
     * @return CarteDev
     */
    public function setReserve(\AppBundle\Entity\Reserve $reserve = null)
    {
        $this->reserve = $reserve;

        return $this;
    }

    /**
     * Get reserve
     *
     * @return \AppBundle\Entity\Reserve
     */
    public function getReserve()
    {
        return $this->reserve;
    }
}
