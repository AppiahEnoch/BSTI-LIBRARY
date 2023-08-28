$(document).ready(function() { 
    populateModal()
})


function populateModal() {
    let ctr = 0; //
    $.ajax({
      type: "GET",
      url: "fetch_notification.php", // the PHP file you wrote earlier
      dataType: "json",
      success: function(data) {
        let requestContent = '';
        data.requests.forEach(function(request) {
          requestContent += `
            <p> <i class="fa fa-comments-o" style="color:blue;"></i> <strong>Request Code:</strong> ${request.request_id} | <strong>Status:</strong> ${request.request_status === 0 ? "Pending" : "Approved"}</p>
          `;
        });
        $('#userRequestCardContent').html(requestContent);


        let notificationContent = '';
        data.notifications.forEach(function(notification) {
            ctr=ctr+1;
          notificationContent += `
            <p><i class="fas fa-bell" style="color:blue;"></i> <strong>Title:</strong> ${notification.title} | <strong>Message:</strong> ${notification.message} | <strong>Time:</strong> ${new Date(notification.created_at).toLocaleString()}</p>
          `;
        });

        $('#notification-badge').text(ctr);
        $('#notificationCardContent').html(notificationContent);
      },
      error: function(xhr, status, error) {
        console.error("An error occurred: " + error);
      }
    });
  }
  
  // Invoke this function when the modal is shown
  $('#uniqueNotificationModal').on('shown.bs.modal', function () {
    populateModal();
  });
  