<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="reserve")
 */
class Reserve
{
	
	const STOCK_COLONIE = 5;
	const STOCK_VILLE = 4;
	const STOCK_ROUTE = 15;
	
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
 	 * @ORM\ManyToOne(targetEntity="Partie")
 	 * @ORM\JoinColumn(name="partie_id", referencedColumnName="id")
	 */
	protected $partie;
        
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
    
    /**
     * @ORM\Column(type="integer", name="stock_colo")
     */
    protected $stockColonie;
    
    /**
     * @ORM\Column(type="integer", name="stock_ville")
     */
    protected $stockVille;
    
    /**
     * @ORM\Column(type="integer", name="stock_route")
     */
    protected $stockRoute;
    
    /**
     * @ORM\Column(type="boolean", name="principal")
     */
    protected $principal;
    
    /**
     * @ORM\OneToMany(targetEntity="CarteDev", mappedBy="reserve")
     */
     protected $cartesDev;
    
    
    public function __construct(){
		$this->stockBois = 0;
		$this->stockArgile = 0;
		$this->stockMouton = 0;
		$this->stockPaille = 0;
		$this->stockCaillou = 0;
		$this->stockRoute = self::STOCK_ROUTE;
		$this->stockColonie = self::STOCK_COLONIE;
		$this->stockVille = self::STOCK_VILLE;
		
		$this->cartesDev = new \Doctrine\Common\Collections\ArrayCollection();
	}
    
    
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

    /**
     * Set principal
     *
     * @param boolean $principal
     *
     * @return Ressource
     */
    public function setPrincipal($principal)
    {
        $this->principal = $principal;

        return $this;
    }

    /**
     * Get principal
     *
     * @return boolean
     */
    public function getPrincipal()
    {
        return $this->principal;
    }

    /**
     * Set stockColonie
     *
     * @param integer $stockColonie
     *
     * @return Reserve
     */
    public function setStockColonie($stockColonie)
    {
        $this->stockColonie = $stockColonie;

        return $this;
    }

    /**
     * Get stockColonie
     *
     * @return integer
     */
    public function getStockColonie()
    {
        return $this->stockColonie;
    }

    /**
     * Set stockVille
     *
     * @param integer $stockVille
     *
     * @return Reserve
     */
    public function setStockVille($stockVille)
    {
        $this->stockVille = $stockVille;

        return $this;
    }

    /**
     * Get stockVille
     *
     * @return integer
     */
    public function getStockVille()
    {
        return $this->stockVille;
    }

    /**
     * Set stockRoute
     *
     * @param integer $stockRoute
     *
     * @return Reserve
     */
    public function setStockRoute($stockRoute)
    {
        $this->stockRoute = $stockRoute;

        return $this;
    }

    /**
     * Get stockRoute
     *
     * @return integer
     */
    public function getStockRoute()
    {
        return $this->stockRoute;
    }

    /**
     * Set partie
     *
     * @param \AppBundle\Entity\Partie $partie
     *
     * @return Reserve
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
     * Add cartesDev
     *
     * @param \AppBundle\Entity\CarteDev $cartesDev
     *
     * @return Reserve
     */
    public function addCartesDev(\AppBundle\Entity\CarteDev $cartesDev)
    {
        $this->cartesDev[] = $cartesDev;

        return $this;
    }

    /**
     * Remove cartesDev
     *
     * @param \AppBundle\Entity\CarteDev $cartesDev
     */
    public function removeCartesDev(\AppBundle\Entity\CarteDev $cartesDev)
    {
        $this->cartesDev->removeElement($cartesDev);
    }

    /**
     * Get cartesDev
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCartesDev()
    {
        return $this->cartesDev;
    }
    
    public function getPlayedCartesDev(){
		$playedCartesDev = new \Doctrine\Common\Collections\ArrayCollection();
		
		foreach($this->cartesDev as $carteDev){
			if ($carteDev->getPlayed()){
				$playedCartesDev->add($carteDev);
			}
		}
		
		return $playedCartesDev;
	}
	
	    public function getKeptCartesDev(){
		$keptCartesDev = new \Doctrine\Common\Collections\ArrayCollection();
		
		foreach($this->cartesDev as $carteDev){
			if (!$carteDev->getPlayed()){
				$keptCartesDev->add($carteDev);
			}
		}
		
		return $keptCartesDev;
	}
	
}
