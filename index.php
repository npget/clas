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

include "Dbconn.php";
include "Client.php";
include "Contact.php";
include "Scriptjs.php";

/*
new Dbconn();
new Client();
new Contact();
new Scriptjs();

 * 
 */

//new npget\Dbconn();
//new npget\Client();
//new npget\Contact();
//new npget\Scriptjs();





?>
<div id='printresult'> </div>


<?php   
    $controlcookie = new npget\Client();
   
   
    //$controlcookie->trovasesiste($_COOKIE['mycooker'],"");
    $controlcookie -> trovasesiste(session_id(),"");
    
  //  setcookie("mycooker", session_id(), time() + 3000000);
  
  ?>

<script type='text/javascript' src='mynova.js' ></script>