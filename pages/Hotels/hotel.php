<?php
require_once '../../modules/ModuleHotel.php';

$moduleHotel = new ModuleHotel();
$hotels = $moduleHotel->getHotels();

?>
<html>
  <head>
    <style>
      .hotel-card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 30px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
      }
      .hotel-card:hover {
        transform: translateY(-5px);
      }
      .hotel-img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        border-radius: 10px 10px 0 0;
      }
      .hotel-info {
        padding: 20px;
      }
      .hotel-title {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 10px;
      }
      .hotel-description {
        font-size: 1rem;
        margin-bottom: 15px;
      }
      .hotel-price {
        font-size: 1.25rem;
        font-weight: bold;
        color: #007bff;
      }
      body {
        background-color: white;
      }
      .container {
        position: relative;
      }
      .image1 {
        width: 85%; /* Set the width to 85% */
        height: 15cm;
        margin-left: 7.5%; /* Adjust margins accordingly */
        margin-right: 7.5%;
        margin-top: 2%;
        margin-bottom: 2%;
      }
      .text {
        position: absolute;
        top: 45%;
        left: 17%;
        transform: translate(0, -50%);
        color: white;
        font-size: 50px;
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      }
      .container2 {
        max-width: 500px;
        margin: 50px auto;
        padding: 30px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      #results {
        margin-top: 20px;
      }
      /* Centering the form */
      .form-group {
        margin-bottom: 15px;
      }
      .btn {
        margin-top: 20px;
      }
      a:hover {
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    <section class="bleu-section">
    <?php include '../Header/header.php'; ?>
    </section>
        <section>
        <div>
          <img src="../../assets/HOTEL.jpg" alt="hotel" class="image1" />
          <div class="text">Find the right hotel today</div>
        </div>
      </section>
      <section class="hotels-section">
        <div class="container">
          <h2 style="color: black; text-align: center; margin: 50px">Hotels</h2>
          <div class="row">
             <?php foreach ($hotels as $row) {?>
            <div class="col-md-4">
              <div class="card hotel-card">
                <img src="<?php echo $row['HotelPics'] ?>" class="card-img-top hotel-img" alt="<?php echo $row['HotelName'] ?>"/>
                <div class="card-body hotel-info">
                  <h5 class="card-title hotel-title"><?php echo $row['HotelName'] ?></h5>
                  <p class="card-text hotel-description"> <?php echo $row['HotelDescription'] ?></p>
                  <p class="hotel-price">$<?php echo $row['PricePerNight'] ?>/night</p>
                  <a href="#" class="btn btn-primary rent-now-btn"
                  data-car-name="<?php echo $row['HotelName'] ?>"
                  data-car-type="Hotel"
                  data-car-description="$<?php echo $row['PricePerNight'] ?>"
                  data-user-id="<?php echo $_SESSION['userid'] ?>">Book Now</a>
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
