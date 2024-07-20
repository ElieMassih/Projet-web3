<?php
require_once '../../modules/ModuleCar.php';

$moduleCar = new ModuleCar();
$cars = $moduleCar->getCars();

?>
<html>
  <body>
    <style>
      img {
        height: 5cm;
      }
      .title {
        color: black !important;
      }
      #cars {
                margin-top: 70px;
      }
    </style>
<section class="bleu-section">
<?php include '../Header/header.php'; ?>
      <!-- Car Rental Section -->
      <div class="container" id="cars">
        <div class="title">Explore Our Car Rental Options</div>
        <div class="row justify-content-center">
          <?php foreach ($cars as $row) {?>
          <div class="col-md-3">
            <div class="card mb-3">
              <img src="<?php echo $row['CarPics'] ?>" class="card-img-top" alt="<?php echo $row['CarName'] ?>" />
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['CarName'] ?></h5>
                <p class="card-text">Type: <?php echo $row['CarType'] ?></p>
                <p class="card-text">Price: $<?php echo $row['PricePerDay'] ?>/day</p>
                <a href="#" class="btn btn-primary rent-now-btn"
                  data-car-name="<?php echo $row['CarName'] ?>"
                  data-car-type="Car"
                  data-car-description="$<?php echo $row['PricePerDay'] ?>"
                  data-user-id="<?php echo $_SESSION['userid'] ?>">Rent Now</a>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
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
