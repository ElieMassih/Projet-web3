function addCar() {
  var carName = document.getElementById("carName").value;
  var carType = document.getElementById("carType").value;
  var carPrice = document.getElementById("carPrice").value;
  var carPics = document.getElementById("carPics").value;

  var add_params = {
    carName: carName,
    carType: carType,
    carPrice: carPrice,
    carPics: carPics,
  };

  $.ajax({
    type: "POST",
    url: "../../modules/ModuleCar.php",
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
      const carId = button.getAttribute("data-car-id");
      const carName = button.getAttribute("data-name");
      const carType = button.getAttribute("data-type");
      const carPrice = button.getAttribute("data-price");
      const carPics = button.getAttribute("data-pics");

      document.getElementById("editCarId").value = carId;
      document.getElementById("editCarName").value = carName;
      document.getElementById("editCarType").value = carType;
      document.getElementById("editPrice").value = carPrice;
      document.getElementById("editPics").value = carPics;
    });
  });

  document
    .getElementById("editCarForm")
    .addEventListener("submit", function (event) {
      event.preventDefault();
      const carId = document.getElementById("editCarId").value;
      const carName = document.getElementById("editCarName").value;
      const carType = document.getElementById("editCarType").value;
      const carPrice = document.getElementById("editPrice").value;
      const carPics = document.getElementById("editPics").value;

      const update_params = {
        carId: carId,
        carName: carName,
        carType: carType,
        carPrice: carPrice,
        carPics: carPics,
      };

      $.ajax({
        type: "POST",
        url: "../../modules/ModuleCar.php",
        data: {
          action: "update",
          params: update_params,
        },
        success: function (response) {
          console.log(response);
          $("#editCarModal").modal("hide");
          location.reload();
        },
      });
    });

  deleteButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const carId = button.getAttribute("data-car-id");
      document.getElementById("deleteCarId").value = carId;
    });
  });

  document
    .getElementById("confirmDelete")
    .addEventListener("click", function () {
      const carId = document.getElementById("deleteCarId").value;

      $.ajax({
        type: "POST",
        url: "../../modules/ModuleCar.php",
        data: {
          action: "delete",
          params: carId,
        },
        success: function (response) {
          console.log(response);
          $("#deleteCarModal").modal("hide");
          location.reload();
        },
      });
    });
});
