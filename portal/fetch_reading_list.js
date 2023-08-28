


function fetchReadingList() {
    $.ajax({
      type: "POST",
      data: {
        id: "none",
      },
      cache: false,
      url: "fetch_reading_list.php",  // Make sure to put the correct relative or absolute path
      dataType: "json",
      success: function (data, status) {
      // alert(data); // Logging data for debugging
        populateModal1(data); // Populate modal with received data
      },
      error: function (xhr, status, error) {
        console.error("An error occurred: ", error);
      },
    });
  }
  
  



  function populateModal1(jsonData) {
    const modalBody = document.getElementById('readingMaterialsList');
    
    if (modalBody === null) {
        console.error('Element with id "readingMaterialsList" not found.');
        return;
    }

    modalBody.innerHTML = ''; // Clear existing content

    jsonData.forEach(resource => {
        const resourceDiv = document.createElement('div');
        resourceDiv.className = 'resource-item';

        // Storing resource_id and resource_type in hidden elements
        const hiddenId = document.createElement('div');
        hiddenId.className = 'd-none';
        hiddenId.id = 'resource_id';
        hiddenId.textContent = resource.resource_id;
        resourceDiv.appendChild(hiddenId);

        const hiddenType = document.createElement('div');
        hiddenType.className = 'd-none';
        hiddenType.id = 'resource_type';
        hiddenType.textContent = resource.resource_type;
        resourceDiv.appendChild(hiddenType);

        // Adding image URL
        const image = document.createElement('img');
        image.src = resource.url;
        image.alt = resource.title;
        image.className = 'resource-image';
        resourceDiv.appendChild(image);

        // Adding title and description
        const textDiv = document.createElement('div');
        textDiv.className = 'text-content';

        const titleP = document.createElement('p');
        const titleSpan = document.createElement('span');
        titleSpan.className = 'resource-title';
        titleSpan.textContent = resource.title;
        titleP.appendChild(titleSpan);
        
        const descriptionP = document.createElement('p');
        const descriptionSpan = document.createElement('span');
        descriptionSpan.className = 'resource-description';
        descriptionSpan.textContent = resource.description;
        descriptionP.appendChild(descriptionSpan);

        textDiv.appendChild(titleP);
        textDiv.appendChild(descriptionP);
        resourceDiv.appendChild(textDiv);

        modalBody.appendChild(resourceDiv);
    });

    // Assuming aeModal is a function you've written to display the modal
    aeModal("readingList");
}


$(document).ready(function() {
  $('#clearReadingList').click(function() {
    var isConfirmed = window.confirm("Are you sure you want to clear your reading list?");

    if (isConfirmed) {
      $.ajax({
        type: "POST",
        url: "clear_reading_list.php",
        success: function(response) {
          if (response === 'success') {
            alert("Reading List Cleared!");
          } else {
            alert("Failed to clear reading list. Try again.");
          }
        },
        error: function(xhr, status, error) {
          console.error("An error occurred: " + error);
        }
      });
    }
  });
});
