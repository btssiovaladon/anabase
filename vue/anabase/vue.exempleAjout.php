<?php
/**
 * vue.exemple[vue]
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
	
	
?>

<!-- - - - - - - - - - - - -  FORMULAIRE HTML - - - - - - - - - - - -->
<form method="post" action="" name="form_exempleAjour">

	<!-- - - - - - - - - - - - - champs n�cessaires au fonctionnement de plum.mvc- - - - - - - - - - - -->
	<input type="hidden" name="secure_token" value="<?php echo $this->token->getToken()?>">
	
	<!-- - - - - - - - - - - - - champs n�cessaires au fonctionnement de template.plum- - - - - - - - - - - -->
	<input type="hidden" name="<?php echo $this->menu->id;?>" value="<?php echo $this->menu->actif;?>">

	<!-- - - - - - - - - - - - - formulaire- - - - - - - - - - - -->
	<table border="0">
	<tr>	
		<td>Exemple</td>
		<td><input id="lib" name="lib" type="text" value="<?php echo $this->data->lib;?>" size="50"/></td>
	</tr>
	<tr>
		<td><input type="button" name="buttonAjouter" value="Ajouter" 
		  onclick="form_submit('<?php echo $this->c->forgeUriAction('boutonAjouter',array());?>',-1,'')">
		</td>											
	</tr>
	</table>
</form>	

<!-- - - - - - - - - - - - -  PIED - - - - - - - - - - - -->
<?php include_once(PATH_VUE_TEMPLATE."template.pied.php");?>