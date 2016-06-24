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
    
    public function getId(){
		return $this->id;
	}
    
}
