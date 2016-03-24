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
<form method="post" action="" name="form_exempleModifierSupprimer">

	<!-- - - - - - - - - - - - - champs nécessaires au fonctionnement de plum.mvc- - - - - - - - - - - -->
	<input type="hidden" name="secure_token" value="<?php echo $this->token->getToken();?>">
	
	<!-- - - - - - - - - - - - - champs nécessaires au fonctionnement de template.plum- - - - - - - - - - - -->
	<input type="hidden" name="<?php echo $this->menu->id;?>" value="<?php echo $this->menu->actif;?>">

	<!-- - - - - - - - - - - - - formulaire- - - - - - - - - - - -->
	<table border="0">
	<tr>	
		<td>Exemple</td>
		<td><input id="lib" name="lib" type="text" value="<?php echo $this->data->exemple['lib'];?>" size="50"/></td>
	</tr>
	<tr>
		<td><input type="button" name="buttonModifier" value="Modifer" 
		  onclick="form_submit('<?php echo $this->c->forgeUriAction('boutonModifier',array());?>',-1)">
		</td>	
		
		<td><input type="button" name="buttonSupprimer" value="Supprimer" 
		  onclick="form_confirm('<?php echo $this->c->forgeUriAction('boutonSupprimer',array());?>',-1,'Confirmez la suppression')">
		</td>
	</tr>
	</table>
</form>	

<!-- - - - - - - - - - - - -  PIED - - - - - - - - - - - -->
<?php include_once(PATH_VUE_TEMPLATE."/template.pied.php");?>