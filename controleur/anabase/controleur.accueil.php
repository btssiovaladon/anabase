<?php
/**
 * controleur.accueil
 *
 * @project	   anabase
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Thierry Bogusz <thbogusz@yahoo.fr>
*/

class Controleur_accueil extends Plum_Controleur{         
	
	public function __construct($param){
		parent::__construct($param);//obligatoire
	}

	//-----------------------------------------------------------------------------------*
	//---------- actions
	//-----------------------------------------------------------------------------------*
	function action_init(){
	
		$v = $this->useVue("accueil");
	}
	
	//Méthode exécutée sur fermeture d'une fonctionnalité
	function action_fermer(){
		
		$this->action_init();
	}
}
?>