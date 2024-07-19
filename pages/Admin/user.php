<?php
require_once '../../modules/ModuleUser.php';
include_once  "../../utils/functions.php";

$moduleUser = new ModuleUser();
$users = $moduleUser->getUsers();

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
        <h1>Users</h1>
        
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
            Add User
        </button>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $row) { 
                    $row_uuid = guidv4();
                    ?>
                    <tr>
                        <td class="userId"><?= $row['UserId'] ?></td>
                        <td class="fullname"><?= $row['FullName'] ?></td>
                        <td class="username"><?= $row['Username'] ?></td>
                        <td class="email"><?= $row['Email'] ?></td>
                        <td class="role" data-role="<?= $row['Role'] ?>"><?= ($row['Role'] == 1) ? 'Admin' : 'User' ?></td>
                        <td class="status" data-status="<?= $row['Status'] ?>"><?= ($row['Status'] == 1) ? 'Active' : 'Inactive' ?></td>
                        <td>
                            <button class="btn btn-success btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#editUserModal" data-user-id="<?= $row['UserId'] ?>" data-fullname="<?= $row['FullName'] ?>" data-username="<?= $row['Username'] ?>" data-email="<?= $row['Email'] ?>" data-role="<?= $row['Role'] ?>" data-status="<?= $row['Status'] ?>">Edit</button>
                            <button class="btn btn-danger btn-sm btn-delete" data-bs-toggle="modal" data-bs-target="#deleteUserModal" data-user-id="<?= $row['UserId'] ?>">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Add User Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullname" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-control" id="role" required>
                                    <option value="2">User</option>
                                    <option value="1">Admin</option>                          
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" id="status" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <button onclick="addUser()" type="submit" class="btn btn-primary">Add User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit User Modal -->
        <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editUserForm">
                            <div class="mb-3">
                                <label for="editUserId" class="form-label">User ID</label>
                                <input type="text" class="form-control" id="editUserId" name="editUserId" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="editFullname" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="editFullname" name="editFullname" required>
                            </div>
                            <div class="mb-3">
                                <label for="editUsername" class="form-label">Username</label>
                                <input type="text" class="form-control" id="editUsername" name="editUsername" required>
                            </div>
                            <div class="mb-3">
                                <label for="editEmail" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="editEmail" name="editEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="editPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="editPassword" name="editPassword">
                            </div>
                            <div class="mb-3">
                                <label for="editRole" class="form-label">Role</label>
                                <select class="form-control" id="editRole" name="editRole" required>
                                    <option value="2">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="editStatus" class="form-label">Status</label>
                                <select class="form-control" id="editStatus" name="editStatus" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete User Modal -->
        <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this user?</p>
                        <input type="hidden" id="deleteUserId">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmDelete">Delete User</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="user.js"></script>
    </body>
</html>