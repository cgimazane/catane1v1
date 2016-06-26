<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="partie")
 */
class Partie
{
	const STOCK_MAX = 19;
	
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
     * @ORM\Column(type="integer", name="next_carte_dev")
     */
    protected $nextCarteDev;
    
    
    public function __construct(){
		$this->stockBois = self::STOCK_MAX;
		$this->stockArgile = self::STOCK_MAX;
		$this->stockMouton = self::STOCK_MAX;
		$this->stockPaille = self::STOCK_MAX;
		$this->stockCaillou = self::STOCK_MAX;
		
		$this->nextCarteDev = 0;
	}
    
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
     * Set nextCarteDev
     *
     * @param integer $nextCarteDev
     *
     * @return Partie
     */
    public function setNextCarteDev($nextCarteDev)
    {
        $this->nextCarteDev = $nextCarteDev;

        return $this;
    }

    /**
     * Get nextCarteDev
     *
     * @return integer
     */
    public function getNextCarteDev()
    {
        return $this->nextCarteDev;
    }
}
