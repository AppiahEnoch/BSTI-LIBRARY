$(document).ready(function () {
    // Keyup event for the registration code input field
    $("#registration_code").on("keyup", function () {
      const regCode = $(this).val(); // Get the current value of the input
      $("#userMobile").val("");
      $("#email1").val("");
      // Check if the input length is greater than 5
      if (regCode.length > 6) {
        // Perform AJAX request to fetch data based on the registration code
        $.ajax({
          type: "post",
          data: {
            code: regCode
          },
          cache: false,
          url: "autofill.php", // Replace with your PHP script URL
          dataType: "json", // Assuming the server responds with JSON
          success: function (data, status) {
            //alert(data)
            // Check if the returned data has the properties we're looking for
            if (data && data.mobile && data.email) {
              // Update the mobile and email input fields
              $("#userMobile").val(data.mobile);
              $("#email1").val(data.email);
              // Show a success toast
              //showToast("aeToastS", "Success", "Data fetched successfully", "20");
            } else {
              // Show an error toast
              //showToast("aeToastE", "Error", "Invalid registration code", "20");
            }
          },
          error: function (xhr, status, error) {
            // Show an error toast
            showToast("aeToastE", "Error", "An error occurred", "20");
          },
        });
      }
    });
  });
  