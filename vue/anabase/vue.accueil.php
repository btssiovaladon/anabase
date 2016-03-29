<?php
/**
 * vue.accueil
 *
 * @project	   anabase
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author	   Thierry Bogusz <thbogusz@yahoo.fr>
*/	
	
//<!-- - - - - - - - - - - - -  MENU ET ENTETE - - - - - - - - - - - -->
	//ici : pas de menu
	
	$this->titre="ACCUEIL"; 

	include_once(PATH_VUE_TEMPLATE."template.entete.php");
	
?>

<!-- - - - - - - - - - - - -  FORMULAIRE HTML - - - - - - - - - - - -->
<form method="post" action="" name="form_administration">

	<!-- - - - - - - - - - - - - champs nécessaires au fonctionnement de plum.mvc- - - - - - - - - - - -->
	<input type="hidden" name="secure_token" value="<?php echo $this->token->getToken()?>">
	
	<div class='tuile'>
	
	<!-- - - - - - - - - - - - - MENU TUILE DE l'APPLICATION - - - - - - - - - - - -->
		<ul>
		
			<a href="<?php echo $this->c->forgeUri($this->package,'congressiste','init',array());?>">
				<li class="coloradmin">Congressiste</li>
			</a>
			
			<a href="<?php echo $this->c->forgeUri($this->package,'session','init', array());?>">
				<li class="coloradmin">Sessions</li>
			</a>
			
			<a href="<?php echo $this->c->forgeUri($this->package,'hotellerie', 'init', array());?>">
				<li class="coloradmin">Hôtellerie</li>
			</a>
			
			<a href="<?php echo $this->c->forgeUri($this->package,'activite','init',array());?>">
				<li class="coloradmin">Activités</li>
			</a>
			
			<a href="<?php echo $this->c->forgeUri($this->package,'reglement','init',array());?>">
				<li class="coloradmin">Réglements</li>
			</a>
		
			<a href="<?php echo $this->c->forgeUri($this->package,'organismePayeur', 'init', array());?>">
				<li class="coloradmin">Organismes payeurs</li>
			</a>
		
		</ul>
		
	</div>
	
</form>	

<!---------------------------------------- PIED ------------------------------>
<?php include_once(PATH_VUE_TEMPLATE."/template.pied.php");?>