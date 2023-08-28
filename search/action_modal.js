document.addEventListener('DOMContentLoaded', function() {
    // Get all action items
    const actionItems = document.querySelectorAll('.action-item');

    actionItems.forEach(item => {
        item.addEventListener('click', function(e) {
            // Get the action from the data-action attribute
            const action = e.currentTarget.getAttribute('data-action');
            switch(action) {
                case 'read':
                    handleReadAction();
                    break;
                case 'review':
                    handleReviewAction();
                    break;
                case 'add-to-list':
                    handleAddToListAction();
                    break;
                case 'request':
                    handleRequestAction();
                    break;
                default:
                    console.error('Unknown action:', action);
            }
        });
    });
});

function handleReadAction() {
    var file = materialData.filePath;

    if(aeEmpty(file)) {
        showToast("aeToastE", "REQUEST FOR THIS BOOK", "ONLY HARD COPY IS AVAILABLE", 20);
        return;
    }

  

    isFilePDF31(file).then(result => {
        if (result.valid && result.type === 'pdf') {
            window.open(file, "_blank"); // This opens the PDF in a new browser tab/window
        } else if (result.type === 'docx') {
            showToast("aeToastE", "FILE DOWNLOADED", "DOWNLOAD TO READ.", 20);
            aeDownload(file)
        } else {
            showToast("aeToastE", "REQUEST FOR THIS BOOK", "ONLY HARD COPY IS AVAILABLE", 20);
        }
    });
}


function handleReviewAction() {
  //  alert(recordID_g)

    loadReview(tableName_g, recordID_g);

      
    // Your logic here
}

function handleAddToListAction() {
//alert('Handling Add to Reading List action');
showToastYN("aeToastYN2", "CONFIRM READING LIST UPDATE", "CONFIRM READING LIST UPDATE", 20);
    // Your logic here
}

function handleRequestAction() {

    window.location.href = "../borrow/page.php";


    
    // Your logic here
}



function isFilePDF31(fileUrl) {
    return fetch(fileUrl, { method: 'HEAD' })
        .then(response => {
            if (response.ok) {
                var type = response.headers.get("Content-Type");
                var size = Number(response.headers.get("Content-Length")) / 1024 / 1024; // Size in MB
                
                if (size > 3) {
                    showToast("aeToastE", "FILE TOO LARGE", "Your file is too large", 20);
                    return { valid: false, type: null };
                }
                
                if (type === "application/pdf") {
                    return { valid: true, type: 'pdf' };
                } else if (type === "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
                    return { valid: false, type: 'docx' };
                } else {
                    showToast("aeToastE", "UNSUPPORTED FORMAT", "Please Choose PDF or DOCX File", 20);
                    return { valid: false, type: null };
                }
            } else {
                showToast("aeToastE", "ERROR", "Failed to fetch file", 20);
                return { valid: false, type: null };
            }
        })
        .catch(error => {
            showToast("aeToastE", "ERROR", error.message, 20);
            return { valid: false, type: null };
        });
}


function loadReview(sourcetable, resource_id) {
    reviewData = null;
    $.ajax({
        type: "post",
        cache: false,
        url: "fetchReview.php",
        data: {sourcetable: sourcetable, resource_id: resource_id},
        dataType: "json", // Change to JSON since you're expecting a JSON response
        success: function (reviews, status) {
            reviewData = reviews[0];

       
            
            
       



            loadReviewsIntoModal("recordReviews", reviewData);
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
}

function loadReviewsIntoModal(modalId, reviews) {
    const reviewListDiv = document.querySelector(`#${modalId} .review-list`);
    const textArea = document.querySelector(`#${modalId} textarea`);
    reviewListDiv.innerHTML = ""; // Clear existing reviews

    // If reviews is not an array, convert it to an array
    if (!Array.isArray(reviews)) {
        reviews = [reviews];
    }

    // Create a div for user star ratings
    const userRatingSection = document.createElement('div');
    userRatingSection.classList.add('rating-section', 'mb-3');
    userRatingSection.id = "userRating";

    // Generate user rating stars dynamically
    for (let i = 1; i <= 5; i++) {
        const starSpan = document.createElement('span');
        starSpan.className = "star";
        starSpan.dataset.value = i;
        starSpan.role = "button";
        starSpan.innerHTML = `<i class="far fa-star"></i>`;
        userRatingSection.appendChild(starSpan);
    }

    // Append the star rating section to the review list div
    reviewListDiv.appendChild(userRatingSection);

    reviews.forEach(review => {
        
        // Populate the textarea with the review text
   
        if (reviewData && reviewData.hasOwnProperty('review_text')) {
            textArea.value = review.review_text;
            
        } 
        
        // Fill stars based on the review.rating
    
    });

    // Attach click event to user rating stars
    userRatingSection.querySelectorAll('.star').forEach(star => {
        star.addEventListener('click', function() {
            const ratingValue = this.dataset.value;
            userRatingSection.querySelectorAll('.star').forEach((star, index) => {
                star.querySelector('i').className = index < ratingValue ? "fas fa-star" : "far fa-star";
            });
        });
    });

    aeModal2(modalId); 
}




function saveReview(modalId, id, numberOfStars, message, databaseTable) {
    $.ajax({
        type: "post",
        data: {
            bookid: id,
            tableName: databaseTable,
            numberOfStars: numberOfStars,
            message: message
        },
        cache: false,
        url: "review.php",
        dataType: "text",
        success: function (data, status) {
            showToast("aeToastR", "REVIEW SUBMITTED", "Thank you for your review!", 20);

            // Optionally, you can close the modal after submitting
            $(`#${modalId}`).modal('hide');
        },
        error: function (xhr, status, error) {
            showToast("aeToastE", "ERROR", "There was an error submitting your review.", 20);
        }
    });
}