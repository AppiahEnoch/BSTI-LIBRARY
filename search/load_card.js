function createCardsFromJson(jsonData) {
    var cardRow = document.getElementById('card-row');

    // Clear previous cards
    cardRow.innerHTML = '';

    // Loop through each item in the JSON data
    jsonData.forEach(item => {
        // Create new card elements

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
    });

    //aeModal("actionModal2");
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



