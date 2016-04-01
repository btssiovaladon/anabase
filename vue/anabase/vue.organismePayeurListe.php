<?php
/**
 * vue.organismePayeurListe
 *
 * @project	   anabase
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Thierry Bogusz <thbogusz@yahoo.fr>
*/	

	
//<!-- - - - - - - - - - - - -  MENU ET ENTETE - - - - - - - - - - - -->

	$this->titre = "ORGANISME PAYEUR";
	
	$this->useMenu("organismePayeur");
	
	$this->menu->actif=0;

	include_once(PATH_VUE_TEMPLATE."template.entete.php");
	
//<!-- - - - - - - - - - - - -  DONNEES DU FORMULAIRE - - - - - - - - - - - -->
	
?>

<!-- - - - - - - - - - - - -  FORMULAIRE HTML - - - - - - - - - - - -->

<form method="post" action="" name="">

	<!-- .................. IMPORTANT  .................... -->
	
	<!-- !!! champs nécessaires au fonctionnement de plum.mvc !!! -->
	<input type="hidden" name="secure_token" value="<?php echo $this->token->getToken()?>">
	
	<!-- !!! champs nécessaires au fonctionnement de template.plum !!! -->
	<input type="hidden" name="<?php echo $this->menu->id;?>" value="<?php echo $this->menu->actif;?>">

	<!-- .................. DETAIL DE LA VUE  .................... -->
	
	<div>
		<ul class='liste'>
			<?php 
				foreach($this->data->listeOrganismePayeur as $ligne){
					$param=array();
					$param[0]=new Plum_data();
					
					$param[0]->key="id";
					$param[0]->val=$ligne["NUM_ORGANISME"];
					$url=$this->c->forgeUri($this->package,$this->controleur,'onClickListe',$param);
							
					$href=
						"<a href='".$url."'/>"
							."<li>"
								.$ligne["NOM_ORGANISME"]
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