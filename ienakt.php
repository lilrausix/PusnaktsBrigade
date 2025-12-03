<?php require("ienakt.class.php")?>
<?php 
  if(isset($_POST['submit'])){
    $user = new LoginUser($_POST['username'], $_POST['password']);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ienākt</title>
    <link rel="stylesheet" href="css/ienakt.css">
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
    <h2>Ienākt</h2>
    <form action="" method="post" enctype="multipart/form-data" autocompleate="off">
      <div class="input-box">
        <input type="text" name="username" placeholder="lietotājvārds" required>
      </div>

      <div class="input-box">
        <input type="password" name="password" placeholder="parole" required>
      </div>
      <div class="input-box button">
        <input type="Submit" name="submit" value="Ienākt">
      </div>

      <p class="error"><?php echo @$user->error ?></p>
    <p class="success"><?php echo @$user->success ?></p>
      
    </form>
  </div>
    
</body>
</html>