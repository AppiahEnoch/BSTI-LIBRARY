
<div class="modal fade" id="readingList" tabindex="-1" aria-labelledby="readingMaterialsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="background: #f4f4f4;">
        <div class="modal-header" style="background-color: #007bff; color: white;">
          <h5 class="modal-title" id="readingMaterialsModalLabel"><i class="fas fa-book-reader"></i> My Reading List at BSTI Library</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="list-group" id="readingMaterialsList">
       
          </div>
        </div>
        <div class="modal-footer" style="border-top: 1px solid #ddd;">
          <div class="col d-flex justify-content-between">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
            <button type="button" class="btn btn-danger" id="clearReadingList"><i class="fas fa-trash"></i> Clear List</button>  
       
          </div>
        </div>
      </div>
    </div>
  </div>
  














<div
  class="modal fade"
  id="seeReview"
  tabindex="-1"
  aria-labelledby="reviewModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reviewModalLabel">
          Reviews on this Material
        </h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <div class="col review-wrapper">
          <div class="rating-section mb-3">
            <span class="star" data-value="1" id="star_1" role="button"
              ><i class="fas fa-star"></i
            ></span>
            <span class="star" data-value="2" id="star_2" role="button"
              ><i class="fas fa-star"></i
            ></span>
            <span class="star" data-value="3" id="star_3" role="button"
              ><i class="fas fa-star"></i
            ></span>
            <span class="star" data-value="4" id="star_4" role="button"
              ><i class="fas fa-star"></i
            ></span>
            <span class="star" data-value="5" id="star_5" role="button"
              ><i class="fas fa-star"></i
            ></span>
          </div>
          <p class="review-message">
            This book was an incredible journey! I was immersed from start to
            finish and can't wait for the sequel.
          </p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
          Ok
        </button>
      </div>
    </div>
  </div>
</div>

<div
  class="modal fade"
  id="recordReviews"
  tabindex="-1"
  aria-labelledby="reviewModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reviewModalLabel">Review this Material</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <div class="review-list"></div>
        <textarea
          class="form-control review-textarea mb-3"
          placeholder="Write your review here..."
          id="reviewText"
        ></textarea>
      </div>
      <div class="modal-footer">
        <div class="btn-group" role="group">
          <div class="col d-flex justify-content-between">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-primary" id="submitReviewBtn1">
              Submit Review
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div
  class="modal fade"
  id="actionModal"
  tabindex="-1"
  aria-labelledby="actionModalLabel"
  aria-hidden="true"
>
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

<div
  style="max-width: 20rem"
  id="datePickerModal"
  class="modal fade"
  id="datePickerModal"
  tabindex="-1"
  aria-labelledby="modalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">LECTURES BEGIN FROM ? TO ?</h5>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="startDate" class="form-label">Start Date:</label>
            <input type="date" class="form-control" id="startDate" />
          </div>
          <div class="mb-3">
            <label for="endDate" class="form-label">End Date:</label>
            <input type="date" class="form-control" id="endDate" />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button
          style="width: 100%"
          id="btnDatePick"
          type="button"
          class="btn btn-primary"
        >
          OK
        </button>
      </div>
    </div>
  </div>
</div>
