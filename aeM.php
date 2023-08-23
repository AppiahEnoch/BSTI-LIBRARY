


<div class="modal fade" id="reviewModal2" tabindex="-1" aria-labelledby="actionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- enlarged modal size -->
        <div class="modal-content colorful-modal">
            <div class="modal-header">
                <h5 class="modal-title" id="actionModalLabel">Reviews for [Book Title]</h5> <!-- Placeholder for Book Title -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="review-list">
                    <!-- Dynamically populated list of reviews -->
                </div>

                <hr>

                <h6>Rate and Review:</h6>
                <div class="rating-section">
                    <span class="star" data-value="1" id="star11"><i class="far fa-star"></i></span>
                    <span class="star" data-value="2" id="star21"><i class="far fa-star"></i></span>
                    <span class="star" data-value="3" id="star31"><i class="far fa-star"></i></span>
                    <span class="star" data-value="4" id="star41"><i class="far fa-star"></i></span>
                    <span class="star" data-value="5" id="star51"><i class="far fa-star"></i></span>
                </div>
                <div class="mt-3">
                    <textarea class="form-control review-textarea" placeholder="Write your review here..." id="reviewText2"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitReviewBtn2">Submit Review</button>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">Review Book</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="rating-section mb-3">
                <span class="star" data-value="1" id="star1" role="button"><i class="far fa-star"></i></span>
<span class="star" data-value="2" id="star2" role="button"><i class="far fa-star"></i></span>
<span class="star" data-value="3" id="star3" role="button"><i class="far fa-star"></i></span>
<span class="star" data-value="4" id="star4" role="button"><i class="far fa-star"></i></span>
<span class="star" data-value="5" id="star5" role="button"><i class="far fa-star"></i></span>

                </div>
                <textarea class="form-control review-textarea mb-3" placeholder="Write your review here..." id="reviewText"></textarea>
            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submitReviewBtn1">Submit Review</button>
                </div>
            </div>
        </div>
    </div>
</div>








<div class="modal fade" id="actionModal" tabindex="-1" aria-labelledby="actionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item action-item" data-action="read">
                            <i class="fas fa-book-reader"></i> Read Book
                        </li>
                        <li class="list-group-item action-item" data-action="review">
                            <i class="fas fa-star"></i> Review Book
                        </li>
                        <li class="list-group-item action-item" data-action="add-to-list">
                            <i class="fas fa-bookmark"></i> Add to Reading List
                        </li>
                        <li class="list-group-item action-item" data-action="request">
                            <i class="fas fa-hand-pointer"></i> Request for Book
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



<div style="max-width:20rem;" id="datePickerModal" class="modal fade" id="datePickerModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">LECTURES BEGIN FROM ? TO ?</h5>
          
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="startDate" class="form-label">Start Date:</label>
                        <input type="date" class="form-control" id="startDate">
                    </div>
                    <div class="mb-3">
                        <label for="endDate" class="form-label">End Date:</label>
                        <input type="date" class="form-control" id="endDate">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                
                <button style="width:100%" id="btnDatePick" type="button" class="btn btn-primary">OK</button>
            </div>
        </div>
    </div>
</div>
