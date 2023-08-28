// Fetch notifications
$(document).ready(function() {
 // alert(333);
 // fetchNotifications();
});

function fetchNotifications() {
  $.ajax({
    type: "GET",
    url: "fetch_notifications.php",
    dataType: "json",
    success: function(data) {
      let content = '';
      data.forEach(function(notification) {
        content += `
        <div class="card notification-card mb-3">
          <div class="card-body">
            <h5 class="card-title notification-text">${notification.title}</h5>
            <p class="card-text notification-message">${notification.message}</p>
            <p class="card-subtitle mb-2 text-muted notification-date">${notification.created_at}</p>
          </div>
          <div class="card-footer">
            <button class="btn btn-primary btn-sm deleteNotification" data-id="${notification.id}">Delete</button>
          </div>
        </div>`;
      });
      $('#notificationList').html(content);
      aeModal2("listNotificationModal");
    },
    error: function(xhr, status, error) {
      alert("An error occurred: " + error);
    }
  });
}


// Delete a notification
$(document).on('click', '.deleteNotification', function() {
  const id = $(this).data('id');
  $.ajax({
    type: "POST",
    url: "delete_notification.php",
    data: {id: id},
    success: function() {
      fetchNotifications();  // Refresh the list
    },
    error: function(xhr, status, error) {
      alert("An error occurred: " + error);
    }
  });
});
