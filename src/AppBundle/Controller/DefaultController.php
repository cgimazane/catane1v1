<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use AppBundle\Entity\Tuile as Tuile;
use AppBundle\Entity\Spot as Spot;
use AppBundle\Entity\Route as RouteConstruction;
use AppBundle\Entity\Reserve as Reserve;
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
		$em = $this->getDoctrine()->getManager();
		
		$joueurs = $this->getDoctrine()->getRepository('AppBundle:Joueur')->findAll();
		
		$form->handleRequest($request);
	
		if ($form->isSubmitted() && $form->isValid()) {
			
			$repartitionPlateau = $this->container->get('app.initiate')->createPlateau();
			$repartitionCartesDev = $this->container->get('app.initiate')->getCartesDev();
			
			//creation du plateau
			$plateau = new Plateau();
			
			//association des tuiles au plateau
			foreach ($repartitionPlateau->get('tuiles') as $tuile){
				$tuile->setPlateau($plateau);
				$em->persist($tuile);
			}
			
			$em->flush();
			
			$tuileRepository = $this->getDoctrine()->getRepository('AppBundle:Tuile');
			
			//creation des routes
			foreach ($repartitionPlateau->get('voisins') as $id => $voisins){
			
				foreach ($voisins as $voisin){
				
					$route = new RouteConstruction();
					
					$tuileA = $tuileRepository->findOneBy(array('plateauLocation' => $id, 'plateau' => $plateau));
					$tuileB = $tuileRepository->findOneBy(array('plateauLocation' => $voisin, 'plateau' => $plateau));
					
					if ($tuileA->getPlateauLocation() < $tuileB->getPlateauLocation()){
						$location = $tuileA->getPlateauLocation().'-'.$tuileB->getPlateauLocation();
					}else{
						$location = $tuileB->getPlateauLocation().'-'.$tuileA->getPlateauLocation();
					}
					
					$route->addTuile($tuileA);
					$route->addTuile($tuileB);
					
					$tuileA->addRoute($route);
					$tuileB->addRoute($route);
					
					$route->setX1( $tuileA->getX() + $tuileB->getX()/2 - $tuileA->getX()/2 + $tuileA->getY()/4 - $tuileB->getY()/4 );
					$route->setY1( $tuileA->getY() + $tuileB->getY()/2 - $tuileA->getY()/2 - $tuileA->getX()/4 + $tuileB->getX()/4 );
					$route->setX2( $tuileA->getX() + $tuileB->getX()/2 - $tuileA->getX()/2 - $tuileA->getY()/4 + $tuileB->getY()/4 );
					$route->setY2( $tuileA->getY() + $tuileB->getY()/2 - $tuileA->getY()/2 + $tuileA->getX()/4 - $tuileB->getX()/4 );
					$route->setPlateauLocation( $location );
					$route->setPlateau( $plateau );
					
					$em->persist($route);	
					$em->persist($tuileA);	
					$em->persist($tuileB);	
				}
				
			}
			$em->flush();
			$routeRepository = $this->getDoctrine()->getRepository('AppBundle:Route');
			
			//creation spot
			foreach ($repartitionPlateau->get('spots') as $spotData){
				$spot = new Spot();
				
				$tuileX = $tuileRepository->findOneBy(array('plateauLocation' => $spotData['x'], 'plateau' => $plateau));
				$tuileY = $tuileRepository->findOneBy(array('plateauLocation' => $spotData['y'], 'plateau' => $plateau));
				$tuileZ = $tuileRepository->findOneBy(array('plateauLocation' => $spotData['z'], 'plateau' => $plateau));
				
				//lien a tuile
				$spot->addTuile($tuileX);
				$spot->addTuile($tuileY);
				$spot->addTuile($tuileZ);
				
				$tuileX->addSpot($spot);
				$tuileY->addSpot($spot);
				$tuileZ->addSpot($spot);
				
				//coordonnées
				$spot->setX(($tuileX->getX() + $tuileY->getX() + $tuileZ->getX())/3);
				$spot->setY(($tuileX->getY() + $tuileY->getY() + $tuileZ->getY())/3);
				
				$spot->setPlateau($plateau);

				$em->persist($spot);
				
				$em->persist($tuileX);	
				$em->persist($tuileY);
				$em->persist($tuileZ);
				
				//lien a routes
				$routeLocations = array();
				if (! is_null($this->getRouteLocation($tuileX,$tuileY))){
					$routeLocations[] = $this->getRouteLocation($tuileX,$tuileY);
				}
				if (! is_null($this->getRouteLocation($tuileZ,$tuileY))){
					$routeLocations[] = $this->getRouteLocation($tuileZ,$tuileY);
				}
				if (! is_null($this->getRouteLocation($tuileX,$tuileZ))){
					$routeLocations[] = $this->getRouteLocation($tuileX,$tuileZ);
				}
				
				foreach ($routeLocations as $routeLocation){
					$route = $routeRepository->findOneBy(array('plateauLocation' => $routeLocation, 'plateau' => $plateau));
					$spot->addRoute($route);
					$route->addSpot($spot);
					$em->persist($route);
					$em->persist($spot);
				}
				
			}
			
			$plateau->setPartie($partie);

			$em->persist($plateau);
			
			//creation cartesDev
			foreach ($repartitionCartesDev as $id => $carte){
				$carteDev = new CarteDev();
				$carteDev->setType($carte);
				$carteDev->setPosition($id);
				$carteDev->setPartie($partie);
				$em->persist($carteDev);
			}
			
			//qui commence ?
			$aleatoire = rand(0,1) == 1;

			$partie->setFirstPlayerPlaying($aleatoire);
			
			//creation joueurs
			
			$otherPlayer = $this->getDoctrine()->getRepository('AppBundle:Joueur')->find($form->get('secondPlayerId')->getData());
			
			$partie->setFirstPlayer($this->getUser());
			$partie->setSecondPlayer($otherPlayer);
			
			foreach ( array($this->getUser(),$otherPlayer) as $player){
				$reserveStrong = new Reserve();
				$reserveStrong->setPrincipal(true);
				$reserveStrong->setPartie($partie);
				$reserveStrong->setJoueur($player);
				
				$reserveWeak = new Reserve();
				$reserveWeak->setPrincipal(false);
				$reserveWeak->setPartie($partie);
				$reserveWeak->setJoueur($player);
				
				$em->persist($reserveStrong);
				$em->persist($reserveWeak);
				
			}
			
			
			$em->persist($partie);

			$em->flush();
			
			return $this->redirectToRoute('catane_liste_parties');
		}

		return array('form' => $form->createView(),
					'joueurs' => $joueurs);
	}
	
	private function getRouteLocation(Tuile $tuileA, Tuile $tuileB){
		
		if ($tuileA->getType() == Tuile::TYPE_EAU && $tuileB->getType() == Tuile::TYPE_EAU){
			$location = null;
		}else{
			if ($tuileA->getPlateauLocation() < $tuileB->getPlateauLocation()){
				$location = $tuileA->getPlateauLocation().'-'.$tuileB->getPlateauLocation();
			}else{
				$location = $tuileB->getPlateauLocation().'-'.$tuileA->getPlateauLocation();
			}
			
		}
		return $location;
	}
}
