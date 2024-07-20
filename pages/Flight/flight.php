<?php
require_once '../../modules/ModuleFlight.php';

$moduleFlight = new ModuleFlight();
$flights = $moduleFlight->getFlights();
?>
<html lang="en">
  <head>
    <style>
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      body {
        display: flex;
        flex-direction: column;
      }

      form {
        max-width: 400px;
        height: 400px;
        margin: 0 auto;
        margin-top: 0px;
        margin-bottom: 0;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 0px;
      }

      .flights-section {
        padding: 50px 0;
        text-align: center;
      }

      .flights-section .container {
        max-width: 600px;
        margin: 0 auto;
      }

      .flights-section .title {
        font-size: 24px;
        margin-bottom: 20px;
      }

      .flights-section .form-control {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
      }

      .flights-section .btn {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        cursor: pointer;
      }

      .flights-section .btn:hover {
        background-color: #0056b3;
      }

      .featured-destinations-section {
        background-color: #f9f9f9;
        padding: 50px 0;
        text-align: center;
      }

      .featured-destinations-section h2 {
        font-size: 24px;
        margin-bottom: 20px;
      }

      .featured-destinations-section p {
        font-size: 52px;
        margin-bottom: 40px;
      }
    </style>
  </head>
  <body>
    <section class="bleu-section">
    <?php include '../Header/header.php'; ?>
      <section class="flights-section">
        <div class="container">
            <div class="title mb-8"><h2>Explore Our Featured Destinations</h2></div>
            <p>Discover amazing travel destinations around the world</p>
        </div>
      </section>
      <?php foreach ($flights as $row) {?>
          <div class="col-md-3">
            <div class="card mb-3">
              <img src="<?php echo $row['FlightPics'] ?>" class="card-img-top" alt="<?php echo $row['Destination'] ?>" />
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['Destination'] ?></h5>
                <p class="card-text">Start Date: <?php echo $row['StartDate'] ?></p>
                <p class="card-text">End Date: <?php echo $row['EndDate'] ?></p>
                <p class="card-text">Price: $<?php echo $row['Price'] ?></p>
                <a href="#" class="btn btn-primary rent-now-btn"
                  data-car-name="<?php echo $row['Destination'] ?>"
                  data-car-type="Flight"
                  data-car-description="$<?php echo $row['Price'] ?>"
                  data-user-id="<?php echo $_SESSION['userid'] ?>">Book Now</a>
              </div>
            </div>
          </div>
          <?php } ?>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
      $(document).ready(function() {
          $('.rent-now-btn').on('click', function(e) {
              e.preventDefault();

              var add_params = {
                  bookingName: $(this).data('car-name'),
                  bookingType: $(this).data('car-type'),
                  bookingDescription: $(this).data('car-description'),
                  userId: $(this).data('user-id')
              };

              $.ajax({
              type: "POST",
              url: "../../modules/ModuleBooking.php",
              data: {
                action: "add",
                params: add_params,
              },
              success: function (response) {
                console.log(response);
              },
            });
          });
      });
      </script>
  
  </body>
</html>
