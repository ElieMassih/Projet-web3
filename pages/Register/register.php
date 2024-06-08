<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
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
        width: 80%;
        max-width: 400px;
        height: 640px;
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
</head>
<body>
  <div class="vid-container">
    <video class="bgvid" autoplay="autoplay" muted="muted" preload="auto" loop>
        <source src="../../assets/dady.mp4">
    </video>
        <div class="inner-container">
            <div class="box">
                <h1>Create an account</h1>
                <input type="text" id="fullname" placeholder="Fullname"/>
                <input type="text" id="username" placeholder="Username"/>
                <input type="text" id="email" placeholder="Email"/>
                <input type="text" id="password" placeholder="Password"/>
                <input type="text" id="confirmpass" placeholder="Repeat Your Password"/>
                    <div class="form-check d-flex justify-content-center mb-5">
                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" style="width: 0px; padding: 8px; margin: 5px;"/>
                        <label class="form-check-label" for="form2Example3cg">I agree all statements in <a href="#" style="text-decoration: none;">Terms of service</a></label>
                    </div>
                <button onclick="addUser()">Register</button>
                <p>Have already an account? <a href="login.html" style="color: whitesmoke; text-decoration: none;">Login here</a></p>
            </div>
        </div>
    </div>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="register.js"></script>
</body>
</html>

