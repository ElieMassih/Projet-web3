<?php
require_once '../../modules/ModuleFlight.php';
include_once  "../../utils/functions.php";

$moduleFlight = new ModuleFlight();
$flights = $moduleFlight->getFlights();

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
        <h1>Flights</h1>
        
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFlightModal">
            Add Flights
        </button>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Price</th>
                    <th scope="col">FlightPics</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($flights as $row) { 
                    $row_uuid = guidv4();
                    ?>
                    <tr>
                        <td class="flightId"><?= $row['FlightId'] ?></td>
                        <td class="destination"><?= $row['Destination'] ?></td>
                        <td class="startDate"><?= $row['StartDate'] ?></td>
                        <td class="endDate"><?= $row['EndDate'] ?></td>
                        <td class="price"><?= $row['Price'] ?></td>
                        <td class="flightPics"><?= $row['FlightPics'] ?></td>
                        <td>
                            <button class="btn btn-success btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#editFlightModal" data-flight-id="<?= $row['FlightId'] ?>" data-destination="<?= $row['Destination'] ?>" data-start-date="<?= $row['StartDate'] ?>" data-end-date="<?= $row['EndDate'] ?>" data-price="<?= $row['Price'] ?>" data-pics="<?= $row['FlightPics'] ?>">Edit</button>
                            <button class="btn btn-danger btn-sm btn-delete" data-bs-toggle="modal" data-bs-target="#deleteFlightModal" data-flight-id="<?= $row['FlightId'] ?>">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Add Flight Modal -->
        <div class="modal fade" id="addFlightModal" tabindex="-1" aria-labelledby="addFlightModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addFlightModalLabel">Add Flight</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="destination" class="form-label">Destination</label>
                                <input type="text" class="form-control" id="destination" required>
                            </div>
                            <div class="mb-3">
                                <label for="v" class="form-label">Start Date</label>
                                <input type="text" class="form-control" id="startDate" required>
                            </div>
                            <div class="mb-3">
                                <label for="endDate" class="form-label">End Date</label>
                                <input type="text" class="form-control" id="endDate" required>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" required>
                            </div>
                            <div class="mb-3">
                                <label for="flightPics" class="form-label">Flight Pics</label>
                                <input type="text" class="form-control" id="flightPics" required>
                            </div>
                            <button onclick="addFlight()" type="submit" class="btn btn-primary">Add Flight</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Flight Modal -->
        <div class="modal fade" id="editFlightModal" tabindex="-1" aria-labelledby="editFlightModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editFlightModalLabel">Edit Flight</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editFlightForm">
                            <div class="mb-3">
                                <label for="editFlightId" class="form-label">Flight ID</label>
                                <input type="text" class="form-control" id="editFlightId" name="editFlightId" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="editDestination" class="form-label">Destination</label>
                                <input type="text" class="form-control" id="editDestination" name="editDestination" required>
                            </div>
                            <div class="mb-3">
                                <label for="editStartDate" class="form-label">Start Date</label>
                                <input type="text" class="form-control" id="editStartDate" name="editStartDate" required>
                            </div>
                            <div class="mb-3">
                                <label for="editEndDate" class="form-label">End Date</label>
                                <input type="text" class="form-control" id="editEndDate" name="editEndDate" required>
                            </div>
                            <div class="mb-3">
                                <label for="editPrice" class="form-label">Price</label>
                                <input type="text" class="form-control" id="editPrice" name="editPrice" required>
                            </div>
                            <div class="mb-3">
                                <label for="editPics" class="form-label">Flight Pics</label>
                                <input type="text" class="form-control" id="editPics" name="editPics">
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Flight Modal -->
        <div class="modal fade" id="deleteFlightModal" tabindex="-1" aria-labelledby="deleteFlightModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteFlightModalLabel">Delete Flight</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this flight?</p>
                        <input type="hidden" id="deleteFlightId">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmDelete">Delete Flight</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="flights.js"></script>
    </body>
</html>