<?php
require_once '../../modules/ModuleAttraction.php';
include_once  "../../utils/functions.php";

$moduleAttraction = new ModuleAttraction();
$attractions = $moduleAttraction->getAttractions();

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
        <h1>Attractions</h1>
        
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAttractionModal">
            Add Attraction
        </button>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Attraction name</th>
                    <th scope="col">Attraction location</th>
                    <th scope="col">Attraction description</th>
                    <th scope="col">Attraction rating</th>
                    <th scope="col">Attraction reviews</th>
                    <th scope="col">Attraction price</th>
                    <th scope="col">Attraction pics</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($attractions as $row) { 
                    $row_uuid = guidv4();
                    ?>
                    <tr>
                        <td class="attractionId"><?= $row['AttractionId'] ?></td>
                        <td class="attractionName"><?= $row['AttractionName'] ?></td>
                        <td class="attractionLocation"><?= $row['AttractionLocation'] ?></td>
                        <td class="attractionDescription"><?= $row['AttractionDescription'] ?></td>
                        <td class="attractionRating"><?= $row['AttractionRating'] ?></td>
                        <td class="attractionReviews"><?= $row['AttractionReviews'] ?></td>
                        <td class="attractionPrice"><?= $row['AttractionPrice'] ?></td>
                        <td class="attractionPics"><?= $row['AttractionPics'] ?></td>
                        <td>
                            <button class="btn btn-success btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#editAttractionModal" data-attraction-id="<?= $row['AttractionId'] ?>" data-name="<?= $row['AttractionName'] ?>" data-location="<?= $row['AttractionLocation'] ?>" data-description="<?= $row['AttractionDescription'] ?>" data-rating="<?= $row['AttractionRating'] ?>" data-review="<?= $row['AttractionReviews'] ?>" data-price="<?= $row['AttractionPrice'] ?>" data-pics="<?= $row['AttractionPics'] ?>">Edit</button>
                            <button class="btn btn-danger btn-sm btn-delete" data-bs-toggle="modal" data-bs-target="#deleteAttractionModal" data-attraction-id="<?= $row['AttractionId'] ?>">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Add Attraction Modal -->
        <div class="modal fade" id="addAttractionModal" tabindex="-1" aria-labelledby="addAttractionModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAttractionModalLabel">Add Attraction</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="attractionName" class="form-label">Attraction Name</label>
                                <input type="text" class="form-control" id="attractionName" required>
                            </div>
                            <div class="mb-3">
                                <label for="attractionLocation" class="form-label">Attraction Location</label>
                                <input type="text" class="form-control" id="attractionLocation" required>
                            </div>
                            <div class="mb-3">
                                <label for="attractionDescription" class="form-label">Attraction Description</label>
                                <input type="text" class="form-control" id="attractionDescription" required>
                            </div>
                            <div class="mb-3">
                                <label for="attractionRating" class="form-label">Attraction Rating</label>
                                <input type="text" class="form-control" id="attractionRating" required>
                            </div>
                            <div class="mb-3">
                                <label for="attractionReviews" class="form-label">Attraction Reviews</label>
                                <input type="text" class="form-control" id="attractionReviews" required>
                            </div>
                            <div class="mb-3">
                                <label for="attractionPrice" class="form-label">Attraction Price</label>
                                <input type="text" class="form-control" id="attractionPrice" required>
                            </div>
                            <div class="mb-3">
                                <label for="attractionPics" class="form-label">Attraction Pics</label>
                                <input type="text" class="form-control" id="attractionPics" required>
                            </div>
                            <button onclick="addAttraction()" type="submit" class="btn btn-primary">Add Attraction</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Attraction Modal -->
        <div class="modal fade" id="editAttractionModal" tabindex="-1" aria-labelledby="editAttractionModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAttractionModalLabel">Edit Attraction</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editAttractionForm">
                            <div class="mb-3">
                                <label for="editAttractionId" class="form-label">Attraction ID</label>
                                <input type="text" class="form-control" id="editAttractionId" name="editAttractionId" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="editAttractionName" class="form-label">Attraction name</label>
                                <input type="text" class="form-control" id="editAttractionName" name="editAttractionName" required>
                            </div>
                            <div class="mb-3">
                                <label for="editAttractionLocation" class="form-label">Attraction location</label>
                                <input type="text" class="form-control" id="editAttractionLocation" name="editAttractionLocation" required>
                            </div>
                            <div class="mb-3">
                                <label for="editAttractionDescription" class="form-label">Attraction Description</label>
                                <input type="text" class="form-control" id="editAttractionDescription" name="editAttractionDescription" required>
                            </div>
                            <div class="mb-3">
                                <label for="editAttractionRating" class="form-label">Attraction Rating</label>
                                <input type="text" class="form-control" id="editAttractionRating" name="editAttractionRating" required>
                            </div>
                            <div class="mb-3">
                                <label for="editAttractionReviews" class="form-label">Attraction Reviews</label>
                                <input type="text" class="form-control" id="editAttractionReviews" name="editAttractionReviews" required>
                            </div>
                            <div class="mb-3">
                                <label for="editPrice" class="form-label">Attraction Price</label>
                                <input type="text" class="form-control" id="editPrice" name="editPrice" required>
                            </div>
                            <div class="mb-3">
                                <label for="editPics" class="form-label">Attraction Pics</label>
                                <input type="text" class="form-control" id="editPics" name="editPics">
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Attraction Modal -->
        <div class="modal fade" id="deleteAttractionModal" tabindex="-1" aria-labelledby="deleteAttractionModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAttractionModalLabel">Delete Attraction</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this attraction?</p>
                        <input type="hidden" id="deleteAttractionId">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmDelete">Delete Attraction</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="attractions.js"></script>
    </body>
</html>