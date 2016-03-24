<?php
/**
 * Menu Exemple [menu]
 *
 * @project	   plum.mvc
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Thierry Bogusz <thbogusz@yahoo.fr>
*/
	
	//:::: items du menu ::::
	$m=0;
	$items[$m]=new Plum_data();
	$items[$m]->controleur="exemple";
	$items[$m]->action="mnuLister";
	$items[$m]->caption="Liste";
	
	$m++;
	$items[$m]=new Plum_data();
	$items[$m]->controleur="exemple";
	$items[$m]->action="mnuAjouter";
	$items[$m]->caption="Ajout";
	
	$m++;
	$items[$m]=new Plum_data();
	$items[$m]->controleur="exemple";
	$items[$m]->action="mnuFermer";
	$items[$m]->caption="FERMER";
	
	$this->items=$items; //indispensable
	
	//onglet actif par défaut si aucun menu choisi (controleur ou url)
	$this->actif=0;
?>