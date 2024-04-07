<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp</title>
    <?php require_once 'resources/views/components/head.php'; ?>
</head>

<body>

    <?php require_once 'resources/views/components/header.php'; ?>

    <div class="container home">
        <form action="app/Http/Controllers/loginController.php" method="POST">
            <div class="form-group">
                <label for="username">Gebruikersnaam</label>
                <input type="text" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="password">wachtwoord</label>
                <input type="password" name="password" id="password">
            </div>

            <input type="submit" value="inloggen">
        </form>
    </div>