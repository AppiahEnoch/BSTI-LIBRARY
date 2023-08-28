// jQuery code
$(document).ready(function() {
  
    $("#notificationForm").submit(function(e) {
      e.preventDefault();

  
      const title = $("#notificationTitle").val();
      const message = $("#notificationMessage").val();
  
      $.ajax({
        type: "POST",
        url: "insert_notification.php",
        data: {
          title: title,
          message: message
        },
        success: function(data) {
   
          showToast('aeToastS', 'Success! ', 'Notification issued successfully.', '20');
       
        },
        error: function(xhr, status, error) {
          alert("An error occurred: " + error);
        }
      });
    });
  });
  