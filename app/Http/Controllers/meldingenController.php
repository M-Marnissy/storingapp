<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];
$type = $_POST['type'];


echo $attractie . " / " . $capaciteit . " / " . $melder;

//1. Verbinding
require_once '../../../config/conn.php';

//2. Query
$query="INSERT INTO meldingen(attractie,type, melder, capaciteit, prioriteit)VALUES(:attractie,:type ,:melder, :capaciteit, :prioriteit)";

//3. Prepare
$statement = $conn->prepare($query);

//4. Execute
$statement->execute([
    ":attractie" => $attractie,
    ":type"=>$type,
    ":melder" => $melder,
    ":capaciteit"=>$capaciteit,
    ":prioriteit"=>$prioriteit,
]);

header(header: "Location: ../../../resources/views/meldingen/index.php?msg=Melding opgeslagen");