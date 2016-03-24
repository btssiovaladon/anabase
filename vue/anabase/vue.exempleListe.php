<?php
/**
 * vue.exemple[liste]
 *
 * @project	   plum.mvc
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Thierry Bogusz <thbogusz@yahoo.fr>
*/	
	
//<!-- - - - - - - - - - - - -  MENU ET ENTETE - - - - - - - - - - - -->
	$this->titre="EXEMPLE";
	
	$this->useMenu("exemple");

	include_once(PATH_VUE_TEMPLATE."template.entete.php");
	
//<!-- - - - - - - - - - - - -  DONNEES DU FORMULAIRE - - - - - - - - - - - -->
	$liste=$this->data->liste;
	
?>
<!-- - - - - - - - - - - - -  FORMULAIRE HTML - - - - - - - - - - - -->
<form method="post" action="" name="form_exempleListe">

	<!-- - - - - - - - - - - - - champs nécessaires au fonctionnement de plum.mvc- - - - - - - - - - - -->
	<input type="hidden" name="secure_token" value="<?php echo $this->token->getToken()?>">
	
	<!-- - - - - - - - - - - - - champs nécessaires au fonctionnement de template.plum- - - - - - - - - - - -->
	<input type="hidden" name="<?php echo $this->menu->id;?>" value="<?php echo $this->menu->actif;?>">

	<!-- - - - - - - - - - - - - formulaire- - - - - - - - - - - -->
	
	<div>
		<ul class='liste'>
			<?php 
				//print_r("liste=".$liste);die("");
				foreach($liste as $ligne_exemple){
					//$dateCreation = func_date_us_vers_francais($enquete['dateCreation']);
					//$dateCampagne = func_date_us_vers_francais($enquete['dateCampagne']);
					$param=array();
					$param[0]=new Plum_data();
					$param[0]->key="id";
					$param[0]->val=$ligne_exemple["id"];
					$url=$this->c->forgeUri($this->package,$this->controleur,'onClickListe',$param);
							
					$href="<a href='".$url."'/>"
							."<li>"
								."<b>".$ligne_exemple["lib"]."</b></br>"
							."</li>"
							."</a>";
					
					echo $href;
				}
			?>
		</ul>
	</div>
</form>	

<!---------------------------------------- PIED ------------------------------>
<?php include_once(PATH_VUE_TEMPLATE."/template.pied.php");?>