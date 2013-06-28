<?php
namespace npget;
class Dbconn
{

    public function __construct()
    {
   //     echo __CLASS__."<br>";
    }
 
 public function conntrue(){
        $my = new \mysqli("localhost", "root", "new-password","test");

        if($my ->connect_errno){ echo ("Connessione DB Assente :<br>".$my->connect_error );}
        
        return $my ;
        

     
        
        }
     //   public function 
    
    
}

