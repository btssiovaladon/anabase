<?php
/**
 * anabase
 *
 * Config configuration secure/USER
 *
* @project	   anabase
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Thierry Bogusz <thbogusz@yahoo.fr>
*/

//   Obligatoire. doit être différent pour chaque package secure
$configXuSec['secret']="cILEanabaseàob_cleandfjùùjjjobligaop";

//   file : contrôle des utilisateurs dans secure.user.php
$configXuSec['io']="file"; 

//database
/* s'appuie sur une table 

$configXuSec['io']="database";
$configXuSec['driver']="mysql";
$configXuSec['host']="localhost";
$configXuSec['dbname']='bdanatole';
$configXuSec['tableUser']='plum_mvc_table_user';
$configXuSec['user']='root';
$configXuSec['pwd']='';
*/
