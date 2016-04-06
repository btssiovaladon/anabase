<?php
/**
 * modele.anabase
 *
 * @project	   anabase
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Thierry Bogusz <thbogusz@yahoo.fr>
*/	

//::::contrôle vérifiant le passage par le super-contrôleur::::

if(!defined('PLUM_RACINE')) exit(0);

class Modele_organismePayeur extends Plum_modele{

	public function __construct(){
		//   Obligatoire
		parent::__construct();
		
		//  Connection à la base de données
		$this->connectDb();
	}

	//............... GET .................................
	
	/**
	*	liste des organisme_payeur
	*
	* @param aucun
	*
    * @return array		liste des organismes			
	*/	
	public function getListeOrganismePayeur(){
		$sql="select * from organisme_payeur order by nom_organisme" ;
		$sth = $this->database->prepare($sql);
		
		$this->execute($sth);
		
		return $sth->fetchAll();
	}
	
	/**
	*	retourne les infos sur un organisme payeur
	*
	* @param integer	$numOrganisme	identifiant de l'organisme
	*
    * @return array		une ligne de la table organisme_payeur			
	*/	
	public function getOrganismePayeurById($numOrganisme){
		$sql = "select * from organisme_payeur where num_organisme=?" ;
		$sth = $this->database->prepare($sql);
		
		$param = array($numOrganisme);
		$this->execute($sth,$param);
		
		return $sth->fetchAll()[0];
	}
	
	public function getCompteurCongressisteDependantOrganismePayeur($numOrganisme){
		$sql = "select count(*) as nbCongressiste from congressiste where num_organisme=?" ;
		$sth = $this->database->prepare($sql);
		
		$param = array($numOrganisme);
		$this->execute($sth,$param);
		
		return $sth->fetchAll()[0]['nbCongressiste'];
		
	}
	//............... PUT .................................

	/**
	*	insert organisme_payeur
	*
	* @param string 	$nom		nom de l'organisme
    * @param string		$adresse 	adresse de l'organisme
	*
    * @return	void			
	*/	
	public function putOrganismePayeur($nom, $adresse){
		$sql = "insert into organisme_payeur values('',?,?)";
		$sth = $this->database->prepare($sql);
		
		$param = array($nom,$adresse);
		$this->execute($sth,$param);
	}

	//............... UPDATE .................................
	
	public function updateOrganismePayeur($numOrganisme, $nom, $adresse){
		$sql = "update organisme_payeur set nom_organisme = ?, adresse_organisme = ?
					where num_organisme = ?";
		$sth = $this->database->prepare($sql);
		
		$param = array($nom,$adresse,$numOrganisme);
		$this->execute($sth,$param);			
	}
	
	//............... DELETE .................................
	
	public function deleteOrganismePayeur($numOrganisme){
		$sql="delete from organisme_payeur WHERE num_organisme = ?";
		$sth = $this->database->prepare($sql);
		
		$param=array($numOrganisme);
		$this->execute($sth,$param);
	}
	
	
//<!-- - - - - - - - - - - - -  PRIVATE - - - - - - - - - - - -->

	/**
	*	EXECUTE une requête SQL
	*	- Execute la requête avec PDO
	*   - die : affiche les erreurs d'exécution et le nom de la fonction appelante
	*
	* @param PDOStattement 	$sth	ressource requête sql. E/S.
    * @param array			$param 	tableau des paramètres de la requête
	*
    * @return	void			
	*/	
	private function execute(&$sth,$param=array()){
		$t=$sth->execute($param);
		
		if(!$t) {
			print("<br>Erreur PDO::execute<br>");
			print_r($sth->errorInfo());
			
			print_r("<br>");
			$tracedegug=debug_backtrace();
			die("ERREUR FATALE : ".$tracedegug[1]["function"]);
		}
	}	
}

?>