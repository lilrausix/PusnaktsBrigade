<?php require("reg.class.php")?>
<?php 
  if(isset($_POST['submit'])){
    $user = new RegisterUser($_POST['username'], $_POST['password']);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reģistrēšanās</title>
    <link rel="stylesheet" href="css/reg.css">
    <link rel="icon" type="image/x-icon" href="bildes/logo.png">

</head>
<body>
    <div class="nav">
        <div class="logo">
        <img src="bildes/logo.png" alt="PB logo" style="width:50px; height:auto;">
        </div>
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
        <a href="reg.php">
            <button type="button">Reģistrēšanās</button>
        </a>
        </div>

    </div>

    <div class="wrapper">
    <h2>Reģistrēšanās</h2>
    <form action="" method="post" enctype="multipart/form-data" autocompleate="off">
      <div class="input-box">
        <input type="text" name="username" placeholder="Ievadi savu lietotājvārdu" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Izveido paroli" required>
      </div>
      <div class="policy">
        <input type="checkbox">
        <h3>Es piekrītu visiem noteikumiem un nosacījumiem</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" name="submit" value="Reģistrēties tagad">
      </div>
      <div class="text">
        <h3>Tev jau ir konts? <a href="ienakt.php">Ieiet</a></h3>
      </div>
    <p class="error"><?php echo @$user->error ?></p>
    <p class="success"><?php echo @$user->success ?></p>
    </form>
  </div>
    
</body>
</html>

