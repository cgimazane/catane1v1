<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AppBundle\Entity\Partie as Partie;
use AppBundle\Entity\CarteDev as CarteDev;
use AppBundle\Entity\Plateau as Plateau;
use AppBundle\Form\PartieType as PartieType;

class DefaultController extends Controller
{
	/**
	 * @Route("/", name="catane_liste_parties")
	 * @Template
	 */
	public function indexAction()
	{
		$partieRepository = $this->getDoctrine()->getRepository('AppBundle:Partie');
		$parties = $partieRepository->findAll();

		return array( 'parties' => $parties );
	}
	
	/**
	 * @Route("/new", name="catane_nouvelle_partie")
	 * @Template
 	 */
	public function newAction(Request $request)
	{
		$partie = new Partie();
		$form = $this->createForm(PartieType::class, $partie);
		
		$form->handleRequest($request);
	
		if ($form->isSubmitted() && $form->isValid()) {
			
			$repartitionTuiles = $this->container->get('app.initiate')->createPlateau();
			$repartitionCartesDev = $this->container->get('app.initiate')->getCartesDev();
			
			$em = $this->getDoctrine()->getManager();
			
			$plateau = new Plateau();
			
			foreach ($repartitionTuiles as $tuile){
				$tuile->setPlateau($plateau);
				$em->persist($tuile);
			}
			
			$plateau->setPartie($partie);

			$em->persist($plateau);
			
			foreach ($repartitionCartesDev as $id => $carte){
				$carteDev = new CarteDev();
				$carteDev->setType($carte);
				$carteDev->setPosition($id);
				$carteDev->setPartie($partie);
				$em->persist($carteDev);
			}

			$partie->setFirstPlayerPlaying(true);
			
			$em->persist($partie);

			$em->flush();
			
			return $this->redirectToRoute('catane_liste_parties');
		}

		return array('form' => $form->createView());
	}
	
	/**
	 * @Route("/partie/{partie}", name="catane_partie")
	 * @Template
	 */
	public function playAction(Partie $partie){
		
		return array('partie' => $partie);
	}
}
