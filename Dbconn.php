<?php
//namespace npget;


function connx(){
$hostname = "localhost";
$username = "root";
$password = "new-password";
$database = "test";
$mysqli = mysqli_connect($hostname, $username, $password, $database);

/* check  */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}else{
return $mysqli;
//var_dump($mysqli);

}
}




//magic quotes logic
if (get_magic_quotes_gpc())
{
function stripslashes_deep($value)
{
    $value = is_array($value) ?
    array_map('stripslashes_deep', $value) :
    stripslashes($value);
    return $value;
}
$_POST = array_map('stripslashes_deep', $_POST);
$_GET = array_map('stripslashes_deep', $_GET);
$_COOKIE = array_map('stripslashes_deep', $_COOKIE);
$_REQUEST = array_map('stripslashes_deep', $_REQUEST);
}