<?php
require_once '../../modules/ModuleGuide.php';

$moduleGuide = new ModuleGuide();
$guides = $moduleGuide->getGuides();
?>
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
        <link rel="stylesheet" href="style.css">
        <style>
            img{
                height: 7cm;
            }
            /* .bleu-section{
                height: 5020px;
                background-color: white !important;
                overflow-x: hidden;
            } */
            .navbar{
                background-color: white !important;
                color: black !important;
            }
            .navbar .nav-link{
                color: black !important;
            }
            .navbar .navbar-toggler-icon{
                color: black !important;
            }
            .navbar-brand{
                color: black !important;
            }

            #countryCard {
                margin-top: 50px;
            }
            a{
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <section class="bleu-section">
        <?php include '../Header/header.php'; ?>
            <div class="row row-cols-1 row-cols-md-3 g-4" id="countryCard">
                <?php
                foreach($guides as $row) { 
                ?>
                <div class="col" id="<?php echo $row['GuideId']?>">
                    <a href="#"><div class="card h-10">
                    <img src="<?php echo $row['GuidePics']?>" class="card-img-top" alt="<?php echo strtoupper($row['GuideName']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['GuideName'] ?></h5>
                        <p class="card-text">Destination flights</p>
                    </div>
                    </div></a>
                </div>
                <?php } ?>
            </div>
        </section>
    </body>
</html>