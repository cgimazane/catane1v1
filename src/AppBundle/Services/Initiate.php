<?php

namespace AppBundle\Services;

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
		

		
		print_r($tuiles);

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
