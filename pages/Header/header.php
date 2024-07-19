<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.fontawesome.com/releases/v6.0.0-beta1/js/all.js" integrity="sha384-X3IEo5PLmJXYVMSUNA2Kzwcgk7uHkGdavBv34rDaklZo+nDXZIveE6PWNKdYgj7r" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../Home/home.php">Travel Hub</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Features/features.php">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Attractions&Tours/Attractions&Tours.php">Attractions & Tours</a>
                    </li>
                    <?php
                    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../Admin/admin.php">Admin</a>
                    </li>
                    <?php
                    } 
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown link</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../Flight/flight.php">Flights</a></li>
                            <li><a class="dropdown-item" href="../Hotels/hotel.php">Hotels</a></li>
                            <li><a class="dropdown-item" href="../Cars/cars.php">Cars</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <ul class="nav navbar-nav navbar-right" style="list-style-type: none; display: flex; align-items: center; height: 50px;">
            <?php if (isset($_SESSION['userid'])) { 
                 $initial = strtoupper($_SESSION['fullname'][0]);
                 ?>
                 <li style="margin-right: 5px;">
                    <div class="profile-circle" id="profileCircle" onclick="toggleDropdown()" style="background-color: gray; color: white; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                        <?php echo $initial; ?>
                    </div>
                    <div class="dropdown-menu" id="profileDropdown" style="position: absolute; left: 90%">
                            <a class="dropdown-item" href="../Login/logout.php">Sign Out</a>
                        </div>
                </li>
                <?php } else { ?> 
                <li style="margin-right: 5px;">
                    <a href="../Login/login.php" style="color: white; text-decoration: none; font-size: medium; display: flex; align-items: center; height: 100%;">
                        <i class="fas fa-user-circle" style="margin-right: 5px; font-size: 24px;"></i> Login
                    </a>
                </li>
                <li>
                    <a href="../Register/register.php" style="color: white; text-decoration: none; font-size: medium; display: flex; align-items: center; height: 100%;">
                        <i class="fas fa-sign-out-alt" style="margin-right: 5px; font-size: 24px;"></i> SignUp
                    </a>
                </li>
                <?php } ?>
            </ul>  
        </div>
    </nav>
    <script>
        function toggleDropdown() {
        var dropdown = document.getElementById("profileDropdown");
        if (dropdown.style.display === "none" || dropdown.style.display === "") {
            dropdown.style.display = "block";
        } else {
            dropdown.style.display = "none";
        }
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function (event) {
        if (!event.target.matches(".profile-circle")) {
            var dropdowns = document.getElementsByClassName("dropdown-menu");
            for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.style.display === "block") {
                openDropdown.style.display = "none";
            }
            }
        }
        };
    </script>
</body>
</html>
