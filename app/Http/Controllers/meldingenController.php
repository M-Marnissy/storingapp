<?php

$action = $_POST['action'];

if($action == 'create'){
    //Variabelen vullen
    $attractie = $_POST['attractie'];
    $capaciteit = $_POST['capaciteit'];
    $melder = $_POST['melder'];
    $type = $_POST['type'];
    $overig = $_POST['overig'];
    
    if (isset($_POST['prioriteit'])){
        $prioriteit = 1;
    }
    else{
        $prioriteit = 0;
    }
    
    
    //1. Verbinding
    require_once '../../../config/conn.php';
    
    //2. Query
    $query = "INSERT INTO meldingen (attractie, capaciteit, type, melder, prioriteit, overige_info) 
VALUES (:attractie, :capaciteit, :type, :melder, :prioriteit, :overig)";
//3. Prepare
$statement = $conn->prepare($query);
//4. Execute
$statement->execute([
    ":attractie" => $attractie,
    ":type" => $type,
    ":melder" => $melder,
    ":capaciteit" => $capaciteit,
    ":prioriteit" => $prioriteit,
    ":overig" => $overig
]);

header("Location: ../../../resources/views/meldingen/index.php?msg=Melding opgeslagen");
}


if ($action == 'update'){
    // voer deze code uit als action update is.
    //voer deze code uit als action update is

    $id = $_POST['id'];
    $capaciteit = $_POST['capaciteit'];
    $melder = $_POST['melder'];
    $overig = $_POST['overig'];

    if (isset($_POST['prioriteit'])) {
        $prioriteit = 1;
    } else {
        $prioriteit = 0;
    }
    //1. Verbinding
    require_once '../../../config/conn.php';

//2. Query
    $query = "
        UPDATE meldingen
        SET capaciteit = :capaciteit,
            melder = :melder,
            overige_info = :overig,
            prioriteit = :prioriteit
        WHERE id = :id
    ";

//3. Prepare
    $statement = $conn->prepare($query);

//4. Execute
    $statement->execute([
        ":melder" => $melder,
        ":capaciteit" => $capaciteit,
        ":prioriteit" => $prioriteit,
        ":overig" => $overig,
        ":id" => $id
    ]);
    header("Location: ../../../resources/views/meldingen/index.php?msg=Melding aangepast");
}

if ($action == 'delete'){
    // voer deze code uit als action delete is.
    $id = $_POST['id'];

    require_once '../../../config/conn.php';
    
    //2. Query
    $query = "DELETE FROM meldingen WHERE id = :id";
    //3. Prepare
    $statement = $conn->prepare($query);
    //4. Execute
    $statement->execute([
        ":id" => $id
    ]);

    header("Location: ../../../resources/views/meldingen/index.php?msg=Melding verwijderd");
}