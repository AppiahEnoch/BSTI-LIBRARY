<div class="modal fade" id="modalApproval_requests" tabindex="-1" aria-labelledby="modalApproval_requestsLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalApproval_requestsLabel">List of Requests</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modalApproval_requestCards">
        <!-- Cards will be dynamically added here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>








<!-- Modal HTML -->
<div class="modal fade" id="adminAlertModal" tabindex="-1" aria-labelledby="adminAlertModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adminAlertModalLabel">Choose an Action</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <!-- Approve User Request Card -->
          <div class="col">
            <div id="cardRequest" class="card">
              <div class="card-body">
                <h5 class="card-title">Approve User Request</h5>
                <p class="card-text">Approve requests from users to access certain features.</p>
              </div>
            </div>
          </div>
          <!-- Send Notification Card -->
          <div class="col">
            <div id="cardNotification"  class="card">
              <div class="card-body">
                <h5 class="card-title">Send Notification</h5>
                <p class="card-text">Send notifications to users about updates or news.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<!-- HTML code -->
<div class="modal fade" id="listNotificationModal" tabindex="-1" aria-labelledby="listNotificationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="listNotificationModalLabel">All Notifications</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="notificationList">
        <!-- Notifications will be populated here -->
      </div>
    </div>
  </div>
</div>









<div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header d-flex justify-content-between align-items-center">
  <h5 class="modal-title" id="notificationModalLabel">Issue Notification</h5>
  <div class="row p-1">
<div class="col-6">

<button type="button" class="btn btn-danger p-2 ml-2" id="openDeleteModal" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Notification">
      <i class="fas fa-trash"></i>
    </button>
</div>
<div class="col-6">

<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
  </div>
</div>


      <div class="modal-body">
        <form id="notificationForm">
          <div class="mb-3">
            <label for="notificationTitle" class="form-label">Notification Title</label>
            <input type="text" class="form-control" id="notificationTitle" name="notificationTitle" required>
          </div>
          <div class="mb-3">
            <label for="notificationMessage" class="form-label">Notification Message</label>
            <textarea class="form-control" id="notificationMessage" name="notificationMessage" rows="4" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
