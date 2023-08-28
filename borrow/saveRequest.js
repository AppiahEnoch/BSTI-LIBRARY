
var materialData=null;
function fillMaterialForm() {
  $.ajax({
    type: "post",
    url: "./data.php",  // Replace with the actual path to the PHP file that will retrieve the session variable
    dataType: "json",
    success: function(data, status) {
      materialData=data;
      requestID();
      if (data) {
        // Fill in the image
        $('#resourceImage').attr('src', data.imageUrl);
        $('#resourceImage').attr('alt', data.title);

        // Fill in the detailed description
        $('#detailedDescription').text(data.description);

        // Fill in the request ID (it must be null)
        $('#requestID').text(null);
      } else {
        console.error('No data returned from server.');
      }
    },
    error: function(xhr, status, error) {
      console.error(error);
    }
  });
}




function requestID() {
  $.ajax({
    type: "post",
    url: "./code.php",  // Replace with the actual path to the PHP file that generates the unique code
    dataType: "text",  // Expecting a text response (the unique code) instead of JSON
    success: function(data, status) {
    

      
      // Check length of data
      var datalength = data.length;

      if (datalength === 8) {  // Assuming the unique code is 8 characters long
        // Fill in the request ID
        $('#requestID').text(data);
      } else {
        alert('Invalid code returned from server.');
      }
    },
    error: function(xhr, status, error) {
      alert(error);
    }
  });
}


// Call the function to populate the form after the document is fully loaded
$(document).ready(function(){
  fillMaterialForm();

  $("#cancel").click(function(e) {

    window.location.href = "../portal/portal.php";


  })



  $("#sendRequest").click(function(e) {
    e.preventDefault();
//alert(materialData.id)

   
    
    $.ajax({
      type: "POST",
      url: "./updateRequest.php", // Replace with the actual path to your PHP file
      data: {
        id: materialData.id,
        tableName:materialData.tableName,
      },
      dataType: "text",
      success: function(response, status) {

        showToastYN(
          "aeToastYN",
          "Request Submitted Successfully",
          "Thank you for your request. It is currently under review. You will receive a notification in your portal once it has been approved.",
          "20"
        );
        
      },
      error: function(xhr, status, error) {
        alert(error);

      }
    });


  });
});













//  showToastYN("aeToastYN", "Confirm Delete All.", "Are you sure you want to delete all registration codes?", "20");
 



function handleYesClick() {

window.location.href = "../portal/portal.php";


}

function handleNoClick() {
  $('.toast').toast('hide');
}

// Call the function after the document is fully loaded

