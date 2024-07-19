function addUser() {
  var fullname = document.getElementById("fullname").value;
  var email = document.getElementById("email").value;
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var role = document.getElementById("role").value;
  var status = document.getElementById("status").value;

  var add_params = {
    fullname: fullname,
    email: email,
    username: username,
    password: password,
    role: role,
    status: status,
  };

  $.ajax({
    type: "POST",
    url: "../../modules/ModuleUser.php",
    data: {
      action: "add",
      params: add_params,
    },
    success: function (response) {
      location.reload();
      console.log(response);
    },
  });
}

document.addEventListener("DOMContentLoaded", function () {
  const editButtons = document.querySelectorAll(".btn-edit");
  const deleteButtons = document.querySelectorAll(".btn-delete");

  editButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const userId = button.getAttribute("data-user-id");
      const fullname = button.getAttribute("data-fullname");
      const username = button.getAttribute("data-username");
      const email = button.getAttribute("data-email");
      const role = button.getAttribute("data-role");
      const status = button.getAttribute("data-status");

      document.getElementById("editUserId").value = userId;
      document.getElementById("editFullname").value = fullname;
      document.getElementById("editUsername").value = username;
      document.getElementById("editEmail").value = email;
      document.getElementById("editRole").value = role;
      document.getElementById("editStatus").value = status;
    });
  });

  document
    .getElementById("editUserForm")
    .addEventListener("submit", function (event) {
      event.preventDefault();

      const userId = document.getElementById("editUserId").value;
      const fullname = document.getElementById("editFullname").value;
      const username = document.getElementById("editUsername").value;
      const email = document.getElementById("editEmail").value;
      const password = document.getElementById("editPassword").value;
      const role = document.getElementById("editRole").value;
      const status = document.getElementById("editStatus").value;

      const update_params = {
        userId: userId,
        fullname: fullname,
        username: username,
        email: email,
        password: password,
        role: role,
        status: status,
      };

      $.ajax({
        type: "POST",
        url: "../../modules/ModuleUser.php",
        data: {
          action: "update",
          params: update_params,
        },
        success: function (response) {
          console.log(response);
          $("#editUserModal").modal("hide");
          location.reload();
        },
      });
    });

  deleteButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const userId = button.getAttribute("data-user-id");
      document.getElementById("deleteUserId").value = userId;
    });
  });

  document
    .getElementById("confirmDelete")
    .addEventListener("click", function () {
      const userId = document.getElementById("deleteUserId").value;

      $.ajax({
        type: "POST",
        url: "../../modules/ModuleUser.php",
        data: {
          action: "delete",
          params: userId,
        },
        success: function (response) {
          console.log(response);
          $("#deleteUserModal").modal("hide");
          location.reload();
        },
      });
    });
});
