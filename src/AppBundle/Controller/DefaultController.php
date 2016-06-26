<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AppBundle\Entity\Partie as Partie;
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
			
			$repartitionTuiles = $this->container->get('app.initiate')->test();
			
			$em = $this->getDoctrine()->getManager();
			
			$plateau = new Plateau();
			
			foreach ($repartitionTuiles as $tuile){
				$tuile->setPlateau($plateau);
				$em->persist($tuile);
			}
			
			$plateau->setPartie($partie);

			$em->persist($plateau);

			$partie->setFirstPlayerPlaying(true);
			
			$em->persist($partie);

			$em->flush();
			
			return $this->redirectToRoute('catane_liste_parties');
		}

		return array('form' => $form->createView());
	}
}
