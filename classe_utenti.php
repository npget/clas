<?php

    /** UTENTI VOLANTI  AL VOLO ..............
    * utenti per log volanti   gemellati alla  lista dei  contatti
    */

    include_once("classe_conn.php");  // Proprio al volo  $my=conntrue();
    include_once("classe_center.php");
    
    
    class utenti  {
    var $mycooker;
    var $email;

    function __construct() {

    }

    // QUI MI INCASINO SEMPRE  + credo di farla semplice + la incasino

    function trovasesiste($mycooker,$email){

    // QUI ERA NATO PERIL COOKIE INVECE PASSO LA SESSION
    $my=conntrue();

    $sql='SELECT * from utenti where ';

    // se passo il cookie
    // se il cooki o sessione che passo è presente nel DB
    if ($mycooker !=""){
    $sql.= "mycooker ='$mycooker'   " ;
    $result= $my -> query ($sql);

    }

    // $email Sarebbe il nome che l utente posta per fare login
    // QUI MI POPOLA SE CLICKKA UN  NUOVO ENTRATO O SE IL NOME esiste nel DB

    if ($email !=""){
    $sql.= "email='$email'   " ;
    $result= $my -> query ($sql);
    // Se il nome non esiste
    if($row= mysqli_num_rows($result) == 0){



$lognow=new controljs(); $lognow->utentenein($email);


 
/*
<script type="text/javascript" src='login.php?utentenein=<?php echo $email; ?>'></script>
*/


exit ;

    }
    }

    // QUI PASSA SE L UTENTE ESISTE DA NOME O DA COOKIE ;; O SESSIONE AL MOMENT
    if($row= mysqli_num_rows($result) > 0   ){

    $risult=mysqli_fetch_array($result);

    // QUI MI PRENDO L ID DELL UTNTE CHE FA LOGIN
    $_SESSION['id_utente']=$risult['id_utente'];

    $cook=session_id();

    $sqlupdatecook ="UPDATE utenti set mycooker='$cook' where id_utente='$_SESSION[id_utente]'   ";

    $resultupdate = $my -> query ($sqlupdatecook);

    // SE OTTENGO UN NOME

    
    $lognow=new controljs(); $lognow->utenteyaa($email);

    
    /*
     * <script type="text/javascript" src='login.php?utenteyaa=<?php echo $risult['email']; ?>'></script>
     */

}else{
    
    
//  FINO A QUANDO NON OTTENGO un nome per accesso


$lognow=new controljs(); $lognow->login();

/*
?>
<script type="text/javascript" src='login.php'></script>
<?php
 */
}

}

function trovatuttiutenti(){
$my=conntrue();

$sql="SELECT * from utenti order by id_utente desc limit 0,1000";
$result= $my -> query ($sql);

echo "utenti :(".mysqli_num_rows($result).')-->';
while($row=mysqli_fetch_assoc($result)){
$names=substr_replace($row['email'],'..',0,2);
echo $names .'-';
}
}

function insertutente( $mycooker,$email){

$my=conntrue();

$sql="INSERT into utenti values (null,'$email','$mycooker') ";
$result= $my -> query ($sql);
if($result){
sleep(2);

}else{echo mysqli_error(); }

}

}
?> 
