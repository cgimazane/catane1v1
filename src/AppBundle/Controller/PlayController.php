<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AppBundle\Entity\Partie as Partie;

/**
 * @Route("/play")
 */
class PlayController extends Controller
{
		
	/**
	 * @Route("/{partie}", name="catane_partie")
	 * @Template
	 */
	public function playAction(Partie $partie){
		
		$carteDevRepository = $this->getDoctrine()->getRepository('AppBundle:CarteDev');
		$carteDev = $carteDevRepository->findOneBy(array('partie' => $partie, 'position' => $partie->getNextCarteDev()));
		
		$reserveRepository = $this->getDoctrine()->getRepository('AppBundle:Reserve');
		
		$reserveStrong = $reserveRepository->findOneBy(array('partie' => $partie, 'joueur' => $this->getUser(),'principal' => true));

		$reserves = array(
			'strong' => $reserveStrong,
			'weak' => $reserveRepository->findOneBy(array('partie' => $partie, 'joueur' => $this->getUser(),'principal' => false))
							);
							
		$reservesAdversaire = array(
			'strong' => $reserveRepository->findOneBy(array('partie' => $partie, 'joueur' => $partie->getOtherPlayer($this->getUser()),'principal' => true)),
			'weak' => $reserveRepository->findOneBy(array('partie' => $partie, 'joueur' => $partie->getOtherPlayer($this->getUser()),'principal' => false))
							);
		
		return array('partie' => $partie,
						'carteDev' => $carteDev,
						'reserves' => $reserves,
						'reservesAdversaire' => $reservesAdversaire);
	}
}
