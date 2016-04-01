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
		
		// Mod�le d'acc�s aux donn�es
		$this->modele = $this->useModele("organismePayeur");
	}

	//-----------------------------------------------------------------------------------*
	//..........  actions ... menus
	//-----------------------------------------------------------------------------------*
	
	function action_mnuAjouter(){
		//  D�claration de la vue � utiliser
		$v = $this->useVue("organismePayeurAjouter"); 
		
		//  Initialisation des champs de la vue
		$v->data->nomOrganisme = "";

		$v->data->adresseOrganisme = "";
	}
	
	function action_mnuLister(){
	
		$v = $this->useVue("organismePayeurListe");
		
		$v->data->listeOrganismePayeur=$this->modele->getListeOrganismePayeur();
			
	}

	//-----------------------------------------------------------------------------------*
	//..........  vue ... organismePayeurAjouter
	//-----------------------------------------------------------------------------------*	

	function action_onclickBoutonAjouter(){
	
		$v = $this->useVue("organismePayeurAjouter");

		//  Contr�les des champs du formulaire
		$ok = $this->controle($v); 
		
		if(!$ok){
			return;
		};

		$this->modele->putOrganismePayeur($v->data->nomOrganisme, $v->data->adresseOrganisme);

		$this->action_mnuAjouter(); //  Pour initialiser le formulaire
	
 	}
	
	//-----------------------------------------------------------------------------------*
	//..........  vue ... organismePayeurModifierSupprimer
	//-----------------------------------------------------------------------------------*	
	
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
		
		//  compter le nombre de congressiste d�pendant de l'organisme payeur
		$countC = $this->modele->getCompteurCongressisteDependantOrganismePayeur($numOrganisme);
		if($countC > 0){
			$v->message = "SUPPRESSION IMPOSSIBLE : des congressistes d�pendent de l'organisme payeur";
			return;
		};
		
		//  Suppression autoris�e		
		$this->modele->deleteOrganismePayeur($numOrganisme);
		
		$this->action_mnuLister();
	
 	}
	
	//-----------------------------------------------------------------------------------*
	//..........  vue ... organismePayeurListe
	//-----------------------------------------------------------------------------------*	

	public function action_onClickListe(){

		$v = $this->useVue("organismePayeurModifierSupprimer");

		//  M�moriser l'id de l'organisme choisi
		$this->persist->set("NUM_ORGANISME",$this->paramUrl->id);

		$data=$this->modele->getOrganismePayeurById($this->paramUrl->id);
		
		$v->data->nomOrganisme = $data["NOM_ORGANISME"];
		$v->data->adresseOrganisme = $data["ADRESSE_ORGANISME"];
		
	}
	
	//-----------------------------------------------------------------------------------*
	//..........  contr�les ... contr�ler les champs des formulaires 
	//								- Ajouter
	//								- Modifier
	//-----------------------------------------------------------------------------------*	
	private function controle(&$v){
		
		if(strlen($v->data->nomOrganisme)<3){
			$v->message="Saisir au moins trois caract�res";
			$v->focus="nomOrganisme";
			return false;
		}
		
		if(strlen($v->data->adresseOrganisme)<5){
			$v->message="Saisir au moins cinq caract�res";
			$v->focus="adresseOrganisme";
			return false;
		}
		
		return true;
	}

 }
?>