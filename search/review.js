$(document).ready(function() {
    setupReviewSubmissionForModal('recordReviews', 'submitReviewBtn1', 'reviewText');
});


function setupReviewSubmissionForModal(modalId, btnId, textAreaId) {
    const submitReviewBtn = document.getElementById(btnId);
    submitReviewBtn.addEventListener('click', function() {
        // Get the number of filled stars
        const rating = document.querySelectorAll(`#${modalId} .rating-section .fas.fa-star`).length;
        const reviewText = document.getElementById(textAreaId);
        const numberOfStars = rating;
        const message = reviewText.value.trim();

        if (rating === 0 || message === "") {
            showToast("aeToastE", "REVIEW INCOMPLETE", "Please select a star rating and write a review before submitting.", 20);
            return;
        }

        // Call saveReview directly here
        saveReview(modalId, recordID_g, numberOfStars, message, tableName_g);
    });
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
