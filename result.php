<?php
session_start(); 

error_reporting(E_WARNING);



//include_once "classe_center.php"; 

include "Dbconn.php";
include "Client.php";
include "Contact.php";
include "Scriptjs.php";


//istanzio variabile per  passarla alla query 
 //printresult è la query che trova nome se il get[trovanomne]  esiste  
$resultprint= new Contact();


if(isset($_GET['trovanome'])){
   
$resultprint->printresult($_SESSION['id_utente'],"");
}


if( ! isset($_GET['trovanome'])){
    
    $resultprint->printresult($_SESSION['id_utente'],$_GET['trovanome']);  
    
}
