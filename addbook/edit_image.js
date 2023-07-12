$(document).ready(function () {
  $("#edit_imageview").click(function () {
    $("#edit_image_file").click();
  });

  $("#edit_image_file").change(function () {
    // Check if a file was selected
    if (!isFileImage2("edit_image_file")) {
        return false;
    }

    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            // Update the image source with the selected file data
            $("#edit_imageview").attr("src", e.target.result);
       
        };

        reader.readAsDataURL(this.files[0]);
      

    }

    // Create a new FormData object
    var formData = new FormData();
    formData.append('file', this.files[0]); // Append the file

    formData.append('id', selected_row_id)
    alert(selected_row_id)

    // Use AJAX to send the file
    $.ajax({
        url: 'update_image.php',
        type: 'POST',
        data: formData,
        processData: false,  // Tell jQuery not to process the data
        contentType: false,  // Tell jQuery not to set contentType
        success: function(data) {
         
        },
        error: function(error) {
            console.log("Error updating image:", error);
        }
    });
});

});
