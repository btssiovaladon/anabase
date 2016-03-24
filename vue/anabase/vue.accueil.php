<?php
/**
 * Vue Accueil [vue]
 *
 * @project	plum.mvc
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Thierry Bogusz <thbogusz@yahoo.fr>
*/	

//<!---------------------------------------- MENU ET ENTETE ------------------------------>

	$this->titre="ACCUEIL";

	include_once(PATH_VUE_TEMPLATE."template.entete.php");
?>

<!---------------------------------------- MENU TUILE ------------------------------>
<div class='tuile'>
<ul>
<a href="<?php echo $this->c->forgeUri($this->package,'exemple','mnuLister',array());?>">
	<li class="colorautre2">Exemple</li>
</a>
</ul></div>

<!---------------------------------------- PIED ------------------------------>
<?php include_once(PATH_VUE_TEMPLATE."template.pied.php");?>