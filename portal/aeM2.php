
<div class="modal fade" id="uniqueNotificationModal" tabindex="-1" aria-labelledby="uniqueNotificationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uniqueNotificationModalLabel">User Requests and Notifications</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Card for User Requests -->
        <div class="card my-3" id="userRequestCard">
          <div class="card-header">
            User Requests <i class="fa fa-comments-o fa-2x" style="color:blue;" aria-hidden="true"></i>
          </div>
          <div class="card-body" id="userRequestCardContent">
            <!-- Content will be populated here -->
          </div>
        </div>
        
        <!-- Card for Notifications -->
        <div class="card my-3" id="notificationCard">
          <div class="card-header">
            Notifications <i class="fas fa-bell fa-2x" style="color:blue;"></i>
          </div>
          <div class="card-body" id="notificationCardContent">
            <!-- Content will be populated here -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

















<div class="modal fade" id="viewRrequestModal" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="requestModalLabel">Your Requests</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <!-- Single request card -->
          <div class="col-md-4">
            <div class="card">
              <img src="path/to/image.jpg" class="card-img-top" alt="Resource Image">
              <div class="card-body">
                <h5 class="card-title" id="requestID">Request ID: 12345</h5>
                <p class="card-text" id="requestDescription">This is a sample description for the requested resource.</p>
              </div>
            </div>
          </div>
          <!-- End of single request card -->
          <!-- Additional cards would go here -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
