<?php
 session_start();
?>
<head>
	<script type='text/javascript' src='jquery-1.8.3.js' ></script>
	<script type='text/javascript' src='jquery-ui-1.9.2.custom.js' ></script>
	<title></title>
</head>
<style>a{text-decoration: none;}</style>

<?php

//include "Dbconn.php";
include_once  "Client.php";
include_once "Contact.php";
include_once  "Scriptjs.php";


$valore = new npget\Contact("nome1", "nome2", "nome3", "nome4", "nome5", "nome6");

//ottengo il form per le insert e i ltext per il login ... SOLO DOPO IL LOGIN

echo $valore -> form();


?>
<div id='printresult'> </div>


<?php   


$controlcookie = new npget\Client();


       //$controlcookie->trovasesiste($_COOKIE['mycooker'],"");
   $controlcookie -> trovasesiste(session_id(),"");

   
  //  setcookie("mycooker", session_id(), time() + 3000000);
  ?>

<script type='text/javascript' src='mynova.js' ></script>