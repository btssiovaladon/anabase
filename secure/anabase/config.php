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

$configXuSec['secret']="cILEanabaseàob_cleandfjùùjjjobligaop";//obligatoire. doit être différente pour chaque package secure

//file
$configXuSec['io']="file"; //contrôle des utilisateur dans secure.user.php

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
