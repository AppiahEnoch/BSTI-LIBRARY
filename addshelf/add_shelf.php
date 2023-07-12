<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Create Shelf</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="add_shelf.css?
    <?php echo filemtime("add_shelf.css"); ?>
    " />
  </head>
  <body>

    <div class="row justify-content-center align-items-center m-auto">
      <!-- This column will be hidden on xs screens, but visible on medium and up screens -->
      <div id="table-wrapper" class="col-md-6 d-none d-md-block">
        <h3 class="text-center">Edit</h3>
        <table id="editable-table"> 

        </table>
      </div>
  
      <!-- This column will take up the full width on xs screens, and 9 columns on medium and up screens -->
      <div class="col-12 col-md-6">
        <div id="wrapper10" class="col text-center">
                   
        <a class="go-back" href="../admin/admin.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Go Back">
          <i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i>
      </a>

          <h3 class="text-center">Add New Shelf</h3>
          <h4 class="text-center">Shelf N0# <span id="shelf_number" >7</span></h4>
          <form
              id="shelf-info-form"
              class="row  d-flex align-items-center justify-content-center mt-1"
          >
          <div class="input-group mb-1">
            <span class="input-group-text">
                <i class="fa fa-book" aria-hidden="true"></i>
            </span>
            <select class="form-control" id="classification" name="classification" required>
              <option value="">Select Classification</option>
              <option value="Fiction Books">Fiction Books</option>
              <option value="Non-Fiction Books">Non-Fiction Books</option>
          </select>
      
        </div>
  
        <div class="wrapper1 d-none mt-0"">
          <div class="input-group mt-0">
            <span class="input-group-text">
                <i class="fa fa-book" aria-hidden="true"></i>
            </span>
            <select class="form-control" id="fiction_options" name="fiction_options">
              <option value="Type of Fiction">Type of Fiction</option>
              <option value="general-fiction">General Fiction</option>
              <option value="mystery">Mystery & Thriller</option>
              <option value="fantasy">Fantasy</option>
              <option value="science-fiction">Science Fiction</option>
              <option value="romance">Romance</option>
              <option value="horror">Horror</option>
              <option value="historical-fiction">Historical Fiction</option>
              <option value="childrens-fiction">Children's Fiction</option>
              <option value="young-adult">Young Adult</option>
              <option value="graphic-novels">Graphic Novels and Comics</option>
  
            </select>
        </div>
        
        </div>
  
     <div class="wrapper2 d-none mt-0"">
  
      <div class="input-group mb-0">
        <span class="input-group-text">
            <i class="fa fa-book" aria-hidden="true"></i>
        </span>
        <select class="form-control" id="non_fiction_option" name="non_fiction_option">
          <option value="Type Of Non-fiction">Type Of Non-fiction</option>
          <option value="biographies">Biographies and Autobiographies</option>
          <option value="history">History</option>
          <option value="science">Science & Technology</option>
          <option value="self-help">Self-Help</option>
          <option value="travel">Travel</option>
          <option value="cookbooks">Cookbooks</option>
          <option value="academic-texts">Academic Texts</option>
          <option value="reference">Reference</option>
          <option value="government-documents">Government Documents</option>
          <option value="business">Business & Economics</option>
          <option value="health">Health & Wellness</option>
          <option value="art-and-photography">Art and Photography</option>
          <option value="religion-and-spirituality">Religion and Spirituality</option>
          <option value="music-and-movies">Music and Movies</option>
          <option value="language-learning">Language Learning</option>
         
        </select>
   
      </div>
     </div>
  
      
              
              <!-- Description of the shelf -->
              <div class="input-group mb-3">
                  <span class="input-group-text">
                      <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                  </span>
                  <input
                  type="text"
                      required
                      class="form-control"
                      id="capacity"
                      name="description"
                      placeholder="Number of cells"
                  >
              </div>

              <div class="input-group mb-3">
                  <span class="input-group-text">
                      <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                  </span>
                  <textarea
                      required
                      class="form-control"
                      id="description"
                      name="description"
                      placeholder="Description"
                      rows="3"
                  ></textarea>
              </div>
              
              <!-- Submit Button -->
              <div class="col-12 mb-2">
                  <button id="btsubmit" type="submit" class="btn btn-primary">
                      Create Shelf
                  </button>
              </div>
          </form>
      </div>
      </div>
  </div>
  


    

<!-- BEGIN MY TOASTS -->


<div id="aeToastE" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
   
  <div class="toast-header bg-danger text-white">
      <i style="color:white" class="fa fa-exclamation-triangle me-2" aria-hidden="true"></i>
    <strong class="me-auto">Error!</strong>
    <small>AECleanCodes</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">

  </div>
</div>



<div id="aeToastS" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header bg-success text-white">
      <i style="color: white;" class="bi bi-check-circle-fill me-2"></i>
    <strong class="me-auto">Success!</strong>
    <small>Success!</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">

  </div>
</div>

<!-- END MY TOASTS -->



<!-- BEGIN MY ALERTS -->
    <div id="alert1" class="alert alert-success  d-none alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle-fill"></i> Item Uploaded Successfully!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<!-- END MY ALERTS -->


<!-- BEGIN MY SPIN-->
<i id="spin1" class="fas fa-spinner fa-spin d-none "></i>
<!-- END MY SPIN -->



  <div id="spinner-container" class="spinner-container text-center" style="display: none">
    <div class="spinner-border" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
    <p class="loading-text">Processing ...</p>
  </div>
  
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
      integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
      integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://code.jquery.com/jquery-3.7.0.min.js"
      integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
      crossorigin="anonymous"
    ></script>
    <script src="https://kit.fontawesome.com/c1db89cf54.js" crossorigin="anonymous"></script>
    <script src="../ae.js"></script>
    <script src="add_shelf.js?version=<?php echo filemtime('add_shelf.js'); ?>"></script>
    <script src="init.js?version=<?php echo filemtime('init.js'); ?>"></script>
    <script src="fetch_shelf_items.js?version=<?php echo filemtime('fetch_shelf_items.js'); ?>"></script>
  </body>
</html>
