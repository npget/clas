<?php

namespace npget;
//include "Dbconn.php" ;


class Client {

    var $mycooker;
    var $email;

    public function __construct() {



          echo __CLASS__."<br>";
    }

    function trovasesiste($mycooker, $email) {

        // $my= new Dbconn;
        //  $my->conntrue() ;


        $sql = 'SELECT * from utenti where ';

        // se passo il cookie
        // se il cooki o sessione che passo è presente nel DB
        if ($mycooker != "") {
            $sql.= "mycooker ='$mycooker'   ";
          
            var_dump($mysqli);
//
//                      $result=query($sql);
           
//            $result->conntrue()->query($sql);
            
//  $res -> query($sql);
        }

        // $email Sarebbe il nome che l utente posta per fare login
        // QUI MI POPOLA SE CLICKKA UN  NUOVO ENTRATO O SE IL NOME esiste nel DB

        if ($email != "") {
            $sql.= "email='$email'   ";
            
            
$result=$mysqli-> query($sql);

// Se il nome non esiste
            if ($row = mysqli_num_rows($result) == 0) {
                $lognow = new Scriptjs();
                $lognow->utentenein($email);

                /*
                  <script type="text/javascript" src='login.php?utentenein=<?php echo $email; ?>'></script>
                 */
                exit;
            }
        }
        var_dump($result);
        echo $sql;
        echo $row = mysqli_num_rows($result);


        // QUI PASSA SE L UTENTE ESISTE DA NOME O DA COOKIE ;; O SESSIONE AL MOMENT
        if ($row = mysqli_num_rows($result) >= 1) {


            $risult = mysqli_fetch_array($result);

            // QUI MI PRENDO L ID DELL UTNTE CHE FA LOGIN
            $_SESSION['id_utente'] = $risult['id_utente'];

            $cook = session_id();

            $sqlupdatecook = "UPDATE utenti set mycooker='$cook' where id_utente='$_SESSION[id_utente]'   ";

            $resultupdate = $my->query($sqlupdatecook);

            // SE OTTENGO UN NOME


            $lognow = new Scriptjs();
            $lognow->utenteyaa($email);


            /*
             * <script type="text/javascript" src='login.php?utenteyaa=<?php echo $risult['email']; ?>'></script>
             */
        } else {


//  FINO A QUANDO NON OTTENGO un nome per accesso


            $lognow = new Scriptjs();
            $lognow->login();

            /*
              ?>
              <script type="text/javascript" src='login.php'></script>
              <?php
             */
        }
    }

    function trovatuttiutenti() {
        //$my= new Dbconn();
        //$my->conntrue();

        $sql = "SELECT * from utenti order by id_utente desc limit 0,1000";
//$result= $my -> query ($sql);
        $result = new Dbconn();
        $result->conntrue()->query($sql);
        echo "utenti :(" . mysqli_num_rows($result) . ')-->';
        while ($row = mysqli_fetch_assoc($result)) {
            $names = substr_replace($row['email'], '..', 0, 2);
            echo $names . '-';
        }
    }

    function insertutente($mycooker, $email) {

        $my = conntrue();

        $sql = "INSERT into utenti values (null,'$email','$mycooker') ";
        $result = $my->query($sql);
        if ($result) {
            sleep(2);
        } else {
            echo mysqli_error();
        }
    }

}