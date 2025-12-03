<?php 
    session_start();
    if(!isset($_SESSION['user'])){
        header("location: ienakt.php"); exit();
    }

    if(isset($_GET['logout'])){
        unset($_SESSION['user']);
        header("location: ienakt.php"); exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profils</title>
    <link rel="stylesheet" href="css/account.css">
    <link rel="icon" type="image/x-icon" href="bildes/logo.png">
</head>
<body>
<div class="nav">
        <div class="logo">
        <img src="bildes/logo.png" alt="PB logo" style="width:50px; height:auto;">
        </div>
        <h2>Sveiks <?php echo $_SESSION['user']; ?></h2>
        <div class="pogas">
        <a href="index.php">
            <button type="button">Sākums</button>
        </a>
        <a href="parmums.php">
            <button type="button">Par mums</button>
        </a>
        <a href="kontakti.php">
        <button type="button">Kontakti</button>
        </a>
        <a href="veikals.php">
            <button type="button">Veikals</button>
        </a>
        <a href="index.php">
            <button type="button">Iziet</button>
        </a>

    </div>





</body>
</html>