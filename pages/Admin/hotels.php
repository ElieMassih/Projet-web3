<?php
require_once '../../modules/ModuleHotel.php';
include_once  "../../utils/functions.php";

$moduleHotel = new ModuleHotel();
$hotels = $moduleHotel->getHotels();

?>
<html>
    <style>
        .main-content{
            margin-top: 50px;
        }
    </style>
    <body>
    <?php include '../Header/header.php'; ?>
    <div>
    <?php include './sidebar.php'; ?>
    </div>
    <div class="main-content">
        <h1>Hotels</h1>
        
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addHotelModal">
            Add Hotel
        </button>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Hotel Name</th>
                    <th scope="col">Hotel description</th>
                    <th scope="col">Price per night</th>
                    <th scope="col">Hotel pics</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $row) { 
                    $row_uuid = guidv4();
                    ?>
                    <tr>
                        <td class="hotelId"><?= $row['HotelId'] ?></td>
                        <td class="hotelname"><?= $row['HotelName'] ?></td>
                        <td class="hotelDescription"><?= $row['HotelDescription'] ?></td>
                        <td class="pricePerNight"><?= $row['PricePerNight'] ?></td>
                        <td class="hotelPics"><?= $row['HotelPics'] ?></td>
                        <td>
                            <button class="btn btn-success btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#editHotelModal" data-hotel-id="<?= $row['HotelId'] ?>" data-name="<?= $row['HotelName'] ?>" data-description="<?= $row['HotelDescription'] ?>" data-price="<?= $row['PricePerNight'] ?>" data-pics="<?= $row['HotelPics'] ?>">Edit</button>
                            <button class="btn btn-danger btn-sm btn-delete" data-bs-toggle="modal" data-bs-target="#deleteHotelModal" data-hotel-id="<?= $row['HotelId'] ?>">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Add Hotel Modal -->
        <div class="modal fade" id="addHotelModal" tabindex="-1" aria-labelledby="addHotelModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addHotelModalLabel">Add Hotel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="hotelName" class="form-label">Hotel Name</label>
                                <input type="text" class="form-control" id="hotelName" required>
                            </div>
                            <div class="mb-3">
                                <label for="hotelDescription" class="form-label">Hotel Description</label>
                                <input type="text" class="form-control" id="hotelDescription" required>
                            </div>
                            <div class="mb-3">
                                <label for="pricePerNight" class="form-label">Price Per Night</label>
                                <input type="text" class="form-control" id="pricePerNight" required>
                            </div>
                            <div class="mb-3">
                                <label for="hotelPics" class="form-label">Hotel Pics</label>
                                <input type="text" class="form-control" id="hotelPics" required>
                            </div>
                            <button onclick="addHotel()" type="submit" class="btn btn-primary">Add Hotel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Hotel Modal -->
        <div class="modal fade" id="editHotelModal" tabindex="-1" aria-labelledby="editHotelModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editHotelModalLabel">Edit Hotel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editHotelForm">
                            <div class="mb-3">
                                <label for="editHotelId" class="form-label">Hotel ID</label>
                                <input type="text" class="form-control" id="editHotelId" name="editHotelId" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="editHotelName" class="form-label">Hotel name</label>
                                <input type="text" class="form-control" id="editHotelName" name="editHotelName" required>
                            </div>
                            <div class="mb-3">
                                <label for="editHotelDescription" class="form-label">Hotel Description</label>
                                <input type="text" class="form-control" id="editHotelDescription" name="editHotelDescription" required>
                            </div>
                            <div class="mb-3">
                                <label for="editPrice" class="form-label">Price Per Night</label>
                                <input type="text" class="form-control" id="editPrice" name="editPrice" required>
                            </div>
                            <div class="mb-3">
                                <label for="editPics" class="form-label">Hotel Pics</label>
                                <input type="text" class="form-control" id="editPics" name="editPics">
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Hotel Modal -->
        <div class="modal fade" id="deleteHotelModal" tabindex="-1" aria-labelledby="deleteHotelModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteHotelModalLabel">Delete Hotel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this hotel?</p>
                        <input type="hidden" id="deleteHotelId">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmDelete">Delete Hotel</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="hotel.js"></script>
    </body>
</html>