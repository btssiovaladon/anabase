<?php
/**
 * vue.organismePayeurAjouter
 *
 * @project	   anabase
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Thierry Bogusz <thbogusz@yahoo.fr>
*/	

	
//<!-- - - - - - - - - - - - -  MENU ET ENTETE - - - - - - - - - - - -->

	$this->titre = "ORGANISME PAYEUR";
	
	$this->useMenu("organismePayeur");
	
	$this->menu->actif=1;

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
	
	<table border="0">
	
	<tr>	
		<td>Nom Organisme</td>
		<td>
			<input id="nomOrganisme" name="nomOrganisme" type="text" value="<?php echo $this->data->nomOrganisme;?>" size="50"/>
		</td>
	</tr>
	
	<tr>	
		<td>Adresse Organisme</td>
		<td>
			<input id="adresseOrganisme" name="adresseOrganisme" type="text" value="<?php echo $this->data->adresseOrganisme;?>" size="50"/>
		</td>
	</tr>
	
	<tr>
		<td>
			<input type="button" name="buttonAjouter" value="Ajouter" 
		          onclick="pluma1.form.submit('<?php echo $this->c->forgeUriAction('onclickBoutonAjouter',array());?>',-1,'')">
		</td>											
	</tr>
	</table>
</form>	

<!-- - - - - - - - - - - - -  PIED - - - - - - - - - - - -->
<?php include_once(PATH_VUE_TEMPLATE."template.pied.php");?>