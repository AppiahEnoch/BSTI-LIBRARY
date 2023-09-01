$(document).ready(function () {
  checkUserId()
  $("#search-card").click(function () {
    if(hasBio==false){
      showToast("aeToastE", "Update your Basic Details ","Update your Basic Details  Before you can perform any operation","20");
      return
    }
    // Code to handle the click on the search card
    openPage_blank("../search/page.php");
    // Add your custom logic here
    checkUserId();
  });

  $("#notification-card").click(function () {
    if(hasBio==false){
      showToast("aeToastE", "Update your Basic Details ","Update your Basic Details  Before you can perform any operation","20");
      return
    }

    // Code to handle the click on the search card
    aeModal2("uniqueNotificationModal");

    // Add your custom logic here
  });

  $("#borrow-card").click(function () {
    if(hasBio==false){
      showToast("aeToastE", "Update your Basic Details ","Update your Basic Details  Before you can perform any operation","20");
      return
    }

    showToast(
      "aeToastR_V",
      "CHOOSE MATERIAL FIRST",
      "YOU MUST FIRST SELECT THE MATERIAL TO BORROW",
      20
    );
  });

  $("#rate-card").click(function () {
    if(hasBio==false){
      showToast("aeToastE", "Update your Basic Details ","Update your Basic Details  Before you can perform any operation","20");
      return
    }
 
    showToast(
      "aeToastR_V",
      "MUST SEARCH FOR BOOK FIRST",
      "MUST SEARCH FOR BOOK FIRST",
      20
    );
    // Code to handle the click on the rate card")
  });

  $("#reading-list-card").click(function () {
    if (hasBio == false) {
      showToast(
        "aeToastE",
        "Update your Basic Details ",
        "Update your Basic Details  Before you can perform any operation",
        "20"
      );
      return;
    }

    // this fuction is from the fetch_reading_list .js
    fetchReadingList();
  });

  $("#view-request").click(function () {
    if (hasBio == false) {
      showToast(
        "aeToastE",
        "Update your Basic Details ",
        "Update your Basic Details  Before you can perform any operation",
        "20"
      );
      return;
    }
    aeModal2("viewRrequestModal");
  });

  // Add more click event listeners for other cards if needed
});

var hasBio = false;

function checkUserId() {
  hasBio = false;
  $.ajax({
    type: "POST",
    url: "blockUnregistered.php",
    data: { user_id: "none" },
    success: function (response) {
     // alert(response)
      if (response == "0") {
        showToast("aeToastE", "Update Your Basic Details", "User ID not found", "20");
      } else {
        hasBio = true;
      }
    },
    error: function (xhr, status, error) {
     // showToast("aeToastE", "Error", "An error occurred: " + error, "20");
    },
  });
}
