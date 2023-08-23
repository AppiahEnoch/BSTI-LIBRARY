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
    <link rel="stylesheet" href="./table.css?
    <?php echo filemtime("table.css"); ?>
    " />

  </head>
  <body>
    <div
      class="container-fluid d-flex align-items-center justify-content-center vh-100"
    >
      <div id="wrapper1" class="row gap-4 m-auto mt-3">
        <div
          id="wrapper2"
          class="col d-flex justify-content-center align-items-center min-size order-2 order-md-1"
        >
          <form
            id="form2"
            class="row g-3 d-flex align-items-center justify-content-center m-auto mt-3"
          >
        
          <div id="table-wrapper" class="col">
            <table id="editable-table" class="table">
              <thead>
                  <tr>
                      <th>Type</th>
                      <th>Title</th>
                      <th>Author</th>
                      <th>Year</th>
                      <th>Description</th>
                      <th>URL</th>
                      <th>Date</th>
                      <th>Delete</th>
                  </tr>
              </thead>
              <tbody></tbody>
          </table>
          </div>

        
        
        </form>
        </div>

        <div
          id="wrapper3"
          class="glowing  col d-flex justify-content-center align-items-center min-size order-1 order-md-2 position-relative"
        >
        <a class="go-back" href="../admin/admin.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Go Back">
          <i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"></i>
      </a>
      
          <img
            class="ae-icon-size d-none"
            id="file_icon1"
            src="../devimage/word.png"
            alt=""
          />
          <img
            class="ae-icon-size d-none"
            id="file_icon2"
            src="../devimage/pdf.png"
            alt=""
          />
          <form
            id="form1"
            class="row g-1 d-flex align-items-center justify-content-center me-2 ms-2 mt-0"
            enctype="multipart/form-data"
            >
            <!-- User First Name -->
            <h5 id="lb-ebook">E-BOOKS UPLOAD</h5>
            <div class="input-group mb-1">
              <span class="input-group-text">
                <i class="fa fa-file" aria-hidden="true"></i>
              </span>
              <input
                required
                type="file"
                class="form-control"
                id="document"
                name="document"
                placeholder="document"
              />
            </div>

            <div class="input-group mb-1">
              <span class="input-group-text">
                <i class="fa fa-book" aria-hidden="true"></i>
              </span>
              <input
                required
                type="text"
                class="form-control"
                id="material_name"
                name="material_name"
                placeholder="Material title"
              />
            </div>
            <div class="input-group mb-1">
              <span class="input-group-text">
                <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              <input
                required
                type="text"
                class="form-control"
                id="author_name"
                name="author_name"
                placeholder="Author name"
              />
            </div>
            <div class="input-group mb-1">
              <span class="input-group-text">
                <i class="fa fa-address-book" aria-hidden="true"></i>
              </span>
              <input
                required
                type="number"
                class="form-control"
                id="author_year"
                name="author_year"
                placeholder="Year"
                min="1900"
                max="2099"
              />
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text">
                <i class="fa fa-book" aria-hidden="true"></i>
              </span>
              <textarea
                name="description"
                id="description"
                cols="30"
                rows="5"
                required
                class="form-control"
                placeholder="Description"
              ></textarea>
            </div>

            <div class="col-12">
              <button id="btsubmit" type="submit" class="btn btn-primary w-100">
                Submit
              </button>
            </div>
          </form>
        </div>

        
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
    <script src="insert.js?version=<?php echo filemtime('insert.js'); ?>"></script>
    <script src="fetch_all.js?version=<?php echo filemtime('fetch_all.js'); ?>"></script>
  </body>
</html>
