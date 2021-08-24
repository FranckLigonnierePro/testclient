<?php

$dbhost ="localhost";
$dbuser ="franck";
$dbpassword ="arinfo2021";
$dbname ="boutique_en_ligne";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname))
{
    die("failed to connect!");
}



?>