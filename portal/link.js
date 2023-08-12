$(document).ready(function() {
    $("#search-card").click(function() {
      // Code to handle the click on the search card
      openPage_blank("../search/page.php") 
      // Add your custom logic here
    });
  
    $("#notification-card").click(function() {

      // Code to handle the click on the search card
      aeModal("notificationsModal") 
      
      // Add your custom logic here
    });
  
    $("#borrow-card").click(function() {
      // Code to handle the click on the borrow card
      console.log('Borrow card clicked!');
      // Add your custom logic here
    });
  
    $("#rate-card").click(function() {
      // Code to handle the click on the rate card
      console.log('Rate card clicked!');
      // Add your custom logic here
    });
  
    $("#reading-list-card").click(function() {
      // Code to handle the click on the reading list card
      console.log('Reading list card clicked!');
      // Add your custom logic here
    });
  
    $("#other-resources-card").click(function() {
      // Code to handle the click on the other resources card
      console.log('Other resources card clicked!');
      // Add your custom logic here
    });
  
    // Add more click event listeners for other cards if needed
  });
  




  