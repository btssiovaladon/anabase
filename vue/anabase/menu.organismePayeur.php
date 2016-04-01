<?php
/**
 * Menu Organisme Payeur[menu]
 *
 * @project	   anabase
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Thierry Bogusz <thbogusz@yahoo.fr>
*/
	
	//:::: items du menu ::::
	$m=0;
	$items[$m]=new Plum_data();
	$items[$m]->controleur="organismePayeur";
	$items[$m]->action="mnuLister";
	$items[$m]->caption="Liste";
	
	$m++;
	$items[$m]=new Plum_data();
	$items[$m]->controleur="organismePayeur";
	$items[$m]->action="mnuAjouter";
	$items[$m]->caption="Ajout";
	
	$m++;
	$items[$m]=new Plum_data();
	$items[$m]->controleur="accueil";
	$items[$m]->action="fermer";
	$items[$m]->caption="FERMER";
	
	$this->items=$items; //indispensable
	
	//onglet actif par défaut si aucun menu connu
	$this->actif=0;
?>