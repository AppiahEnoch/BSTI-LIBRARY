$(document).ready(function () {
  viewReviewForm();
});

function viewReviewForm() {
  $.ajax({
      type: "POST",
      cache: false,
      url: "fetchViewRequest.php",
      dataType: "json",
      success: function (data) {

        //alert(data)

        
          populateViewRequestModal(data);
      },
      error: function (xhr, status, error) {
          console.error(error);
      }
  });
}

function populateViewRequestModal(jsonData) {
  const modalBody = document.querySelector('#viewRrequestModal .modal-body .row');
  
  if (!modalBody) {
      console.error('Modal body not found.');
      return;
  }

  modalBody.innerHTML = '';

  jsonData.forEach(request => {
      const colDiv = document.createElement('div');
      colDiv.className = 'col-md-4';

      const cardDiv = document.createElement('div');
      cardDiv.className = 'card';

      const deleteIcon = document.createElement('i');
      deleteIcon.className = 'fas fa-trash delete-icon';
      deleteIcon.style.position = 'absolute';
      deleteIcon.style.right = '10px';
      deleteIcon.style.top = '10px';
      deleteIcon.setAttribute('data-request-id', request.request_id);
      deleteIcon.setAttribute('data-bs-toggle', 'tooltip');
      deleteIcon.setAttribute('data-bs-placement', 'left');
      deleteIcon.title = 'Click to delete Request';
      cardDiv.appendChild(deleteIcon);
      
      // Initialize Bootstrap tooltip
      new bootstrap.Tooltip(deleteIcon);
      

      const img = document.createElement('img');
      img.className = 'card-img-top';
      img.src = request.image_url;
      img.alt = 'Resource Image';
      cardDiv.appendChild(img);

      const cardBody = document.createElement('div');
      cardBody.className = 'card-body';

      const title = document.createElement('h5');
      title.className = 'card-title';
      title.id = 'requestID';
      title.textContent = `Request ID: ${request.request_id}`;
      cardBody.appendChild(title);

      const description = document.createElement('p');
      description.className = 'card-text';
      description.id = 'requestDescription';
      description.textContent = request.description;
      cardBody.appendChild(description);

      cardDiv.appendChild(cardBody);
      colDiv.appendChild(cardDiv);
      modalBody.appendChild(colDiv);

      deleteIcon.addEventListener('click', function() {

          const requestId = this.getAttribute('data-request-id');
        //  alert(requestId)
          $.ajax({
              type: 'POST',
              url: 'delete_request.php',
              data: { request_id: requestId },
              success: function(response) {
               // alert(response)

                  if (response ==1) {
                      colDiv.remove();
                    //  alert(response.message);
                  } else {
                      alert('Failed to delete the request.');
                  }
              },
              error: function(xhr, status, error) {
               // alert(error)
              }
          });
      });
  });

 //aeModal2("viewRrequestModal")
}
