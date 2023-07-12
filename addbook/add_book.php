<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Create book</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="add_book.css?
    <?php echo filemtime("add_book.css"); ?>
    " />
    <link rel="stylesheet" href="table.css?<?php echo filemtime("table.css"); ?>" />
  </head>
  
  <body>
    <div class="row justify-content-center gap-5 m-auto mb-0 mt-5">
      <!-- This column will be hidden on xs screens, but visible on medium and up screens -->
      <div id="table-wrapper" class="col-md-6 d-none d-md-block mt-0 pt-0">
        <img  class="d-none" id="edit_imageview" src="../devimage/templatematerial.png" alt="">
        <input id="edit_image_file" class="d-none" type="file">
        <h3 id="edit-label" class="text-center mt-0">Edit</h3>


        <div class="row">
          <table id="editable-table" class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Material Number</th>
                <th>Material Type</th>
                <th>Shelf Number</th>
                <th>Unique ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Description</th>
                <th>Image URL</th>
                <th>Record Date</th>
                <th>Cell Number</th>
                <th>Material Date</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>

      <!-- This column will take up the full width on xs screens, and 9 columns on medium and up screens -->
      <div class="col-12 col-md-6 mb-0 p-0 mt-0">
        <div id="wrapper10" class="col text-center mb-0">
          <h3 class="text-center m-0">Add Material</h3>
          <h4 class="text-center m-0">
            Material N0# <span id="material_number">0</span>
          </h4>
                   
        <a class="go-back" href="../ebook/page.php" data-bs-toggle="tooltip" data-bs-placement="top" title="E-BOOKS">
          <i class="fa fa-book fa-2x" aria-hidden="true"></i>
      </a>
          <form
            id="book-info-form"
            class="row d-flex align-items-center justify-content-center mt-0 mb-0"
          >

   
      
            <img

            class="d-none"
              id="material_imageview"
              src="../devimage/templatematerial.png"
              alt=""
            />
            <div class="input-group mb-1">
              <span class="input-group-text">
                <i class="fa fa-book" aria-hidden="true"></i>
              </span>
              <select
                class="form-control"
                id="material_type"
                name="material_type"
                required
              >
                <option value="">Select Material Type</option>
                <option value="Books">Books</option>
                <option value="Magazines">Magazines</option>
                <option value="Article">Articles</option>
                <option value="newspapers">Newspapers</option>
                <option value="journals">Journals</option>
                <option value="reports">Reports</option>
                <option value="other">Other</option>
              </select>
            </div>
            <div class="input-group mb-1">
              <span class="input-group-text">
                <i class="fa fa-book" aria-hidden="true"></i>
              </span>
              <select
                class="form-control"
                id="classification"
                name="classification"
                required
              >
                <option value="">classification</option>
                <option value="Fiction">Fiction</option>
                <option value="Non-Fiction">Non-Fiction</option>
              </select>
            </div>
            <div class="wrapper1 d-none mt-0">
              <div class="input-group mt-0">
                <span class="input-group-text">
                  <i class="fa fa-book" aria-hidden="true"></i>
                </span>
                <select
                  class="form-control"
                  id="fiction_options"
                  name="fiction_options"
                >
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
                  <option value="graphic-novels">
                    Graphic Novels and Comics
                  </option>
                </select>
              </div>
            </div>
            <div class="wrapper2 d-none mt-0">
              <div class="input-group mb-0">
                <span class="input-group-text">
                  <i class="fa fa-book" aria-hidden="true"></i>
                </span>
                <select
                  class="form-control"
                  id="non_fiction_option"
                  name="non_fiction_option"
                >
                  <option value="Type Of Non-fiction">
                    Type Of Non-fiction
                  </option>
                  <option value="biographies">
                    Biographies and Autobiographies
                  </option>
                  <option value="history">History</option>
                  <option value="science">Science & Technology</option>
                  <option value="self-help">Self-Help</option>
                  <option value="travel">Travel</option>
                  <option value="cookbooks">Cookbooks</option>
                  <option value="academic-texts">Academic Texts</option>
                  <option value="reference">Reference</option>
                  <option value="government-documents">
                    Government Documents
                  </option>
                  <option value="business">Business & Economics</option>
                  <option value="health">Health & Wellness</option>
                  <option value="art-and-photography">
                    Art and Photography
                  </option>
                  <option value="religion-and-spirituality">
                    Religion and Spirituality
                  </option>
                  <option value="music-and-movies">Music and Movies</option>
                  <option value="language-learning">Language Learning</option>
                  <option value="News">Magazines and News</option>
                </select>
              </div>
            </div>
            <div class="input-group mb-1">
              <span class="input-group-text">
                <i class="fa fa-pencil-alt" aria-hidden="true"></i>
              </span>
              <input
                class="form-control"
                id="book_title"
                name="book_title"
                placeholder="Title"
                type="text"
              />
              <input
                id="material_image"
                name="material_image"
                class="form-control"
                placeholder="Image"
                type="file"
              />
            </div>
            <div class="input-group mb-1">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
              <input
                class="form-control"
                id="author_name"
                name="author_name"
                placeholder="Author"
                type="text"
              />
              <input
                class="form-control"
                id="publish_date"
                name="publish_date"
                placeholder="Date"
                type="date"
              />
            </div>
            <div class="input-group mb-1">
              <div class="col">
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                  </span>
                  <select
                    id="unique_id_type"
                    name="unique_id_type"
                    class="form-control"
                  >
                    <option value="">Select ID type</option>
                    <option value="isbn">ISBN</option>
                    <option value="issn">ISSN</option>
                    <option value="doi">DOI</option>
                    <option value="arxiv">arXiv</option>
                    <option value="other">Other</option>
                  </select>
                </div>
              </div>
              <div class="col ms-1">
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                  </span>
                  <input
                    class="form-control"
                    id="id_value"
                    name="id_value"
                    type="text"
                    placeholder="ID value"
                  />
                </div>
              </div>
            </div>
            <div class="input-group mb-0 ">
              <span class="input-group-text">
                <i class="fa fa-pencil-alt" aria-hidden="true"></i>
              </span>
              <textarea
                required
                class="form-control"
                id="description"
                name="description"
                placeholder="Description"
                rows="2"
              ></textarea>
            </div>
            <div class="col-12 mb-0">
              <div class="row">
                <h6 id="shelfnumberwrapper" class="text-center">
                  Storage Shelf No#
                  <span style="color: rgb(0, 0, 0)" id="shelfnumber"></span>
                  Cell: <span id="cellnumber"></span>
                </h6>
              </div>
            </div>
            <div class="col-12 mb-0 mt-0">
              <button id="btsubmit" type="submit" class="btn btn-primary">
                Add Material
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- BEGIN MY TOASTS -->

    <div
      id="aeToastE"
      class="toast"
      role="alert"
      aria-live="assertive"
      aria-atomic="true"
    >
      <div class="toast-header bg-danger text-white">
        <i
          style="color: white"
          class="fa fa-exclamation-triangle me-2"
          aria-hidden="true"
        ></i>
        <strong class="me-auto">Error!</strong>
        <small>AECleanCodes</small>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="toast"
          aria-label="Close"
        ></button>
      </div>
      <div class="toast-body"></div>
    </div>

    <div
      id="aeToastS"
      class="toast"
      role="alert"
      aria-live="assertive"
      aria-atomic="true"
    >
      <div class="toast-header bg-success text-white">
        <i style="color: white" class="bi bi-check-circle-fill me-2"></i>
        <strong class="me-auto">Success!</strong>
        <small>Success!</small>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="toast"
          aria-label="Close"
        ></button>
      </div>
      <div class="toast-body"></div>
    </div>

    <div id="aeminput1" class="modal fade" tabindex="-3">
      <div class="modal-dialog" style="width: 20rem; margin: auto">
        <div class="modal-content">
          <div id="aeMsucces" class="modal-header">
            <h5 id="aeAlertTitle" class="modal-title">Select Options</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
            ></button>
          </div>
          <div style="background-color: white; color: black" class="modal-body">
            <div id="inputrow" class="row">
              <div class="input-group mb-3">
                <label for="select1" class="form-label">Shelf No#:</label>

                <select
                  class="form-control"
                  name="mshelfnumber"
                  id="mshelfnumber"
                ></select>
              </div>

              <div class="input-group mb-3">
                <label for="select2" class="form-label">Cell NO#:</label>
                <input
                  readonly
                  id="aeMCellNo"
                  class="form-control ms-1"
                  type="text"
                />
              </div>
            </div>

            <div id="detail_shelf_number" class="row d-none">
              <div id="detail_column" class="col">
                <h5 style="font-weight: bolder">
                  SHELF NO# <span id="shelf_count"></span>
                </h5>
                <h6 id="descword" class="m-1">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo,
                  nisi. Aliquid qui labore doloribus quod quibusdam repellat
                  velit commodi praesentium sunt delectus esse temporibus dolore
                  voluptate asperiores eveniet, fugiat et.
                </h6>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="row">
              <div class="col">
                <button
                  id="aeM_show_details"
                  type="button"
                  class="btn btn-primary"
                >
                  Details
                </button>
              </div>
              <div class="col">
                <button
                  id="aeM_input_done"
                  type="button"
                  class="btn btn-primary"
                >
                  OK
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- END MY TOASTS -->

    <!-- BEGIN MY ALERTS -->
    <div
      id="alert1"
      class="alert alert-success d-none alert-dismissible fade show"
      role="alert"
    >
      <i class="bi bi-check-circle-fill"></i> Item Uploaded Successfully!
      <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert"
        aria-label="Close"
      ></button>
    </div>
    <!-- END MY ALERTS -->

    <!-- BEGIN MY SPIN-->
    <i id="spin1" class="fas fa-spinner fa-spin d-none"></i>
    <!-- END MY SPIN -->

    <div
      id="spinner-container"
      class="spinner-container text-center"
      style="display: none"
    >
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
    <script
      src="https://kit.fontawesome.com/c1db89cf54.js"
      crossorigin="anonymous"
    ></script>
    <script src="../ae.js"></script>
    <script src="add_book.js?version=<?php echo filemtime('add_book.js'); ?>"></script>
    <script src="init.js?version=<?php echo filemtime('init.js'); ?>"></script>
    <script src="fetch_book_items.js?version=<?php echo filemtime('fetch_book_items.js'); ?>"></script>
    <script src="control_model_input.js?version=<?php echo filemtime('control_model_input.js'); ?>"></script>
    <script src="get_shelf_number.js?version=<?php echo filemtime('get_shelf_number.js'); ?>"></script>
    <script src="fetch_all_book.js?version=<?php echo filemtime('fetch_all_book.js'); ?>"></script>
    <script src="edit_image.js?version=<?php echo filemtime('edit_image.js'); ?>"></script>
  </body>
</html>
