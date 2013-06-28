<?php
namespace npget;
class Scriptjs
{

    public function __construct()
    {
    //    echo __CLASS__."<br>";
    }
    

    public function  login()
    {
        ?>
        <script>
            

$('#formcont').hide('slow');
$('title').html("Bevenuto..");

    // VABBE LASCIAMO STARE non va bene   ma va molto meglio



        var c = $('.credenziale').val();
        $('.credenziale').focus();

        $('#userpersonal label').html("Login o scegli una password ");

        //  Key up è sbagliato per l uso che ne servirebbe sarebbe meglio un set timeou ..
        $('.credenziale').keyup(function() {

            var c = $(this).val();
            
            
            if (c.length >3 ) {
                $('.credenziale').css({"border" : "4px solid green"});
        
    
$('#userpersonal label').html("<p class='insertutente' style='cursor:pointer;'>Entra e/o Registrati </p> ");

                // SE avviene un  insert new utente
        $('.insertutente').click(function() {
        
        $("#userpersonal label").html("attendere ...");

// RIGA 56 di control.php la classe vede se la parola esiste   
//se si  prosegue senno dalla classe richiamo su questo scritp dalla riga 60 per chiedere di crearlo 
            $.post("control.php", {'newclient' : c }).done( function (data) {

                        $("#userpersonal label").html(data);

                    });

                });

                // $('#userpersonal input ').hide("slow");

            } else {
                var count = c.length - 4 ;
                $($('.credenziale')).css({
                    "border" : "14px solid red"
                });

                $('#userpersonal label').html("Scrivi altri " + count);
                $('title').html( + count);
                $('#formcont').hide('slow');

            }

        });
        </script>
        
        
        <?php
        
    }
    
     
     
 function  utentenein ( $email) {
     
     
if(isset($email)){
    
    
     $email =$_REQUEST['utentenein'];   
    ?>
    <script>
    $('title').html("<?php echo $email ;?> -Creati ");

    var newcl ="Attenzione utente assente  --Crearlo - <a href='' onclick='return false;' class='newcl'  >Si creo-- (<?php echo $email; ?>)</a>" ;
    $('#userpersonal label').html(newcl);

    $('.newcl').click( function (){
    $('#userpersonal label').html("ATTENDERE ......");

    $.post("control.php",{"confermautente":"yes","nomeperinsert":"<?php echo $email; ?>"}).done(function(data){
    location.reload();
    });

    });
    
    </script>
    
<?php 
        } 
     }

    
    
    
    
function utenteyaa ( $email ) {
      ?>   
 <script>
        
        
        $('title').html("Log. Ok <?php echo $email; ?>");

var c =   $('.credenziale').val("<?php echo $email; ?>" );

    $('#userpersonal input ').hide("slow");

    var out="<span class='output' style='color:red;padding-left:19px;cursor:pointer;' >Logout</span>";
    $('#userpersonal label').html("Utente Loggato come : <span style='color:green'>"+ c.val() +"</span>"+ out );

    $('.output').click(function() {
    $.post("control.php",{"logout":"on"}).done(function(){
    location.reload();

    //   $('#formcont').fadeOut('slow');
    //      $('#userpersonal').fadeIn("slow");

    })

    });

    //SE è loggato passa e si vede il form
    $('#formcont').fadeIn('slow');

</script>
<?php 
}
    
    
    
    }

