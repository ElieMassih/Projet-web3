<?php
require_once '../../modules/ModuleAttraction.php';

$moduleAttraction = new ModuleAttraction();
$attractions = $moduleAttraction->getAttractions();

?>
<html>
<head>
    <style>
        .card {
            height: 100%;
        }
        .card-img-top {
            height: 200px; 
            object-fit: cover; 
        }
        .card-hover {
            transition: transform 0.3s ease-in-out;
        }
        .card-hover:hover {
            transform: scale(1.05);
        }
        .row{
            margin: 30px;
        }
        .card-text b {
            color: #007bff; /* Bold text color */
        }
        #attractions {
                margin-top: 70px;
        }
        a{
            text-decoration: none;
        }
        img{
            height: 7cm;
        }
    </style>
</head>

<body>
<?php include '../Header/header.php'; ?>
    <section class="top-attractions-section" id="attractions">
        <div class="container">
            <h2 style="text-align: center; margin: 40px;">Top Attraction Tours</h2>
            <div class="row">
                <?php foreach ($attractions as $row) { ?>
                <div class="col-md-3 mb-4">
                    <div class="card card-hover"
                    data-name="<?php echo $row['AttractionName'] ?>" 
                         data-description="<?php echo $row['AttractionDescription'] ?>" 
                         data-rating="<?php echo $row['AttractionRating'] ?>" 
                         data-reviews="<?php echo $row['AttractionReviews'] ?>" 
                         data-price="<?php echo $row['AttractionPrice'] ?>">
                        <img src="<?php echo $row['AttractionPics'] ?>" class="card-img-top" alt="<?php echo $row['AttractionName'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['AttractionName'] ?></h5>
                            <p class="card-text"><br> <b>Rating:</b> <?php echo $row['AttractionRating'] ?> / 5 <br> <b>Reviews:</b> <?php echo $row['AttractionReviews'] ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>        

    <div class="modal fade" id="attractionModal" tabindex="-1" aria-labelledby="attractionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="attractionModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="attractionModalBody">
                    <!-- Content will be dynamically populated -->
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap JavaScript (with jQuery) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        $('.card').click(function() {
            var name = $(this).data('name');
            var description = $(this).data('description');
            var rating = $(this).data('rating');
            var reviews = $(this).data('reviews');
            var price = $(this).data('price');

            // Update modal content
            $('#attractionModalLabel').text(name);
            $('#attractionModalBody').html(`
                <p>Description: ${description}</p>
                <p>Rating: ${rating}</p>
                <p>Reviews: ${reviews}</p>
                <p>Price: $${price}</p>
                <button type="button" class="btn btn-primary" id="bookNowBtn">Book Now</button>
            `);

            $('#attractionModal').modal('show');
        });

        // // Add click event for the dynamically generated "Book Now" button
        // $(document).on('click', '#bookNowBtn', function() {
        //     // Get the price of the attraction
        //     var price = $(this).siblings('p').filter(':contains("Price:")').text().trim().split('$')[1];
            
        //     // Store the price in session storage
        //     sessionStorage.setItem('selectedAttractionPrice', price);
            
        //     // Redirect to the booking page
        //     window.location.href = "booking-page.html";
        // });
    });
</script>


</body>
</html>

