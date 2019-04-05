<?php
/**
 * controleur.organismePayeur
 *
 * @project	   anabase
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Thierry Bogusz <thbogusz@yahoo.fr>
*/

class Controleur_organismePayeur extends Plum_Controleur{         

	private $modele; // Plum_Modele
	
	public function __construct($param){
		//Obligatoire : Appel du constructeur de Plum_Controleur
		parent::__construct($param);  
		
		// Modèle d'accès aux données
		$this->modele = $this->useModele("organismePayeur");
	}

	// ----------------------------------------------------------------------------------*
	// ..........  menus ...													      ---*
	// ----------------------------------------------------------------------------------*	 
	
	function action_mnuAjouter(){
		//  Déclaration de la vue à utiliser
		$v = $this->useVue("organismePayeurAjouter"); 
		
		//  Initialisation des champs de la vue
		$v->data->nomOrganisme = "";
		$v->data->adresseOrganisme = "";
	}
	
	function action_mnuLister(){
	
		$v = $this->useVue("organismePayeurListe");
		
		$v->data->listeOrganismePayeur=$this->modele->getListeOrganismePayeur();
			
	}

	// ----------------------------------------------------------------------------------*
	// ..........  vue ... organismePayeurAjouter								      ---*
	// ----------------------------------------------------------------------------------*

	function action_onclickBoutonAjouter(){
	
		$v = $this->useVue("organismePayeurAjouter");

		//  Contrôles des champs du formulaire
		$ok = $this->controle($v); 
		
		if(!$ok){
			return;
		};

		$this->modele->putOrganismePayeur($v->data->nomOrganisme, $v->data->adresseOrganisme);

		//  Pour initialiser le formulaire
		$this->action_mnuAjouter(); 
	
 	}
	
	// ----------------------------------------------------------------------------------*
	// ..........  vue ... organismePayeurListe			                           	  ---*
	// ----------------------------------------------------------------------------------*

	public function action_onClickListe(){

		$v = $this->useVue("organismePayeurModifierSupprimer");

		//  Mémoriser l'id de l'organisme choisi
		$this->persist->set("NUM_ORGANISME",$this->paramUrl->id);

		$data=$this->modele->getOrganismePayeurById($this->paramUrl->id);
		
		//  Tansmettre les données à la vue
		$v->data->nomOrganisme = $data["NOM_ORGANISME"];
		$v->data->adresseOrganisme = $data["ADRESSE_ORGANISME"];
		
	}
	
	// ----------------------------------------------------------------------------------*
	// ..........  vue ... organismePayeurModifierSupprimer	                          ---*
	// ----------------------------------------------------------------------------------*
	
	function action_onClickBoutonModifier(){
	
		$v = $this->useVue("organismePayeurModifierSupprimer");
		
		$numOrganisme = $this->persist->get("NUM_ORGANISME");
		
		if($this->controle($v)==false){
			return;
		};
		
		$this->modele->updateOrganismePayeur($numOrganisme,
												$v->data->nomOrganisme, 
												$v->data->adresseOrganisme);
			
	}
	
	function action_onClickBoutonSupprimer(){
		$v = $this->useVue("organismePayeurModifierSupprimer");
		
		$numOrganisme = $this->persist->get("NUM_ORGANISME");
		
		//  compter le nombre de congressistes dépendant de l'organisme payeur
		$countC = $this->modele->getCompteurCongressisteDependantOrganismePayeur($numOrganisme);
		if($countC > 0){
			$v->message = "SUPPRESSION IMPOSSIBLE : des congressistes dépendent de l'organisme payeur";
			return;
		};
		
		//  Suppression autorisée		
		$this->modele->deleteOrganismePayeur($numOrganisme);
		
		$this->action_mnuLister();
	
 	}
	
	// ----------------------------------------------------------------------------------*
	// ..........  contrôles ... 							                          ---*
	// contrôler les champs des formulaires 				                          ---*
	//								- Ajouter				                          ---*
	//								- Modifier				                          ---*
	// ----------------------------------------------------------------------------------*
	private function controle(&$v){
		
		if(strlen($v->data->nomOrganisme)<3){
			$v->message="Saisir au moins trois caractères";
			$v->focus="nomOrganisme";
			return false;
		}
		
		if(strlen($v->data->adresseOrganisme)<5){
			$v->message="Saisir au moins cinq caractères";
			$v->focus="adresseOrganisme";
			return false;
		}
		
		return true;
	}

 }
?>