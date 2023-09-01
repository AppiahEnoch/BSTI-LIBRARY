function fetchModalApprovalRequests() {
  $.ajax({
    type: "GET",
    url: "fetch_approval_requests.php",
    dataType: "json",
    success: function(data) {
      let cards = '';
      data.forEach(function(request) {
        const image_url = request.image_url ? `<img src="${request.image_url}" alt="Resource Image" class="card-img-top">` : "";
        const description = `Title: ${request.title}, Description: ${request.description}, Approval Code: ${request.approval_code || 'N/A'}`;
        const userDetailsCard = `
          <div class="card">
            <div class="card-body">
              <p class="card-text">${request.user_details}</p>
            </div>
          </div>
        `;

        cards += `
          <div class="card my-2">
            ${image_url}
            <div class="card-body">
              <h5 class="card-title"><strong>Request ID: ${request.request_id}</strong></h5>
              ${userDetailsCard}
              <p class="card-text">${description}</p>
              <p class="card-text">Status: ${request.request_status === 0 ? "Pending" : "Approved"}</p>
              <button class="btn btn-success modalApproval_approveBtn" data-id="${request.id}">Approve</button>
              <button class="btn btn-danger modalApproval_rejectBtn" data-id="${request.id}">Reject</button>
            </div>
          </div>`;
      });
      $('#modalApproval_requestCards').html(cards);
    },
    error: function(xhr, status, error) {
      showToast("aeToastE", "Error", "An error occurred: " + error, "20");
    }
  });
}

  
  $(document).ready(function() {
   // aeModal2("modalApproval_requests")
    $('#modalApproval_requests').on('shown.bs.modal', function () {
      fetchModalApprovalRequests();
    });
  
    // Approve button event listener
    $(document).on('click', '.modalApproval_approveBtn', function() {
      let requestId = $(this).data('id');
      updateRequestStatus(requestId, 1);  
      getBubble()
      // 1 for approved
    });
  
    // Reject button event listener
    $(document).on('click', '.modalApproval_rejectBtn', function() {
      let requestId = $(this).data('id');
      updateRequestStatus(requestId, 0);  // 0 for pending/rejected
      getBubble()
    });
  });
  
  // Function to update request status
  function updateRequestStatus(requestId, newStatus) {



    $.ajax({
      type: "POST",
      url: "update_request_status.php",
      data: {
        id: requestId,
        status: newStatus
      },
      success: function(response) {
        fetchModalApprovalRequests();
      },
      error: function(xhr, status, error) {
        alert("An error occurred: " + error);
      }
    });
  }
  