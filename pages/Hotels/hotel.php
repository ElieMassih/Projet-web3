<!DOCTYPE html>
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
      <section class="search-form">
        <div class="container2">
          <h2 style="text-align: center; color: black">Hotel Booking</h2>
          <div id="searchSection">
            <form id="searchForm">
              <div class="form-group">
                <input type="text" class="form-control" id="destination" placeholder="Destination" required/>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="checkInDate" placeholder="Check-in Date" required/>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="checkOutDate" placeholder="Check-out Date" required/>
              </div>
              <div class="form-group">
                <input type="number" class="form-control" id="guests" placeholder="Number of guests" required/>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="number" class="form-control" id="priceRangeMin" placeholder="Min price (optional)"/>
                </div>
                <div class="form-group col-md-6">
                  <input type="number" class="form-control" id="priceRangeMax" placeholder="Max price (optional)"/>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="amenities" placeholder="Amenities (optional)"/>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Search</button>
            </form>
          </div>
          <div id="results" style="display: none"></div>
        </div>
      </section>
      <section class="hotels-section">
        <div class="container">
          <h2 style="color: black; text-align: center; margin: 50px">Hotels</h2>
          <div class="row">
            <!-- Hotel Card 1 -->
            <div class="col-md-4">
              <div class="card hotel-card">
                <img src="assets/hotel1.jpg" class="card-img-top hotel-img" alt="Hotel 1"/>
                <div class="card-body hotel-info">
                  <h5 class="card-title hotel-title">Sea Breeze Resort</h5>
                  <p class="card-text hotel-description"> A cozy beachfront retreat with stunning ocean views.</p>
                  <p class="hotel-price">$150/night</p>
                  <!-- Updated Book Now link with price as query parameter -->
                  <a href="Hotel Booking.html?price=150" class="btn btn-primary">Book Now</a>
                </div>
              </div>
            </div>
            <!-- Hotel Card 2 -->
            <div class="col-md-4">
              <div class="card hotel-card">
                <img src="assets/hotel2.jpg" class="card-img-top hotel-img" alt="Hotel 2"/>
                <div class="card-body hotel-info">
                  <h5 class="card-title hotel-title"> City Lights Hotel & Spa</h5>
                  <p class="card-text hotel-description"> A luxurious urban escape in the heart of the city with panoramic skyline views.</p>
                  <p class="hotel-price">$250/night</p>
                  <!-- Updated Book Now link with price as query parameter -->
                  <a href="Hotel Booking.html?price=250" class="btn btn-primary">Book Now</a>
                </div>
              </div>
            </div>
            <!-- Hotel Card 3 -->
            <div class="col-md-4">
              <div class="card hotel-card">
                <img src="assets/hotel3.jpg" class="card-img-top hotel-img" alt="Hotel 3"/>
                <div class="card-body hotel-info">
                  <h5 class="card-title hotel-title">Bellagio Hotel & Casino</h5>
                  <p class="card-text hotel-description">Bellagio Las Vegas, enjoy a high caliber resort experience right on the Las Vegas .</p>
                  <p class="hotel-price">$100/night</p>
                  <!-- Updated Book Now link with price as query parameter -->
                  <a href="Hotel Booking.html?price=100" class="btn btn-primary">Book Now</a>
                </div>
              </div>
            </div>
            <!-- Hotel Card 4 -->
            <div class="col-md-4">
              <div class="card hotel-card">
                <img src="assets/hotel4.jpg" class="card-img-top hotel-img" alt="Hotel 4"/>
                <div class="card-body hotel-info">
                  <h5 class="card-title hotel-title">LAUR HOTELS Experience</h5>
                  <p class="card-text hotel-description">LAUR HOTELS Experience & Elegance is located along the beach of Altinkum.</p>
                  <p class="hotel-price">$170/night</p>
                  <!-- Updated Book Now link with price as query parameter -->
                  <a href="Hotel Booking.html?price=170" class="btn btn-primary">Book Now</a>
                </div>
              </div>
            </div>
            <!-- Hotel Card 5 -->
            <div class="col-md-4">
              <div class="card hotel-card">
                <img src="assets/hotel5.jpg" class="card-img-top hotel-img" alt="Hotel 5"/>
                <div class="card-body hotel-info">
                  <h5 class="card-title hotel-title">Taj Hotels</h5>
                  <p class="card-text hotel-description">Experience a haven of luxury and comfort.Nestled in a vibrant cityscape.</p>
                  <p class="hotel-price">$70/night</p>
                  <!-- Updated Book Now link with price as query parameter -->
                  <a href="Hotel Booking.html?price=70" class="btn btn-primary">Book Now</a>
                </div>
              </div>
            </div>
            <!-- Hotel Card 6 -->
            <div class="col-md-4">
              <div class="card hotel-card">
                <img src="assets/hotel6.jpg" class="card-img-top hotel-img" alt="Hotel 6"/>
                <div class="card-body hotel-info">
                  <h5 class="card-title hotel-title">Virgin Hotels</h5>
                  <p class="card-text hotel-description">Experience the epitome of luxury and sophistication at Virgin Hotels.</p>
                  <p class="hotel-price">$300/night</p>
                  <!-- Updated Book Now link with price as query parameter -->
                  <a href="Hotel Booking.html?price=300" class="btn btn-primary">Book Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  </body>
</html>
