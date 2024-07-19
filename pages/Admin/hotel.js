function addHotel() {
  var hotelName = document.getElementById("hotelName").value;
  var hotelDescription = document.getElementById("hotelDescription").value;
  var pricePerNight = document.getElementById("pricePerNight").value;
  var hotelPics = document.getElementById("hotelPics").value;

  var add_params = {
    hotelName: hotelName,
    hotelDescription: hotelDescription,
    pricePerNight: pricePerNight,
    hotelPics: hotelPics,
  };
  console.log(add_params);

  $.ajax({
    type: "POST",
    url: "../../modules/ModuleHotel.php",
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
      const hotelId = button.getAttribute("data-hotel-id");
      const hotelName = button.getAttribute("data-name");
      const hotelDescription = button.getAttribute("data-description");
      const pricePerNight = button.getAttribute("data-price");
      const hotelPics = button.getAttribute("data-pics");

      document.getElementById("editHotelId").value = hotelId;
      document.getElementById("editHotelName").value = hotelName;
      document.getElementById("editHotelDescription").value = hotelDescription;
      document.getElementById("editPrice").value = pricePerNight;
      document.getElementById("editPics").value = hotelPics;
    });
  });

  document
    .getElementById("editHotelForm")
    .addEventListener("submit", function (event) {
      event.preventDefault();

      const hotelId = document.getElementById("editHotelId").value;
      const hotelName = document.getElementById("editHotelName").value;
      const hotelDescription = document.getElementById(
        "editHotelDescription"
      ).value;
      const pricePerNight = document.getElementById("editPrice").value;
      const hotelPics = document.getElementById("editPics").value;

      const update_params = {
        hotelId: hotelId,
        hotelName: hotelName,
        hotelDescription: hotelDescription,
        pricePerNight: pricePerNight,
        hotelPics: hotelPics,
      };

      $.ajax({
        type: "POST",
        url: "../../modules/ModuleHotel.php",
        data: {
          action: "update",
          params: update_params,
        },
        success: function (response) {
          console.log(response);
          $("#editHotelModal").modal("hide");
          location.reload();
        },
      });
    });

  deleteButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const hotelId = button.getAttribute("data-hotel-id");
      document.getElementById("deleteHotelId").value = hotelId;
    });
  });

  document
    .getElementById("confirmDelete")
    .addEventListener("click", function () {
      const hotelId = document.getElementById("deleteHotelId").value;

      $.ajax({
        type: "POST",
        url: "../../modules/ModuleHotel.php",
        data: {
          action: "delete",
          params: hotelId,
        },
        success: function (response) {
          console.log(response);
          $("#deleteHotelModal").modal("hide");
          location.reload();
        },
      });
    });
});
