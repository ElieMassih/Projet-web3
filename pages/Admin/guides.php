<?php
require_once '../../modules/ModuleGuide.php';
include_once  "../../utils/functions.php";

$moduleGuide = new ModuleGuide();
$guides = $moduleGuide->getGuides();

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
        <h1>Guides</h1>
        
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGuideModal">
            Add Guides
        </button>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Guide name</th>
                    <th scope="col">Guide Pics</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($guides as $row) { 
                    $row_uuid = guidv4();
                    ?>
                    <tr>
                        <td class="guideId"><?= $row['GuideId'] ?></td>
                        <td class="guideName"><?= $row['GuideName'] ?></td>
                        <td class="guidePics"><?= $row['GuidePics'] ?></td>
                        <td>
                            <button class="btn btn-success btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#editGuideModal" data-guide-id="<?= $row['GuideId'] ?>" data-name="<?= $row['GuideName'] ?>" data-pics="<?= $row['GuidePics'] ?>">Edit</button>
                            <button class="btn btn-danger btn-sm btn-delete" data-bs-toggle="modal" data-bs-target="#deleteGuideModal" data-guide-id="<?= $row['GuideId'] ?>">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Add Guide Modal -->
        <div class="modal fade" id="addGuideModal" tabindex="-1" aria-labelledby="addGuideModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addGuideModalLabel">Add Guide</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="guideName" class="form-label">Guide Name</label>
                                <input type="text" class="form-control" id="guideName" required>
                            </div>
                            <div class="mb-3">
                                <label for="guidePics" class="form-label">Guide Pics</label>
                                <input type="text" class="form-control" id="guidePics" required>
                            </div>
                            <button onclick="addGuide()" type="submit" class="btn btn-primary">Add Guide</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Guide Modal -->
        <div class="modal fade" id="editGuideModal" tabindex="-1" aria-labelledby="editGuideModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editGuideModalLabel">Edit Guide</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editGuideForm">
                            <div class="mb-3">
                                <label for="editGuideId" class="form-label">Guide ID</label>
                                <input type="text" class="form-control" id="editGuideId" name="editGuideId" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="editGuideName" class="form-label">Guide name</label>
                                <input type="text" class="form-control" id="editGuideName" name="editGuideName" required>
                            </div>
                            <div class="mb-3">
                                <label for="editPics" class="form-label">Guide Pics</label>
                                <input type="text" class="form-control" id="editPics" name="editPics">
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Guide Modal -->
        <div class="modal fade" id="deleteGuideModal" tabindex="-1" aria-labelledby="deleteGuideModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteGuideModalLabel">Delete Guide</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this guide?</p>
                        <input type="hidden" id="deleteGuideId">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmDelete">Delete Guide</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="guides.js"></script>
    </body>
</html>