function addFlight() {
  var destination = document.getElementById("destination").value;
  var startDate = document.getElementById("startDate").value;
  var endDate = document.getElementById("endDate").value;
  var price = document.getElementById("price").value;
  var flightPics = document.getElementById("flightPics").value;

  var add_params = {
    destination: destination,
    startDate: startDate,
    endDate: endDate,
    price: price,
    flightPics: flightPics,
  };

  $.ajax({
    type: "POST",
    url: "../../modules/ModuleFlight.php",
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
      const flightId = button.getAttribute("data-flight-id");
      const destination = button.getAttribute("data-destination");
      const startDate = button.getAttribute("data-start-date");
      const endDate = button.getAttribute("data-end-date");
      const price = button.getAttribute("data-end-date");
      const flightPics = button.getAttribute("data-pics");

      document.getElementById("editFlightId").value = flightId;
      document.getElementById("editDestination").value = destination;
      document.getElementById("editStartDate").value = startDate;
      document.getElementById("editEndDate").value = endDate;
      document.getElementById("editPrice").value = price;
      document.getElementById("editPics").value = flightPics;
    });
  });

  document
    .getElementById("editFlightForm")
    .addEventListener("submit", function (event) {
      event.preventDefault();
      const flightId = document.getElementById("editFlightId").value;
      const destination = document.getElementById("editDestination").value;
      const startDate = document.getElementById("editStartDate").value;
      const endDate = document.getElementById("editEndDate").value;
      const price = document.getElementById("editPrice").value;
      const flightPics = document.getElementById("editPics").value;

      const update_params = {
        flightId: flightId,
        destination: destination,
        startDate: startDate,
        endDate: endDate,
        price: price,
        flightPics: flightPics,
      };

      $.ajax({
        type: "POST",
        url: "../../modules/ModuleFlight.php",
        data: {
          action: "update",
          params: update_params,
        },
        success: function (response) {
          console.log(response);
          $("#editFlightModal").modal("hide");
          location.reload();
        },
      });
    });

  deleteButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const flightId = button.getAttribute("data-flight-id");
      document.getElementById("deleteFlightId").value = flightId;
    });
  });

  document
    .getElementById("confirmDelete")
    .addEventListener("click", function () {
      const flightId = document.getElementById("deleteFlightId").value;

      $.ajax({
        type: "POST",
        url: "../../modules/ModuleFlight.php",
        data: {
          action: "delete",
          params: flightId,
        },
        success: function (response) {
          console.log(response);
          $("#deleteFlightModal").modal("hide");
          location.reload();
        },
      });
    });
});
