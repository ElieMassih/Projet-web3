<?php
require_once '../../modules/ModuleCar.php';
include_once  "../../utils/functions.php";

$moduleCar = new ModuleCar();
$cars = $moduleCar->getCars();

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
        <h1>Cars</h1>
        
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCarModal">
            Add Cars
        </button>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Car name</th>
                    <th scope="col">Car Type</th>
                    <th scope="col">Price Per Day</th>
                    <th scope="col">Car Pics</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cars as $row) { 
                    $row_uuid = guidv4();
                    ?>
                    <tr>
                        <td class="carId"><?= $row['CarId'] ?></td>
                        <td class="carName"><?= $row['CarName'] ?></td>
                        <td class="carType"><?= $row['CarType'] ?></td>
                        <td class="pricePerDay"><?= $row['PricePerDay'] ?></td>
                        <td class="carPics"><?= $row['CarPics'] ?></td>
                        <td>
                            <button class="btn btn-success btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#editCarModal" data-car-id="<?= $row['CarId'] ?>" data-name="<?= $row['CarName'] ?>" data-type="<?= $row['CarType'] ?>" data-price="<?= $row['PricePerDay'] ?>" data-pics="<?= $row['CarPics'] ?>">Edit</button>
                            <button class="btn btn-danger btn-sm btn-delete" data-bs-toggle="modal" data-bs-target="#deleteCarModal" data-car-id="<?= $row['CarId'] ?>">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Add Car Modal -->
        <div class="modal fade" id="addCarModal" tabindex="-1" aria-labelledby="addCarModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCarModalLabel">Add Car</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="carName" class="form-label">Car Name</label>
                                <input type="text" class="form-control" id="carName" required>
                            </div>
                            <div class="mb-3">
                                <label for="carType" class="form-label">Car Type</label>
                                <input type="text" class="form-control" id="carType" required>
                            </div>
                            <div class="mb-3">
                                <label for="carPrice" class="form-label">Car Price</label>
                                <input type="text" class="form-control" id="carPrice" required>
                            </div>
                            <div class="mb-3">
                                <label for="carPics" class="form-label">Car Pics</label>
                                <input type="text" class="form-control" id="carPics" required>
                            </div>
                            <button onclick="addCar()" type="submit" class="btn btn-primary">Add Car</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Car Modal -->
        <div class="modal fade" id="editCarModal" tabindex="-1" aria-labelledby="editCarModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCarModalLabel">Edit Car</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editCarForm">
                            <div class="mb-3">
                                <label for="editCarId" class="form-label">Car ID</label>
                                <input type="text" class="form-control" id="editCarId" name="editCarId" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="editCarName" class="form-label">Car name</label>
                                <input type="text" class="form-control" id="editCarName" name="editCarName" required>
                            </div>
                            <div class="mb-3">
                                <label for="editCarType" class="form-label">Car type</label>
                                <input type="text" class="form-control" id="editCarType" name="editCarType" required>
                            </div>
                            <div class="mb-3">
                                <label for="editPrice" class="form-label">Car price</label>
                                <input type="text" class="form-control" id="editPrice" name="editPrice" required>
                            </div>
                            <div class="mb-3">
                                <label for="editPics" class="form-label">Car Pics</label>
                                <input type="text" class="form-control" id="editPics" name="editPics">
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Car Modal -->
        <div class="modal fade" id="deleteCarModal" tabindex="-1" aria-labelledby="deleteCarModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteCarModalLabel">Delete Car</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this car?</p>
                        <input type="hidden" id="deleteCarId">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmDelete">Delete Car</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="cars.js"></script>
    </body>
</html>