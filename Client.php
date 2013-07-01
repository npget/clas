<?php
namespace npget;

include_once "Dbconn.php";
include_once "Scriptjs.php";

class Client {

    var $mycooker;
    var $email;

    public function __construct() {
        //   echo __CLASS__."<br>";
    }



    function trovasesiste($mycooker,$email) {
     print_r(error_get_last()); 
    //var_dump($email);
    $sql = 'SELECT * from utenti where ';


        
        // se passo il cookie
        // se il cooki o sessione che passo è presente nel DB
        if ($mycooker != "") {
            $sql.= "mycooker  =   '$mycooker'    ";
            $result = connx()->query($sql);
        
    
            
        }



        // $email Sarebbe il nome che l utente posta per fare login
        // QUI MI POPOLA SE CLICKKA UN  NUOVO ENTRATO O SE IL NOME esiste nel DB

        if ($email != "") {
           
            
            $sql.= "email='$email'   ";


            $result = connx()->query($sql);

// Se il nome non esiste
            if (mysqli_num_rows($result) == 0) {
               
                $lognow = new Scriptjs();
                $lognow->utentenein($email);
           echo $email;
            return;
         
            
            
            }
        }





        // QUI PASSA SE L UTENTE ESISTE DA SESSION  COOKIE ;; O SESSIONE AL MOMENT
        if (mysqli_num_rows($result) > 0) {
          
            $risult = mysqli_fetch_array($result);

            // QUI MI PRENDO L ID DELL UTNTE CHE FA LOGIN
            $_SESSION['id_utente'] = $risult['id_utente'];
            $cook = session_id();
            $sqlupdatecook = "UPDATE utenti set mycooker='$cook' where id_utente='$_SESSION[id_utente]'   ";
            $resultupdate = connx()->query($sqlupdatecook);
            $lognow = new Scriptjs();
            
            $lognow->utenteyaa($risult['email']);
    
         
        } else {
        

//  FINO A QUANDO NON OTTENGO un nome per accesso


            $lognow = new Scriptjs();
            $lognow->login();

      
        }
    
        
        
        }

    
    
    
    function trovatuttiutenti() {


        $sql = "SELECT * from utenti order by id_utente desc limit 0,1000";
        $result = connx()->query($sql);
        echo "utenti :(" . mysqli_num_rows($result) . ')-->';
        while ($row = mysqli_fetch_assoc($result)) {
            $names = substr_replace($row['email'], '..', 0, 2);
            echo $names . '-';
        }
    }

    function insertutente($mycooker, $email) {


        $sql = "INSERT into utenti values (null,'$email','$mycooker') ";
        $result = connx()->query($sql);
        if ($result) {
            
            sleep(2);
        } else {
            echo mysqli_error();
        }
    }

}