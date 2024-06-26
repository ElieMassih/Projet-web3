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
    <style>
        body{
            overflow-x: hidden;
        }
        a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
    <section class="bleu-section1">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.html">Travel Hub</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="features.html">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Attractions & Tours.html">Attractions & Tours</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown link</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="flight.html">Flights</a></li>
                                <li><a class="dropdown-item" href="hotel.html">Hotels</a></li>
                                <li><a class="dropdown-item" href="cars.html">Cars</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav navbar-right" style="list-style-type: none; display: flex; align-items: center; height: 50px;">
                    <li style="margin-right: 5px;">
                        <a href="login.html" style="color: white; text-decoration: none; font-size: medium; display: flex; align-items: center; height: 100%;">
                            <i class="fas fa-user-circle" style="margin-right: 5px; font-size: 24px;"></i> Login
                        </a>
                    </li>
                    <li>
                        <a href="signup.html" style="color: white; text-decoration: none; font-size: medium; display: flex; align-items: center; height: 100%;">
                            <i class="fas fa-sign-out-alt" style="margin-right: 5px; font-size: 24px;"></i> SignUp
                        </a>
                    </li>
                </ul>
        </nav>
        <div class="container text-center">
            <div class="row">
                <div class="col-4">Flights
                    <div><i class="fas fa-plane-departure"></i></div>
                </div>
                <div class="col-4">Hotels
                    <div><i class="fas fa-hotel"></i></div>
                </div>
                <div class="col-4">Cars Hire
                    <div><i class="fas fa-car"></i></div>
                </div>
            </div>
        </div>
        <div class="title">Travel Hub: Explore, Book, Journey!</div>
            <div class="row justify-content-center">
                <div class="col-lg-2 col-md-4 col-sm-6 text-center d-flex flex-column justify-content-between">
                    <div>
                        <h3 style="margin-bottom: 20px;">Destination Guides</h3>
                        <p>Explore our destination guides to discover top travel spots around the world.</p>
                    </div>
                    <div>
                        <a href="guides.html" class="btn btn-primary" style="margin-bottom: 20px; padding: 10px 20px;">View Guides</a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 text-center d-flex flex-column justify-content-between">
                    <div>
                        <h3 style="margin-bottom: 20px;">Hotel Recommendations</h3>
                        <p>Discover our top hotel recommendations for your next trip.</p>
                    </div>
                    <div>
                        <a href="hotel.html" class="btn btn-primary" style="margin-bottom: 20px; padding: 10px 20px;">Explore Hotels</a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 text-center d-flex flex-column justify-content-between">
                    <div>
                        <h3 style="margin-bottom: 20px;">Car Rental Options</h3>
                        <p>Find the perfect car rental for your journey with our wide selection of options.</p>
                    </div>
                    <div>
                        <a href="cars.html" class="btn btn-primary" style="margin-bottom: 20px; padding: 10px 20px;">Rent a Car</a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 text-center d-flex flex-column justify-content-between">
                    <div>
                        <h3 style="margin-bottom: 20px;">Flights <br> Search</h3>
                        <p>Search for flights to your desired destination and book your next adventure.</p>
                    </div>
                    <div>
                        <a href="flight.html" class="btn btn-primary" style="margin-bottom: 20px; padding: 10px 20px;">Search Flights</a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 text-center d-flex flex-column justify-content-between">
                    <div>
                        <h3 style="margin-bottom: 20px;">Travel <br> Insurance</h3>
                        <p>Protect your trip with travel insurance. Learn more about our coverage options.</p>
                    </div>
                    <div>
                        <a href="insurance.html" class="btn btn-primary" style="margin-bottom: 20px; padding: 10px 20px;">Get Insured</a>
                    </div>
                </div>
            </div>
                <img src="../../assets/plane2.jpg" alt="projet" class="image">
                    <div class="container1">
                        <div class="box-1">
                            <div class="accordion accordion-flush" id="accordionFlushExample1">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">What is a travel hub?</button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample1">
                                        <div class="accordion-body">Travel_Hubs are places that facilitate travel to multiple destinations. They could be airports, train stations, or ports which provide transportation between different points.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">What is a hub in travel and tourism?</button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample1">
                                        <div class="accordion-body">A tourism hub refers a location that serves as a central point for gathering and distributing tourists, transferring them to different destinations, and providing management and service functions.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">What is travel hosting?</button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample1">
                                        <div class="accordion-body">The host agency acts as an umbrella for travel agents that belong to their organization. All agents under the host will use the same booking number (ARC, IATA, CLIA, etc.) and will be seen by the vendors as one agency instead of a conglomeration of agencies.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">Why are hubs important for airlines?</button>
                                    </h2>
                                    <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample1">
                                        <div class="accordion-body">Airport hubs are geographically well positioned allowing airlines to facilitate efficient connections for passengers. These hubs serve as important transfer points, allowing travelers to each their desired destinations through connecting flights.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">What does "hub" mean?</button>
                                    </h2>
                                    <div id="flush-collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample1">
                                        <div class="accordion-body">a- Center of activity: Focal point. The island is a major tourist hub.<br>
                                            b- An airport or city through which an airline routes most of its traffic.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-2">
                            <div class="accordion accordion-flush" id="accordionFlushExample2">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">Does Travel_Hub do hotels too?</button>
                                    </h2>
                                    <div id="flush-collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample2">
                                        <div class="accordion-body">Yes! You can use the same magic that powers our flight search to find your perfect stay anywhere.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">What about car hire?</button>
                                    </h2>
                                    <div id="flush-collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample2">
                                        <div class="accordion-body">You can also use TravelHub to search for and compare cheap car hire in seconds, then pick up your wheels from the airport as soon as you touch down.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">What's a Price Alert?</button>
                                    </h2>
                                    <div id="flush-collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample2">
                                        <div class="accordion-body">If you set up a Price Alert, we'll watch the price of plane tickets for you, and let you know via email or push notification via the app if they rise or fall.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNine" aria-expanded="false" aria-controls="flush-collapseNine">Can I book a flexible flight ticket?</button>
                                    </h2>
                                    <div id="flush-collapseNine" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample2">
                                        <div class="accordion-body">We understand how important it is to have flexible holiday plans. Sometimes, you can pay an extra fee for an amendable airline ticket, so look out for this option as you book. You also look for hotels and car hire options with free cancellation, so you can book now and amend or even cancel later if you need to.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTen" aria-expanded="false" aria-controls="flush-collapseTen">Can I book flights that emit less CO2?</button>
                                    </h2>
                                    <div id="flush-collapseTen" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample2">
                                        <div class="accordion-body">Yes—since we began showing carbon emission info on flights where it's available, over 100 million travellers have found a plane ticket with lower emissions for their route.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <footer class="text-center text-lg-start bg-body-tertiary text-muted" id="footer">
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <div class="me-5 d-none d-lg-block">
                    <span>Get connected with us on social networks!</span>
                </div>
                <div>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-facebook-f"></i></a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-twitter"></i></a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-instagram"></i></a>
                    <a href="https://www.google.com/" class="me-4 text-reset">
                        <i class="fab fa-google"></i></a>
                </div>
            </section>
            <section >
                <div class="container text-center text-md-start mt-5">
                    <div class="row mt-3">
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>From Travel Hub</h6>
                            <p>"Travel Hub is a leading travel agency that connects travelers to travel agents, professionals, and tour agencies to best match their travel needs."</p>
                        </div>
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">Products</h6>
                            <p><a href="guest-house.html" class="text-reset">Guest House</a></p>
                            <p><a href="hotel.html" class="text-reset">Hotels</a></p>
                            <p><a href="flight.html" class="text-reset">Flights</a></p>
                            <p><a href="cars.html" class="text-reset">Cars Hire</a></p>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">Useful links</h6>
                            <p><a href="Attractions & Tours.html" class="text-reset">Attractions & Tours</a></p>
                            <p><a href="#!" class="text-reset">Settings</a></p>
                            <p><a href="#!" class="text-reset">Orders</a></p>
                            <p><a href="#!" class="text-reset">Help</a></p>
                        </div>
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                            <p><i class="fas fa-home me-3"></i>Lebanon</p>
                            <p><i class="fas fa-envelope me-3"></i><a href="#">travel_hub@gmail.com</a></p>
                            <p><i class="fas fa-phone me-3"></i> +961 01 234 567 </p>
                            <p><i class="fas fa-print me-3"></i> +961 01 234 577 </p>
                        </div>
                    </div>
                </div>
            </section>
        </footer>
    </section>
</body>
</html>
