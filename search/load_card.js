

function createCardsFromJson(jsonData) {
  var cardRow = document.getElementById('card-row');

  // Clear previous cards
  cardRow.innerHTML = '';

  // Loop through each item in the JSON data
  jsonData.forEach(item => {
    // Fetching the reID and source_table from the first review if available
    var reID = item.allReviews.length > 0 ? item.allReviews[0].reID : null;
    var source_table = item.allReviews.length > 0 ? item.allReviews[0].source_table : null;

    var col = document.createElement('div');
    col.className = 'col-lg-3 col-sm-6';

    var card = document.createElement('div');
    card.className = 'card';

    var itemId = document.createElement('div');
    itemId.className = 'd-none';
    itemId.textContent = item.id;
    card.appendChild(itemId);

    var row = document.createElement('div');
    row.className = 'row';

    var imgCol = document.createElement('div');
    imgCol.className = 'col-12';

    var img = document.createElement('img');
    img.className = 'card-image';
    img.src = item.imageUrl;
    img.alt = item.title;

    var titleCol = document.createElement('div');
    titleCol.className = 'col-12';

    var title = document.createElement('h5');
    title.className = 'card-title';
    title.textContent = item.title;

    var descriptionCol = document.createElement('div');
    descriptionCol.className = 'col-12';

    var description = document.createElement('p');
    description.className = 'card-description';
    description.textContent = item.description;

    // Add star ratings
    var ratingCol = document.createElement('div');
    ratingCol.className = 'col-12 rating-container';
    ratingCol.dataset.reID = reID; // set data attribute
    ratingCol.dataset.source_table = source_table; // set data attribute

    var ratingDiv = document.createElement('div');
    ratingDiv.className = 'star-ratings';
    ratingDiv.innerHTML = generateStarHTML(item.averageRating);

    // Append new elements to the card
    imgCol.appendChild(img);
    titleCol.appendChild(title);
    descriptionCol.appendChild(description);
    ratingCol.appendChild(ratingDiv); // append the ratings

    row.appendChild(imgCol);
    row.appendChild(titleCol);
    row.appendChild(descriptionCol);
    row.appendChild(ratingCol); // append the rating column

    card.appendChild(row);
    col.appendChild(card);

    // Append the card to the container
    cardRow.appendChild(col);

    ratingCol.addEventListener('click', function(event) {
      var reID_text = this.dataset.reID;
      var table_text = this.dataset.source_table;

    //  alert(table_text);

      fillReviews(table_text, reID_text); 

      aeModal("seeReview");

      event.stopPropagation();
    });
  });


}


function generateStarHTML(rating) {
  //  rating=2;
    if (typeof rating === 'undefined' || rating === null) {
        rating = 0; // Set to 0 if undefined
    }
    
    rating = Math.round(rating);
    let starHTML = "";
    
    for (let i = 1; i <= 5; i++) {
        if (i <= rating) {
            starHTML += `<i class="fas fa-star filled"></i>`;  // Gold filled star
        } else {
            starHTML += `<i class="far fa-star"></i>`;  // Default color outlined star
        }
    }
    return starHTML;
}


function fillReviews(sourcetable, resource_id) {
  reviewData = null;
  $.ajax({
    type: "post",
    cache: false,
    url: "fetchReview.php",
    data: {sourcetable: sourcetable, resource_id: resource_id},
    dataType: "json",
    success: function (reviews, status) {
      reviewData = reviews;

      // Target only the review-wrapper within the specified modal
      $('#seeReview .review-wrapper').html('');

      // Fill the modal with the new reviews
      reviews.forEach(function (review) {
        var starsHtml = '';
        for (var i = 1; i <= 5; i++) {
          if (i <= review.rating) {
            starsHtml += '<span class="star" data-value="' + i + '" id="star_' + i + '" role="button"><i class="fas fa-star"></i></span>'; // Gold star
          } else {
            starsHtml += '<span class="star notSelected" data-value="' + i + '" id="star_' + i + '" role="button"><i class="far fa-star"></i></span>'; // Default star
          }
        }

        var reviewHtml = `
          <div class="col review-wrapper">
            <div class="rating-section mb-3">` + starsHtml + `</div>
            <p class="review-message">` + review.review_text + `</p>
          </div>
        `;

        // Append only to the modal-body of the specified modal
        $('#seeReview .modal-body').append(reviewHtml);
      });
    },
    error: function (xhr, status, error) {
      console.error(error);
    },
  });
}

  