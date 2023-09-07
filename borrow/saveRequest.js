
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
  // Request user's day of birth with validation
let day = prompt("Please enter your day of birth (DD):");
if (!day || !/^([1-9]|[12][0-9]|3[01])$/.test(day)) {
  alert("Please enter a valid day between 1 and 31.");
  return;
}

// Request user's month of birth with validation
let month = prompt("Please enter your month of birth (MM):");
if (!month || !/^([1-9]|1[012])$/.test(month)) {
  alert("Please enter a valid month between 1 and 12.");
  return;
}

// Request user's year of birth with validation
let year = prompt("Please enter your year of birth (YYYY):");
if (!year || !/^\d{4}$/.test(year)) {
  alert("Please enter a valid 4-digit year.");
  return;
}

let dob = `${year}-${month}-${day}`;
let dobDate = new Date(dob);
let currentDate = new Date();
let age = currentDate.getFullYear() - dobDate.getFullYear();
let monthDiff = currentDate.getMonth() - dobDate.getMonth();

// If the birth month hasn't occurred this year, subtract a year from the age
if (monthDiff < 0 || (monthDiff === 0 && currentDate.getDate() < dobDate.getDate())) {
  age--;
}

// Check age
if (age <= 17) {
  alert("You must be 18 years or more to submit a request.");
  return;
}
   
    
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

