$(document).ready(function () {
  $("#passport_picture_file").change(function () {
    if (isFileImage2("passport_picture_file")) {

      updateImageSRC("passport_picture_file", "user-bio-img")
      savePassport()

    }
  });
});

function savePassport() {
  var formData = new FormData();
  formData.append("passport_picture_file", $("#passport_picture_file")[0].files[0]);

  $.ajax({
    type: "post",
    cache: false,
    url: "updatePassport.php",
    data: formData,
    processData: false,
    contentType: false,
    success: function(data, status) {
      alert(data)
      showToast("aeToastS", "IMAGE UPDATED", "Passport picture Updated Successfully", 20);
    

    },
    error: function(xhr, status, error) {
      // handle the error response here
    },
  });
}

