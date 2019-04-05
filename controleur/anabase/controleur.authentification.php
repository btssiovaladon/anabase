<?php
/**
 * Controleur Autentification
 *
 * @project	   plum.mvc
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Thierry Bogusz <thbogusz@yahoo.fr>
*/

class Controleur_authentification extends Plum_Controleur{         
	
	public function __construct($param){
		parent::__construct($param);//obligatoire

	}

	//-----------------------------------------------------------------------------------*
	//---------- définir les actions
	//-----------------------------------------------------------------------------------*
	
	function action_init(){
		$v=$this->useVue("authentification");
		
		$v->data->password="";
		$v->data->user="";
		
		$v->focus="user";
	}
	
	function action_connecter(){
		$v=$this->useVue("authentification");
		
		$user=$v->data->user;
		$password=$v->data->password;
		
		$this->connect($user,$password);
		
		if($this->secure===false){
			$v->message="DESOLE MAIS LA CONNEXION A ECHOUEE";
		
			$v->data->password="";
			$v->data->user="";
			
			$v->focus="user";
			return;
		}
		
		$v->data->password=""; //ne pas se souvenir de l'identifiant
		$v->data->user="";
		
		//return indispensable pour remplacer le contrôleur instancié par index
		return $this->execute("accueil","init"); 
		
	}

	function action_deconnecter()
	{
		$this->deconnect();
		
		$this->action_init();
	}
}

?>