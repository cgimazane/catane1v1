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
     * @ORM\Column(type="integer", name="palet")
     */
	protected $palet;
	
	/**
     * @ORM\ManyToOne(targetEntity="Partie")
     * @ORM\JoinColumn(name="partie_id", referencedColumnName="id")
     */
    protected $partie;
      
}
