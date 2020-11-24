<?php

$query="DELETE FROM patients WHERE id=".$_REQUEST['id'];

include "connection.php";
$connection->query($query);