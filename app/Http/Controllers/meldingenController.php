<?php

$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];
$type = $_POST['type'];
$overig = $_POST['overig'];

if(empty($attractie)){$errors[]="Vul de attractie-naam in.";}

if(!is_numeric($capaciteit)){$errors[]="Vul voor capaciteit een geldig getalin.";}

if(isset($_POST['prioriteit'])) {
    $prioriteit=1;
}
else{
    $prioriteit=0;
}

if(isset($errors)){var_dump($errors);die();}


require_once '../../../config/conn.php';

$query="INSERT INTO meldingen(attractie,type, melder, capaciteit,prioriteit,overige_info)VALUES(:attractie,:type ,:melder,:capaciteit ,:prioriteit,:overig)";

$statement=$conn->prepare($query);

$statement->execute([
    ":attractie"=>$attractie,
    ":type"=>$type,
    ":melder"=>$melder,
    ":capaciteit"=>$capaciteit,
    ":prioriteit"=>$prioriteit,
    ":overig"=>$overig,
]);

header(header: "Location: ../../../resources/views/meldingen/index.php?msg=Melding opgeslagen");