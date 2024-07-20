function addGuide() {
  var guideName = document.getElementById("guideName").value;
  var guidePics = document.getElementById("guidePics").value;

  var add_params = {
    guideName: guideName,
    guidePics: guidePics,
  };

  $.ajax({
    type: "POST",
    url: "../../modules/ModuleGuide.php",
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
      const guideId = button.getAttribute("data-guide-id");
      const guideName = button.getAttribute("data-name");
      const guidePics = button.getAttribute("data-pics");

      document.getElementById("editGuideId").value = guideId;
      document.getElementById("editGuideName").value = guideName;
      document.getElementById("editPics").value = guidePics;
    });
  });

  document
    .getElementById("editGuideForm")
    .addEventListener("submit", function (event) {
      event.preventDefault();
      const guideId = document.getElementById("editGuideId").value;
      const guideName = document.getElementById("editGuideName").value;
      const guidePics = document.getElementById("editPics").value;

      const update_params = {
        guideId: guideId,
        guideName: guideName,
        guidePics: guidePics,
      };

      $.ajax({
        type: "POST",
        url: "../../modules/ModuleGuide.php",
        data: {
          action: "update",
          params: update_params,
        },
        success: function (response) {
          console.log(response);
          $("#editGuideModal").modal("hide");
          location.reload();
        },
      });
    });

  deleteButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const guideId = button.getAttribute("data-guide-id");
      document.getElementById("deleteGuideId").value = guideId;
    });
  });

  document
    .getElementById("confirmDelete")
    .addEventListener("click", function () {
      const guideId = document.getElementById("deleteGuideId").value;

      $.ajax({
        type: "POST",
        url: "../../modules/ModuleGuide.php",
        data: {
          action: "delete",
          params: guideId,
        },
        success: function (response) {
          console.log(response);
          $("#deleteGuideModal").modal("hide");
          location.reload();
        },
      });
    });
});
