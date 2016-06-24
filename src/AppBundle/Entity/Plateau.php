<?php

namespace AppBundle\Entity;


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
 	 * @ORM\OneToOne(targetEntity="Partie", cascade={"persist"})
	 */
	protected $partie;
	
	
}
