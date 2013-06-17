<?php

 include_once("classe_conn.php");  // Proprio al volo  $my=conntrue();
include("classe_utenti.php");
 
 
class contatti{
var $nome;
var $cognome;
var $email;
var $azienda;
var $telefono;
var $sito;


public function __construct (){
/*$nome,$cognome,$email,$azienda,$telefono,$sito 
$this->nome=$nome;
$this->cognome=$cognome;
$this->email=$email;
$this->azienda=$azienda;
$this->telefono=$telefono;
$this->sito=$sito;

 * 
 * 
 */

}
public function form(){
    
    // STAMPO TUTTI GLI UTENTI INTERNI tagliando le iniziali della parola segreta 
 
   $prova=new utenti();
  $prova->trovatuttiutenti();

?>

<form id='userpersonal' onsubmit='return false;' >
    <input  type='text'  name='credenziale'  class='credenziale'>
    <label></label>
</form>
<form id='formcont' onsubmit='return false;'>
    nome:
    <input type="text" id='nome'  onkeyup="cntr(this)" name='nome' >
    cognome:
    <input type="text" onkeyup="cntr(this)" name='cognome'  id='cognome'>
    email:
    <input type="text"  onkeyup="cntr(this)" name='email' id='email'>
    azienda:
    <input type="text"  onkeyup="cntr(this)" name='azienda' id='azienda'>
    telefono:
    <input type="text"  onkeyup="cntr(this)" name='telefono' id='telefono'>
    sito:
    <input type="text"  onkeyup="cntr(this)" name='sito'  id='sito'>
    <input type="button" class="invia" value="registra" />
    <input type="button" class="vedirisult" value="Open" />
    <input type='button' class='hideresult' value='Closer' />

</form>

<form id='trova' onsubmit="return false;">
    <input type='text'  id='trovanome' name='trovanome'/>
</form>

<?php }

    // DOPO  il login
    //STAMPO AL VOLO TUTTO ilcontenuto gemellato all utente --------
    public function printresult($idutente,$nome){
    $my=conntrue();

    // $my = new mysqli("localhost", "root", "new-password","test");
    $sql="SELECT * from contact where id_exutente = $idutente  ";

    // se l utente popola la ricerca
    // SINGOLO SOLO NOME
    if($nome != ""){

    $sql.= " and   nome LIKE '%$nome%'   ";

    }

    $sql.="order by id_contact desc limit 0,200 ";
    $result= $my -> query ($sql);

    echo "<table border='1' style='width:100%;'><thead><th>nome</th>
    <th>cognome</th><th>email</th><th>azienda </th>
    <th>telefono</th>
    <th>sito </th> <th>Inserito </th>
    </thead><tbody>";

    while ($ris=mysqli_fetch_assoc($result)){
    extract($ris);
    $dint = date('d-m-Y h:i:s',($datainsert));
    echo "<tr><td>$nome</td>
    <td>$cognome</td>
    <td>$email</td>
    <td>$azienda</td>
    <td>$telefono</td>
    <td>$sito</td>    <td> $dint</td></tr>  " ;

    }
    echo "</tbody></table>";

    }

    // INSERISCI
    public function  insertdb($array){

    $id=  $_SESSION['id_utente'];
    $datain=strtotime(date('d-m-Y h:i:s')  );

    foreach($array as $v => $names){
    $lorifo.= $v.'='.$names.'&';
    }
    parse_str($lorifo);
    $my=conntrue();

    $sql="INSERT into contact values(null,'$nome','$cognome','$email','$azienda','$telefono','$sito','$id','$datain' ) ";
    $result= $my -> query ($sql);
    print_r($lorifo);

    }

    //FINE CLASSE 
    
    }
?>