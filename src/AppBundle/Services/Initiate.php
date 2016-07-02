<?php

namespace AppBundle\Services;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use AppBundle\Entity\Tuile as Tuile;
use AppBundle\Entity\Route as Route;

class Initiate {
	
	public function createPlateau(){
		
		$pathToData = realpath(__DIR__.'/../Resources/data/');
		
		//data to array
		//ports
		$repartitionPorts = $this->csvToArray($pathToData.'/ports.csv');
		$ports = $this->getAndShuffle($repartitionPorts);
		
		//spots
		$spots = $this->csvToArray($pathToData.'/spots.csv');
		
		//cases
		$cases = $this->csvToArray($pathToData.'/cases.csv');
		
		//palets
		$repartitionPalets = $this->csvToArray($pathToData.'/palets.csv');
		$palets = $this->getAndShuffle($repartitionPalets);
		
		//tuiles
		$repartitionTuiles = $this->csvToArray($pathToData.'/tuiles.csv');
		$tuiles = $this->getAndShuffle($repartitionTuiles);
						
		$compteurTuile = 0;
		$compteurPalet = 0;
		
		$tuilesResults = new ArrayCollection();
		$voisins = array();
		
		$tuilesAvecPort = array();
		
		foreach($cases as $case){
			//creation de la tuile
			$tuile = new Tuile();
			$tuile->setX($case['x']);
			$tuile->setY($case['y']);
			$tuile->setPlateauLocation($case['id']);
			
			//type de tuile
			if($case['eau']){
				$tuile->setType(Tuile::TYPE_EAU);
				$tuile->setPalet(null);
				$tuilesAvecPort[] = $case['id'];
			}else{
				$tuile->setType($tuiles[$compteurTuile]);
				if($tuiles[$compteurTuile] == Tuile::TYPE_DESERT){
					$tuile->setPalet(null);
				}else{
					$tuile->setPalet($palets[$compteurPalet]);
					$compteurPalet++;
				}
						
				$compteurTuile++;
			}
			$tuilesResults->set($case['id'],$tuile);
			
			//creation des routes
			$voisins[$case['id']] = explode(';',$case['voisins']);
		}
				
		//attention $plateau n'est pas un Plateau
		$plateau = new ArrayCollection();
		$plateau->set('tuiles',$tuilesResults);
		$plateau->set('voisins',$voisins);
		$plateau->set('spots',$spots);
		
		//selection des tuiles à ports
		
		shuffle($tuilesAvecPort);
		
		$resultPorts = array_combine(array_slice($tuilesAvecPort,0,sizeof($tuilesAvecPort)/2),$ports);
		
		foreach ($resultPorts as $key => $value){			
			$resultPorts[$key] = array('type' => $value,'quantité'=>2);;
		}
		
		$plateau->set('ports',$resultPorts);

	return $plateau;	

	}
	
	public function getCartesDev(){
		$pathToData = realpath(__DIR__.'/../Resources/data/');

		//cartes
		$repartitionCartes = $this->csvToArray($pathToData.'/cartes_dev.csv');
		$cartes = $this->getAndShuffle($repartitionCartes);
		
		return $cartes;
	}
	
	private function csvToArray($filepath){
		$csv = array_map("str_getcsv", file($filepath,FILE_SKIP_EMPTY_LINES));
		$keys = array_shift($csv);
		
		foreach ($csv as $i=>$row) {
			$csv[$i] = array_combine($keys, $row);
		}
		
		return($csv);
	}
	
	private function getAndShuffle($repartition){
		$objects = array();
		foreach( $repartition as $data){
			for ($i = 0 ; $i < $data['nb'] ; $i++){
				$objects[] = $data['valeur'];
			}
		}
		
		\shuffle($objects);
		
		return $objects;
	}
	
}
