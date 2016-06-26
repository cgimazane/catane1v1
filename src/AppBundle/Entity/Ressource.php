<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="ressource")
 */
class Ressource
{
	
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
     
    /**
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumn(name="joueur_id", referencedColumnName="id")
     */
    protected $joueur;
        
    /**
     * @ORM\Column(type="integer", name="stock_bois")
     */
    protected $stockBois;
    
    /**
     * @ORM\Column(type="integer", name="stock_argile")
     */
    protected $stockArgile;
    
    /**
     * @ORM\Column(type="integer", name="stock_mouton")
     */
    protected $stockMouton;
    
    /**
     * @ORM\Column(type="integer", name="stock_paille")
     */
    protected $stockPaille;
    
    /**
     * @ORM\Column(type="integer", name="stock_caillou")
     */
    protected $stockCaillou;
    
    
    public function getId(){
		return $this->id;
	}
   
    /**
     * Set Joueur
     *
     * @param \AppBundle\Entity\Joueur $joueur
     *
     * @return Ressource
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

    /**
     * Set stockBois
     *
     * @param integer $stockBois
     *
     * @return Partie
     */
    public function setStockBois($stockBois)
    {
        $this->stockBois = $stockBois;

        return $this;
    }

    /**
     * Get stockBois
     *
     * @return integer
     */
    public function getStockBois()
    {
        return $this->stockBois;
    }

    /**
     * Set stockArgile
     *
     * @param integer $stockArgile
     *
     * @return Partie
     */
    public function setStockArgile($stockArgile)
    {
        $this->stockArgile = $stockArgile;

        return $this;
    }

    /**
     * Get stockArgile
     *
     * @return integer
     */
    public function getStockArgile()
    {
        return $this->stockArgile;
    }

    /**
     * Set stockMouton
     *
     * @param integer $stockMouton
     *
     * @return Partie
     */
    public function setStockMouton($stockMouton)
    {
        $this->stockMouton = $stockMouton;

        return $this;
    }

    /**
     * Get stockMouton
     *
     * @return integer
     */
    public function getStockMouton()
    {
        return $this->stockMouton;
    }

    /**
     * Set stockPaille
     *
     * @param integer $stockPaille
     *
     * @return Partie
     */
    public function setStockPaille($stockPaille)
    {
        $this->stockPaille = $stockPaille;

        return $this;
    }

    /**
     * Get stockPaille
     *
     * @return integer
     */
    public function getStockPaille()
    {
        return $this->stockPaille;
    }

    /**
     * Set stockCaillou
     *
     * @param integer $stockCaillou
     *
     * @return Partie
     */
    public function setStockCaillou($stockCaillou)
    {
        $this->stockCaillou = $stockCaillou;

        return $this;
    }

    /**
     * Get stockCaillou
     *
     * @return integer
     */
    public function getStockCaillou()
    {
        return $this->stockCaillou;
    }
}
