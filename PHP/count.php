<?php

if($_REQUEST['drzava']!='--- Select country ---'){
    Include "./connection.php";
    
    //Dohvatanje broja zarazenih
    $query_infected="SELECT COUNT(*) as \"Count\" FROM patients p
    JOIN countries c on p.country_id=c.id
    WHERE c.country_name='".$_REQUEST['drzava']."'
    AND p.infected=1;";

    $infected_result=$connection->query($query_infected);
    $infected_row=$infected_result->fetch_array();
    $infected_count=$infected_row['Count'];

    //Dohvatanje broja nezarazenih
    $query_uninfected="SELECT COUNT(*) as \"Count\" FROM patients p
    JOIN countries c on p.country_id=c.id
    WHERE c.country_name='".$_REQUEST['drzava']."'
    AND p.infected=0;";

    $uninfected_result=$connection->query($query_uninfected);
    $uninfected_row=$uninfected_result->fetch_array();
    $uninfected_count=$uninfected_row['Count'];
    
    $string="<div class='count-row'>
            <div class='label'>All infected in ".$_REQUEST['drzava']."</div>
            <div class='value'>".$infected_count."</div>
        </div>
        <div class='count-row'>
            <div class='label'>All uninfected in ".$_REQUEST['drzava']."</div>
            <div class='value'>".$uninfected_count."</div>
        </div>";

    echo $string;
}