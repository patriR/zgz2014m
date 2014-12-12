<?php
//function checkLogin($config){

if($_POST){
    echo $_POST['inputEmail'];
// Conectarse al DBMS
$link = mysqli_connect($config['database']['host'],
    $config['database']['user'],
    $config['database']['password']);
// Seleccionar la DB
mysqli_select_db($link, $config['database']['database']);
// SELECT * FROM users;
$sql = "SELECT * FROM users WHERE email='".$_POST['inputEmail']."' and password='".$_POST['inputPassword']."'";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result)>0)
{
    //Existe el usuario
    $_SESSION['email'] = $_POST['inputEmail'];
    $_SESSION['password'] = $_POST['inputPassword'];
    header("Location: /users/select");
} else 
{
    header("Location: /error");
}

}else {echo "No post";}
