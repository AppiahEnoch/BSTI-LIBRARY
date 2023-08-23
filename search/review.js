// Function to set up star rating event listeners for a given modal
function setupStarRatingForModal(modalId) {
    const stars = document.querySelectorAll(`#${modalId} .star`);
    stars.forEach(star => {
        star.addEventListener('click', function() {
            const value = parseInt(this.getAttribute('data-value'));
            
            // Reset all stars
            stars.forEach(s => {
                const starValue = parseInt(s.getAttribute('data-value'));
                if (starValue <= value) {
                    s.querySelector('i').className = 'fas fa-star';
                } else {
                    s.querySelector('i').className = 'far fa-star';
                }
            });
        });
    });
}

// Function to set up review submission for a given modal
function setupReviewSubmissionForModal(modalId, btnId, textAreaId) {
    const submitReviewBtn = document.getElementById(btnId);
    submitReviewBtn.addEventListener('click', function() {
        // Get the number of filled stars
        const rating = document.querySelectorAll(`#${modalId} .fas.fa-star`).length;

        const reviewText = document.querySelector(`#${textAreaId}`);
        const message = reviewText.value.trim();

        if (rating === 0 || message === "") {
            showToast("aeToastE", "REVIEW INCOMPLETE", "Please select a star rating and write a review before submitting.", 20);
            return;
        }

        const bookId = materialData.id; 
        var databaseTable = "ebook";
        if (materialData.filePath == null) {
            databaseTable = "book";
        }

        saveReview(bookId, rating, message, databaseTable);
    });
}

// Setting up for the first modal
setupStarRatingForModal('reviewModal');
setupReviewSubmissionForModal('reviewModal', 'submitReviewBtn1', 'reviewText');

// Setting up for the second modal
setupStarRatingForModal('reviewModal2');
setupReviewSubmissionForModal('reviewModal2', 'submitReviewBtn2', 'reviewText2');




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

          //  alert(data)
        
          showToast("aeToastR", "REVIEW SUBMITTED", "Thank you for your review!", 20);
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
