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
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumn(name="joueur_id", referencedColumnName="id")
     */
    protected $joueur;
    
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
     * Set joueur
     *
     * @param \AppBundle\Entity\Joueur $joueur
     *
     * @return CarteDev
     */
    public function setJoueur(\AppBundle\Entity\Joueur $joueur = null)
    {
        $this->joueur = $joueur;

        return $this;
    }

    /**
     * Get joueur
     *
     * @return \AppBundle\Entity\Joueur
     */
    public function getJoueur()
    {
        return $this->joueur;
    }
}
