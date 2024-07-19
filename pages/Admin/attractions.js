function addAttraction() {
  var attractionName = document.getElementById("attractionName").value;
  var attractionLocation = document.getElementById("attractionLocation").value;
  var attractionDescription = document.getElementById(
    "attractionDescription"
  ).value;
  var attractionRating = document.getElementById("attractionRating").value;
  var attractionReviews = document.getElementById("attractionReviews").value;
  var attractionPrice = document.getElementById("attractionPrice").value;
  var attractionPics = document.getElementById("attractionPics").value;

  var add_params = {
    attractionName: attractionName,
    attractionLocation: attractionLocation,
    attractionDescription: attractionDescription,
    attractionRating: attractionRating,
    attractionReviews: attractionReviews,
    attractionPrice: attractionPrice,
    attractionPics: attractionPics,
  };

  $.ajax({
    type: "POST",
    url: "../../modules/ModuleAttraction.php",
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
      const attractionId = button.getAttribute("data-attraction-id");
      const attractionName = button.getAttribute("data-name");
      const attractionLocation = button.getAttribute("data-location");
      const attractionDescription = button.getAttribute("data-description");
      const attractionRating = button.getAttribute("data-rating");
      const attractionReviews = button.getAttribute("data-review");
      const attractionPrice = button.getAttribute("data-price");
      const attractionPics = button.getAttribute("data-pics");

      document.getElementById("editAttractionId").value = attractionId;
      document.getElementById("editAttractionName").value = attractionName;
      document.getElementById("editAttractionLocation").value =
        attractionLocation;
      document.getElementById("editAttractionDescription").value =
        attractionDescription;
      document.getElementById("editAttractionRating").value = attractionRating;
      document.getElementById("editAttractionReviews").value =
        attractionReviews;
      document.getElementById("editPrice").value = attractionPrice;
      document.getElementById("editPics").value = attractionPics;
    });
  });

  document
    .getElementById("editAttractionForm")
    .addEventListener("submit", function (event) {
      event.preventDefault();
      const attractionId = document.getElementById("editAttractionId").value;
      const attractionName =
        document.getElementById("editAttractionName").value;
      const attractionLocation = document.getElementById(
        "editAttractionLocation"
      ).value;
      const attractionDescription = document.getElementById(
        "editAttractionDescription"
      ).value;
      const attractionRating = document.getElementById(
        "editAttractionRating"
      ).value;
      const attractionReviews = document.getElementById(
        "editAttractionReviews"
      ).value;
      const attractionPrice = document.getElementById("editPrice").value;
      const attractionPics = document.getElementById("editPics").value;

      const update_params = {
        attractionId: attractionId,
        attractionName: attractionName,
        attractionLocation: attractionLocation,
        attractionDescription: attractionDescription,
        attractionRating: attractionRating,
        attractionReviews: attractionReviews,
        attractionPrice: attractionPrice,
        attractionPics: attractionPics,
      };

      $.ajax({
        type: "POST",
        url: "../../modules/ModuleAttraction.php",
        data: {
          action: "update",
          params: update_params,
        },
        success: function (response) {
          console.log(response);
          $("#editAttractionModal").modal("hide");
          location.reload();
        },
      });
    });

  deleteButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const attractionId = button.getAttribute("data-attraction-id");
      document.getElementById("deleteAttractionId").value = attractionId;
    });
  });

  document
    .getElementById("confirmDelete")
    .addEventListener("click", function () {
      const attractionId = document.getElementById("deleteAttractionId").value;

      $.ajax({
        type: "POST",
        url: "../../modules/ModuleAttraction.php",
        data: {
          action: "delete",
          params: attractionId,
        },
        success: function (response) {
          console.log(response);
          $("#deleteAttractionModal").modal("hide");
          location.reload();
        },
      });
    });
});
