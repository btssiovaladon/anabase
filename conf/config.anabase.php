<?php
/**
 * Config configuration du package
 *
* @project	   exemple
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Thierry Bogusz <thbogusz@yahoo.fr>
*/

$configXuZe ['APP_NAME']="Application ANABASE";//obligatoire, de pr�f�rence dans le config de chaque package

$configXuZe['USER_SECURE']='anabase';//obligatoire, dans config.php ou  d�fini ou re-d�fini par le config de chaque package

$configXuZe['DEFAUT_CONTROLEUR']='authentification';//config.php ou  d�fini ou re-d�fini par le config de chaque package

$configXuZe['DEFAUT_ACTION']='init';//config.php ou  d�fini ou re-d�fini par le config de chaque package

$configXuZe['TEMPLATE']='plum'; //obligatoire, config.php ou  d�fini ou re-d�fini par le config de chaque package

/*
* obligatoire. 
* extension php uniquement
*
* fichiers suppl�mentaires � inclure pr�sents dans \include\. s'appuie sur PATH_INCLUDE
*
* array() si aucun fichier
* chemin du fichier dans \include\. $configXuZe['INCLUDE'][0]="PHPEXCEL/PHPExcel.php"
*/
$configXuZe['INCLUDE']=array(); 