<?php require_once __DIR__.'/../../../config/config.php'; ?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen</title>
    <?php require_once __DIR__.'/../components/head.php'; ?>
</head>

<body>

    <?php require_once __DIR__.'/../components/header.php'; ?>

    <div class="container">
        <h1>Meldingen</h1>
        <a href="create.php">Nieuwe melding &gt;</a>

        <?php if(isset($_GET['msg'])){
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        } ?>

        <div style="background: #ededed;">
        <?php
        require_once '../../../config/conn.php';
        $query = "SELECT * FROM meldingen";
        $statement = $conn->prepare($query);
        $statement->execute();
        $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($meldingen as $melding) {
            echo "<h1>" . $melding['attractie'] . "<h1>";

        } 
        ?>
        
    </div>

    <?php 
    require_once 'conn.php';

    ?>

</body>

</html>
