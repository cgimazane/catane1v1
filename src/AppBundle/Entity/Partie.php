<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="partie")
 */
class Partie
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="text", name="name", nullable=true)
     */
    protected $name;
     
    /**
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumn(name="joueur1_id", referencedColumnName="id")
     */
    protected $firstPlayer;

    /**
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumn(name="joueur2_id", referencedColumnName="id")
     */
    protected $secondPlayer;
    
    /**
     * @ORM\Column(type="boolean", name="turn")
     */
    protected $firstPlayerPlaying;
    
    /**
     * @ORM\OneToOne(targetEntity="Plateau", mappedBy="partie")
     */
    protected $plateau;
    
    public function getId(){
		return $this->id;
	}
    

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Partie
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set firstPlayerPlaying
     *
     * @param boolean $firstPlayerPlaying
     *
     * @return Partie
     */
    public function setFirstPlayerPlaying($firstPlayerPlaying)
    {
        $this->firstPlayerPlaying = $firstPlayerPlaying;

        return $this;
    }

    /**
     * Get firstPlayerPlaying
     *
     * @return boolean
     */
    public function getFirstPlayerPlaying()
    {
        return $this->firstPlayerPlaying;
    }

    /**
     * Set firstPlayer
     *
     * @param \AppBundle\Entity\Joueur $firstPlayer
     *
     * @return Partie
     */
    public function setFirstPlayer(\AppBundle\Entity\Joueur $firstPlayer = null)
    {
        $this->firstPlayer = $firstPlayer;

        return $this;
    }

    /**
     * Get firstPlayer
     *
     * @return \AppBundle\Entity\Joueur
     */
    public function getFirstPlayer()
    {
        return $this->firstPlayer;
    }

    /**
     * Set secondPlayer
     *
     * @param \AppBundle\Entity\Joueur $secondPlayer
     *
     * @return Partie
     */
    public function setSecondPlayer(\AppBundle\Entity\Joueur $secondPlayer = null)
    {
        $this->secondPlayer = $secondPlayer;

        return $this;
    }

    /**
     * Get secondPlayer
     *
     * @return \AppBundle\Entity\Joueur
     */
    public function getSecondPlayer()
    {
        return $this->secondPlayer;
    }

    /**
     * Set plateau
     *
     * @param \AppBundle\Entity\Plateau $plateau
     *
     * @return Partie
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
}
