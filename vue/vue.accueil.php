<?php
/**
 * vue.administration
 *
 * @project	   anatole
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author	   Thierry Bogusz <thbogusz@yahoo.fr>
 * @author     Pierre Thuillier <pierre.thuillier2@gmail.com>
*/	
	
//<!-- - - - - - - - - - - - -  MENU ET ENTETE - - - - - - - - - - - -->
	$this->titre="ACCUEIL"; 

	include_once(PATH_VUE_TEMPLATE."template.entete.php");
	
?>
<!-- - - - - - - - - - - - -  FORMULAIRE HTML - - - - - - - - - - - -->
<form method="post" action="" name="form_administration">

	<!-- - - - - - - - - - - - - champs nécessaires au fonctionnement de plum.mvc- - - - - - - - - - - -->
	<input type="hidden" name="secure_token" value="<?php echo $this->token->getToken()?>">
	

	
	
	<div class='tuile'>
	
	<!-- - - - - - - - - - - - - ADMINISTRATEUR- - - - - - - - - - - -->
		<ul>
		<?php
			if($this->c->secure->getGroupe()=="@Administrateur"){
		?>		
		
		
			<a href="<?php echo $this->c->forgeUri($this->package,'administrationCalendrier','mnuCalendrierModifierSupprimer',array());?>">
				<li class="coloradmin">Calendrier</li>
			</a>
			
			<a href="<?php echo $this->c->forgeUri($this->package,'administrationMajEleve','init', array());?>">
				<li class="coloradmin">Elève</li>
			</a>
			
			<a href="<?php echo $this->c->forgeUri($this->package,'administrationPersonnel', 'mnuListe', array());?>">
				<li class="coloradmin">Personnel</li>
			</a>
			
			<a href="<?php echo $this->c->forgeUri($this->package,'administrationRemarque','mnuListeRemarque',array());?>">
				<li class="coloradmin">Remarques & Thèmes</li>
			</a>
			
			<a href="<?php echo $this->c->forgeUri($this->package,'administrationTypeAlerte','mnuListe',array());?>">
				<li class="coloradmin">Type d'alerte</li>
			</a>
		<?php } ?>

		
		<!-- - - - - - - - - - - - - ADMINISTRATEUR & VIE SCOLAIRE- - - - - - - - - - - -->
		
		<?php
			if($this->c->secure->getGroupe()=="@Administrateur" |
				$this->c->secure->getGroupe()=="@Vie scolaire"){
		?>	
			<?php
				$colorAlerte="colorviescolaireinactif";
				$nbAlerte="";
				
				$alertes=$this->c->modele->getAlerteCourante();
				if(count($alertes)>0){
					$colorAlerte="colorviescolaireactif";
					$nbAlerte="(".count($alertes).")";	
				}
			
			?>
			<a href="<?php echo $this->c->forgeUri($this->package,'viescolaireAlerte', 'mnuAlerteEnCours', array());?>">
				<li class="<?php echo $colorAlerte;?>">Gestion des alertes <?php echo $nbAlerte; ?></li>
			</a>
		<?php } ?>
		

		<!-- - - - - - - - - - - - - ADMINISTRATEUR & VIE SCOLAIRE & PERSONNEL & Directeur- - - - - - - - - - - -->
			<a href="<?php echo $this->c->forgeUri($this->package,'personnelSignalerIncident', 'mnuSignaler', array());?>">
				<li class="colorperso">Signaler un incident</li>
			</a>
			
			<a href="<?php echo $this->c->forgeUri($this->package,'observationEleve', 'mnuObservation', array());?>">
				<li class="colorperso">Observations</li>
			</a>
			
			<a href="<?php echo $this->c->forgeUri($this->package,'bilan', 'mnuBilan', array());?>">
				<li class="colorbilan">Bilan</li>
			</a>
		
		
		
		</ul>
		
	</div>
	
</form>	

<!---------------------------------------- PIED ------------------------------>
<?php include_once(PATH_VUE_TEMPLATE."/template.pied.php");?>