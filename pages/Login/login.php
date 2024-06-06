<?php
 require("../../auth/login_guard.php");
 include_once("../../utils/alerts.php");

 if (isset($_SESSION['userid'])) {
  header("Location: ../Home/home.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../../style.css">
    <style>
      body {
        padding: 0;
        margin: 0;
      }

      .vid-container {
        position: relative;
        height: 100vh;
        overflow: hidden;
      }

      .bgvid {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .inner-container {
        width: 90%;
        max-width: 400px;
        height: 400px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        overflow: hidden;
      }

      .box {
        position: absolute;
        height: 100%;
        width: 100%;
        color: #fff;
        background: rgba(0, 0, 0, 0.13);
        padding: 30px 0px;
      }

      .box h1 {
        text-align: center;
        margin: 30px 0;
        font-size: 30px;
      }

      .box input {
        display: block;
        width: 80%;
        max-width: 300px;
        margin: 20px auto;
        padding: 10px;
        background: white;
        color: black;
        border: 0;
      }

      .box button {
        background: #1e88e5;
        border: 0;
        border-radius: 8px;
        color: #fff;
        padding: 10px;
        font-size: 18px;
        width: 80%;
        max-width: 330px;
        margin: 20px auto;
        display: block;
        cursor: pointer;
      }

      .box p {
        font-size: 14px;
        text-align: center;
      }
    </style>
    <script src="../../js/alerts.js"></script>
</head>
<body>
  <div class="vid-container">
    <?php
    if (isset($data['isLoginSuccess'])) {
      displayAlert("invalid-login", "Invalid Login!", "Username/Email or Password incorrect", "error", 2);
    }
    ?>
    <video class="bgvid" autoplay muted preload="auto" loop>
        <source src="./assets/dady.mp4" type="video/mp4">
        <source src="./assets/dady.webm" type="video/webm">
        <source src="./assets/dady.ogv" type="video/ogg">
    </video>
    <div class="inner-container">
      <div class="box">
        <h1>Login</h1>
        <form id="login" name="login" action="" method="POST">
          <input type="text" name="username" placeholder="Username or email" id="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" required/>
          <input type="password" id="password" name="password" placeholder="Password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" required/>
          <button type="submit">Login</button>
        </form>
        <p>Not a member? <a href="../Register/register.php" style="color: whitesmoke; text-decoration: none;">SignUp</a></p>
      </div>
    </div>
  </div>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <script src="login.js"></script>
</body>
</html>
