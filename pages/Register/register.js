function addUser() {
  var fullname = $("#fullname").val();
  var email = $("#email").val();
  var username = $("#username").val();
  var password = $("#password").val();
  var confirm_password = $("#confirmpass").val();

  var add_params = {
    fullname: fullname,
    email: email,
    username: username,
    password: password,
    confirm_password: confirm_password,
  };

  // Send user data to the server
  $.ajax({
    type: "POST",
    url: "../../modules/ModuleUser.php",
    data: {
      action: "create",
      params: add_params,
    },
    success: function (response) {
      console.log(response);
      // Handle response here
    },
  });
}

function updateUser(userId) {
  var fullname = $("#fullname").val();
  var email = $("#email").val();
  var username = $("#username").val();
  var password = $("#password").val();
  var confirm_password = $("#confirmpass").val();

  var update_params = {
    userId: userId,
    fullname: fullname,
    email: email,
    username: username,
    password: password,
    confirm_password: confirm_password,
  };

  // Send updated user data to the server
  $.ajax({
    type: "POST",
    url: "../../modules/ModuleUser.php",
    data: {
      action: "update",
      params: update_params,
    },
    success: function (response) {
      console.log(response);
      // Handle response here
    },
  });
}
