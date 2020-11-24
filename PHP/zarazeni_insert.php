<?php

$firstname=$_REQUEST['firstname'];
$lastname=$_REQUEST['lastname'];
$date=$_REQUEST['date'];
$drzava=$_REQUEST['drzava'];
$infected=$_REQUEST['radio'];

$query="INSERT INTO patients VALUES(NULL,(SELECT ID FROM countries WHERE country_name='".$drzava."'),'".$firstname."','".$lastname."',
YEAR(STR_TO_DATE('".$date."','%Y-%m-%d')),$infected);";

include "connection.php";

$connection->query($query);

setcookie("notice","Unos uspjesno izvrsen!",time()+3600);
header("Location: zarazeni.php");
