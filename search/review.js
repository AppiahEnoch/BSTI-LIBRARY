// Variables for elements
const stars = document.querySelectorAll('.star');
const reviewText = document.querySelector('.review-textarea'); // Adjusted this
const submitReviewBtn = document.querySelector('.btn-primary'); // Adjusted this

// Event listener for star rating
stars.forEach((star) => {
    star.addEventListener('click', function() {
        // Remove selected class from all stars
        stars.forEach((s) => s.classList.remove('selected'));

        // Add selected class to clicked star and all previous stars
        let value = parseInt(this.getAttribute('data-value'), 10);
        for(let i = 1; i <= value; i++) {
            document.getElementById(`star${i}`).classList.add('selected');
            // Also change the star icon to solid (filled)
            document.querySelector(`#star${i} i`).className = 'fas fa-star';
        }

        // Change the stars that weren't selected to regular (outline)
        for(let j = value + 1; j <= 5; j++) {
            document.querySelector(`#star${j} i`).className = 'far fa-star';
        }
    });
});

// Event listener for the review submission
submitReviewBtn.addEventListener('click', function() {
    const numberOfStars = document.querySelectorAll('.star.selected').length;
    const message = reviewText.value.trim();

    if (numberOfStars === 0 || message === "") {
        showToast("aeToastE", "REVIEW INCOMPLETE", "Please select a star rating and write a review before submitting.", 20);
        return; // Exit early to prevent further code execution
    }

    // Assuming materialData is globally available or within the scope of this function
    const bookId = materialData.id; 
    var databaseTable="ebook";
    if(materialData.filePath==null){
        databaseTable="book";
    }

   // console.log(`Submitting review for Book ID ${bookId} with ${numberOfStars} star(s) and review text: ${message}`);
    saveReview(bookId, numberOfStars, message,databaseTable);
});




function saveReview(id, numberOfStars, message,databaseTable) {
    $.ajax({
        type: "post",
        data: {
            bookid: id,            // Assuming you'll pass the book's id
            tableName: databaseTable,            // Assuming you'll pass the book's id
            numberOfStars: numberOfStars,   // corrected the variable spelling and assignment
            message: message
        },
        cache: false,
        url: "review.php",
        dataType: "text",
        success: function (data, status) {
            // Handle success here
            alert(data)
            // For instance, you can show a success toast or alert
          //  showToast("aeToastS", "REVIEW SUBMITTED", "Thank you for your review!", 20);
        },
        error: function (xhr, status, error) {
            // Handle error here
            // This will execute if there's a server-side error or if the request fails for any reason
            showToast("aeToastE", "ERROR", "There was an error submitting your review.", 20);
        }
    });
}



// Example of loading reviews into the modal. You would call this function when a user opens the modal for a specific book.

function loadReviewsIntoModal(reviews) {
    const reviewListDiv = document.querySelector('.review-list');
    reviewListDiv.innerHTML = ""; // clear existing reviews

    reviews.forEach(review => {
        const singleReviewDiv = document.createElement('div');
        singleReviewDiv.classList.add('single-review');

        // Add star ratings
        let starHTML = "";
        for (let i = 1; i <= 5; i++) {
            starHTML += `<i class="fa${i <= review.rating ? 's' : 'r'} fa-star"></i>`;
        }

        singleReviewDiv.innerHTML = `
            <div class="stars">
                ${starHTML}
            </div>
            <p>${review.message}</p>
        `;
        reviewListDiv.appendChild(singleReviewDiv);
    });
}

// Call this function when the modal is triggered.
// loadReviewsIntoModal(reviewsArray); // where reviewsArray is the array of reviews you fetched for a book
