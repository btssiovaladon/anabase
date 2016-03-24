<?php
/**
 * modele.exemple[modele]
 *
 * @project	   plum.mvc
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Thierry Bogusz <thbogusz@yahoo.fr>
*/	

//::::contrôle vérifiant le passage par le super-contrôleur::::

if(!defined('PLUM_RACINE')) exit(0);

class Modele_exemple extends Plum_modele{

	public function __construct(){
		parent::__construct();//obligatoire
		
		$this->connectDb();
	}

//<!-- - - - - - - - - - - - -  SELECT - - - - - - - - - - - -->

	public function getListeExemple(){
		$sql="select * from plum_mvc_exemple order by lib" ;
		$sth = $this->database->prepare($sql);
		
		$this->execute($sth);
		
		return $sth->fetchAll();
	}
	
	public function getExemple($critere){
		$sql="select * from plum_mvc_exemple where id=?" ;
		$sth = $this->database->prepare($sql);
		
		$param=array($critere["id"]);
		$this->execute($sth,$param);
		
		$exemple=$sth->fetchAll();
		return $exemple[0];
	}

//<!-- - - - - - - - - - - - -  INSERT- - - - - - - - - - - -->
	public function ajouterExemple($data){
		$sql="insert into plum_mvc_exemple values('',?)";
		$sth = $this->database->prepare($sql);
		
		$param=array($data["lib"]);
		$sth->execute($param);
	}
	
//<!-- - - - - - - - - - - - -  UPDATE- - - - - - - - - - - -->
	public function modifierExemple($data){
		$sql="update plum_mvc_exemple SET lib=? WHERE id=?";
		$sth = $this->database->prepare($sql);
		
		$param=array($data["lib"],$data["id"]);
		$this->execute($sth,$param);
	}
	
	//<!-- - - - - - - - - - - - -  DELETE- - - - - - - - - - - -->
	public function supprimerExemple($data){
		$sql="delete from plum_mvc_exemple WHERE id=?";
		$sth = $this->database->prepare($sql);
		
		$param=array($data["id"]);
		$this->execute($sth,$param);
	}
//<!-- - - - - - - - - - - - -  PRIVATE- - - - - - - - - - - -->
	private function execute(&$sth,$param=array()){
		$t=$sth->execute($param);
		if(!$t) {
			print("<br>Erreur PDO::execute<br>");
			print_r($sth->errorInfo());
			die("");
		}
	}

		
}

?>