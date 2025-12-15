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
    <title>Pusnkats Brigādes veikals</title>
    <link rel="stylesheet" href="css/veikals.css">
    <link rel="icon" type="image/x-icon" href="bildes/logo.png">
</head>

<body>
    <div class="nav">
        <div class="logo">
        <img src="bildes/logo.png" alt="PB logo" style="width:70px; height:auto;">
        </div>
       
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
        <a href="reg.php">
            <button type="button" class="reg">Reģistrēšanās</button>
        </a>
        

    </div>

    <div class="galvenais">
        <div class="nosaukums">
        <h1>Sveiks <?php echo $_SESSION['user']; ?></h1>
        </div>
    </div>

        


</body>

</html>