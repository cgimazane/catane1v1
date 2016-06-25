<?php

namespace AppBundle\Services;

use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;
use AppBundle\Entity\Tuile as Tuile;

class Initiate {
	
	public function test(){
		
		$pathToData = realpath(__DIR__.'/../Resources/data/');
		
		//data to array
		//cases
		$cases = $this->csvToArray($pathToData.'/cases.csv');
		
		//palets
		$repartitionPalets = $this->csvToArray($pathToData.'/palets.csv');
		$palets = $this->getAndShuffle($repartitionPalets);
		
		//tuiles
		$repartitionTuiles = $this->csvToArray($pathToData.'/tuiles.csv');
		$tuiles = $this->getAndShuffle($repartitionTuiles);
				
		//attention $plateau n'est pas un Plateau
		$plateau = new ArrayCollection();
		
		$compteurTuile = 0;
		$compteurPalet = 0;
		
		foreach($cases as $case){
			
			$tuile = new Tuile();
			$tuile->setX($case['x']);
			$tuile->setY($case['y']);
			
			if($case['eau']){
				$tuile->setType(Tuile::TYPE_EAU);
				$tuile->setPalet(null);
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
			$plateau->add($tuile);
		}

	return $plateau;	

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
