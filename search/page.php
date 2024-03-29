<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title></title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./style.css?
    <?php echo filemtime("style.css"); ?>
    " /> 
    
    <link rel="stylesheet" href="./card.css?
    <?php echo filemtime("card.css"); ?>
    " />

    <link rel="stylesheet" href="./action_modal.css?
    <?php echo filemtime("action_modal.css"); ?>
    " />


  </head>
  <body>

           
  <a id="goBack" class="go-back" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Go Back">
          <i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i>
      </a>

    <div id="wrapper2" class="container-fluid search-wrapper">
      <h5>Search By</h5>
      <div class="container">
        <div class="row">
          <div class="col-lg col-md-6">
            <label for="classification" class="d-none d-md-block"
              >Classification:</label
            >
            <select
              name="classification"
              id="classification"
              class="form-select d-none d-md-block"
            >
              <option value="none">None</option>
              <option value="fiction">Fiction</option>
              <option value="non fiction">none fiction</option>
            </select>
          </div>
          <div class="col-lg col-md-6 col-sm-12">
            <label for="title">Title:</label>
            <input
              type="text"
              id="title"
              name="title"
              class="form-control"
              placeholder="Book Title"
            />
          </div>
          <div class="col-lg col-md-6 col-sm-12">
            <label for="author">Author:</label>
            <input
              type="text"
              id="author"
              name="author"
              class="form-control"
              placeholder="Author Name"
            />
          </div>
          <div class="col-lg col-md-6">
            <label for="author" class="d-none d-md-block">Unique ID:</label>
            <input
              type="text"
              id="uniqueid"
              name="uniqueid"
              class="form-control d-none d-md-block"
              placeholder=" eg. ISBN number"
            />
          </div>
          <div class="col-lg col-md-6">
            <label for="material_type" class="d-none d-md-block"
              >Material Type:</label
            >
            <select
              name="material_type"
              id="material_type"
              class="form-select d-none d-md-block"            
            >
              <option value="none">none</option>
              <option value="e-book">E-Book</option>
              <option value="printed_book">Printed Book</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <div class="container search-results">
      <div id="card-row" class="row center-elements">
        
 

       
       
      </div>
    </div>

    <?php include '../aeM.php'; ?>
    <?php include '../aeT.php'; ?>
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
    <script
      src="https://kit.fontawesome.com/c1db89cf54.js"
      crossorigin="anonymous"
    ></script>

    <script src="../ae.js?version=<?php echo filemtime('../ae.js'); ?>"></script>
    <script src="load_card.js?version=<?php echo filemtime('load_card.js'); ?>"></script>
    <script src="filter.js?version=<?php echo filemtime('filter.js'); ?>"></script>
    <script src="card_event.js?version=<?php echo filemtime('card_event.js'); ?>"></script>
    <script src="action_modal.js?version=<?php echo filemtime('action_modal.js'); ?>"></script>
    <script src="review.js?version=<?php echo filemtime('review.js'); ?>"></script>
    <script src="goBack.js?version=<?php echo filemtime('goBack.js'); ?>"></script>
    <script src="reading_list.js?version=<?php echo filemtime('reading_list.js'); ?>"></script>
 
   
  </body>
</html>
