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
 	 * @ORM\OneToOne(targetEntity="Palet", cascade={"persist"})
	 */
	protected $palet;
	
      
}
