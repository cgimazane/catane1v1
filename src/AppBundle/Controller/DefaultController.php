<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AppBundle\Entity\Plateau as Plateau;

class DefaultController extends Controller
{
	/**
	 * @Route("/", name="homepage")
	 * @Template
	 */
	public function indexAction()
	{
		$partieRepository = $this->getDoctrine()->getRepository('AppBundle:Partie');
		$parties = $partieRepository->findAll();
		
		$repartitionTuiles = $this->container->get('app.initiate')->test();
		
		$em = $this->getDoctrine()->getManager();
		
		$plateau = new Plateau();
		
		foreach ($repartitionTuiles as $tuile){
			$tuile->setPlateau($plateau);
			$em->persist($tuile);
		}

		$em->persist($plateau);

		$em->flush();

	return array( 'parties' => $parties );
	}
}
