<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="case")
 */
class CasePlateau
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="integer", name="x")
     */
    protected $x;
    
    /**
     * @ORM\Column(type="integer", name="y")
     */
    protected $y;    
}
