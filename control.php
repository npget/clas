<?php
session_start();
error_reporting(0);

//include 'classe_center.php';



include "Dbconn.php";
include "Client.php";
include "Contact.php";
include "Scriptjs.php";







/*
 * QUI CONTROLLI PER le richieste dei contatti veri e propri 
 * */

 //NUOVO UTENTE 
 // se l utente vuole loaggarsi con nuovo nome ....
// INSERT NUOVI CONTATTI
if(($_POST['nome']!="")){
    $perinsert= new contatti();
    $perinsert -> insertdb($_POST);
   

}

















// VEDO SE IL  
if($_POST ['newclient']!=""){
    $email=htmlspecialchars(trim($_POST['newclient']));
   // $mycooker=$_COOKIE['mycooker'];
    $mycooker=session_id();
$c=new utenti();

// QUI PASSO LA CREDENZIALE E VEDO SE ESISTE 
$c->trovasesiste("",$email);
}






// QUI FACCIO NUOVA INSERT PER NUVO UTENTE 
// HO AGGIUNTO CHE SE NON ESISTE VA CONFERMATA LA CREAZIONE DI UNA N UVOA UTENTE
///QUI CONTROLLO SE ESISTE IL NOME 
if($_POST ['confermautente']=="yes"){
    $email=htmlspecialchars(trim($_POST['nomeperinsert']));
      // $mycooker=$_COOKIE['mycooker'];
       $mycooker=session_id();
$c=new utenti();
$c->insertutente( $mycooker,$email);
// QUI PASSO LA CREDENZIALE E VEDO SE ESISTE 
}


// QUI SE CLIKKANO LOGOUT 
if($_POST['logout']=='on'){
        session_regenerate_id();    
    //  session_destroy();
    }










?>


