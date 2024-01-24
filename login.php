<?php 
  $username = "";
  $password ="";
  $err = "";

  include("config.php");
  if (isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username=='' or $password==''){
      $err .= "<li>Masukkan username & password</li>";
    }
    if(empty($err)){
      $sql1 = "SELECT * FROM user WHERE username='$username'";
      $q1 = mysqli_query($db, $sql1);
      $r1 = mysqli_fetch_array($q1);
      if($r1['password'] !=md5($password)){
        $err .= "<li>Akun Tidak ditemukan</li>";
      }
    }
  if (empty($err)){
      $_SESSION['admin_username'] = $username;
      header("Location: index.php");
      exit();
    }
  }
?>


<!DOCTYPE html>
<html>
<head>
  <title>Halaman Backend - Login</title>
  <link rel="stylesheet" href="css/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">DATA Mahasiswa</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link active text-sm-start text-center" aria-current="page" href="profil.html">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-md-4 text-white" href="index.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
  </header>

  <div id="app-login">
    <h1 class="hl">Halaman Login</h1>
      <?php
        if ($err){
          echo "<h3>$err</h3>";
        }
      ?>
    <form action="" method="post">
      <input type="text" value="<?php echo $username ?>" name="username" class="input" placeholder="username...">
      <br><br>
      <input type="password" name="password" class="input" placeholder="password...">
      <br><br>
      <input type="submit" name="login" value="Login">

    </form>
  </div>

</body>
</html>


