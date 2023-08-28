$(document).ready(function() {
    $("#search-card").click(function() {
      // Code to handle the click on the search card
      openPage_blank("../search/page.php") 
      // Add your custom logic here
    });
  
    $("#notification-card").click(function() {

      // Code to handle the click on the search card
      aeModal2("uniqueNotificationModal") 
      
      // Add your custom logic here
    });
  
    $("#borrow-card").click(function() {
      
      showToast("aeToastR_V", "CHOOSE MATERIAL FIRST", "YOU MUST FIRST SELECT THE MATERIAL TO BORROW", 20);
    });
  
    $("#rate-card").click(function() {
      showToast("aeToastR_V", "MUST SEARCH FOR BOOK FIRST", "MUST SEARCH FOR BOOK FIRST", 20);
      // Code to handle the click on the rate card")
    });
  
    $("#reading-list-card").click(function() {
      
      // this fuction is from the fetch_reading_list .js
      fetchReadingList()
   
    });
  
    $("#view-request").click(function() {
    aeModal2("viewRrequestModal")
    
    });
  
    // Add more click event listeners for other cards if needed
  });
  




  