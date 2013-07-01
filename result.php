<?php
session_start(); 

error_reporting(E_WARNING);




include_once  "Client.php";
include_once "Contact.php";
include_once "Scriptjs.php";


//istanzio variabile per  passarla alla query 
 //printresult è la query che trova nome se il get[trovanomne]  esiste  
$resultprint= new npget\Contact();


if(isset($_GET['trovanome'])){
   
$resultprint->printresult($_SESSION['id_utente'],"");
}


if( ! isset($_GET['trovanome'])){
    
    $resultprint->printresult($_SESSION['id_utente'],$_GET['trovanome']);  
    
}
