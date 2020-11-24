<?php
include "connection.php";

//Upit za slucaj da je izabrana drzava
$query="select p.id as \"Patient ID\", CONCAT(CONCAT(p.first_name,' '), p.last_name) as \"First and last name\", p.birth_year as \"Birth year\",
c.country_name as \"Country\", p.infected as \"Infected\" 
from patients p
join countries c on c.id=p.country_id where c.country_name='".$_REQUEST['drzava']."'
order by p.id desc limit 5;";

//Upit za slucaj da nije izabrana drzava. Treba vratiti pacijente iz svih drzava (zadnjih 5)
if($_REQUEST['drzava']=='--- Select country ---'){
    $query="select p.id as \"Patient ID\", CONCAT(CONCAT(p.first_name,' '), p.last_name) as \"First and last name\", p.birth_year as \"Birth year\",
    c.country_name as \"Country\", p.infected as \"Infected\" 
    from patients p
    join countries c on c.id=p.country_id
    order by p.id desc limit 5;";
}

$query_result=$connection->query($query);
while ($row=$query_result->fetch_array()){
    echo "<tr class='data-row'>";
    echo "<td>".$row['Patient ID']."</td>";
    echo "<td>".$row['First and last name']."</td>";
    echo "<td>".$row['Birth year']."</td>";
    echo "<td>".$row['Country']."</td>";
    if($row['Infected']) echo "<td>Yes</td>"; else echo "<td>No</td>";
    echo "<td>DELETE</td>";
    echo "</tr>";

}