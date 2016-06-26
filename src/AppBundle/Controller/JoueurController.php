<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AppBundle\Entity\Joueur as Joueur;
use AppBundle\Form\JoueurType as JoueurType;

/**
 * @Route("/joueur")
 */
class JoueurController extends Controller
{
	/**
	 * @Route("/", name="catane_liste_joueurs")
	 * @Template
	 */
	public function indexAction()
	{
		$joueurRepository = $this->getDoctrine()->getRepository('AppBundle:Joueur');
		$joueurs = $joueurRepository->findAll();

		return array( 'joueurs' => $joueurs );
	}
}
