<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>home | BSTI library.com</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />

    <link rel="icon" type="image/jpg" href="../devimage/round.jpg" />
    <link rel="stylesheet" href="admin.css" />
    <link rel="stylesheet" href="codeSCSS.css" />

    <link rel="stylesheet" href="admin-xm.css" />
    <link rel="stylesheet" href="admin-sm.css" />
    <link rel="stylesheet" href="admin-lg.css" />

    <link rel="stylesheet" href="animation.css" />
    
  </head>
  <body>
    <div id="fixed-Header-wrapper" class="row m-0 p-0">
      <div id="headerContainer1" class="container-fluid p-1 m-0">
        <div class="row">
          <div class="col-10 d-none d-sm-block">
            <div class="row align-items-center justify-content-start">
              <div class="col-auto">
                <a href="#" class="bthlist">BSTI Library</a>
              </div>
              <div class="col-auto d-none">
                <a class="bthlist">E-LEARNING</a>
              </div>
              <div class="col-auto d-none"><a class="bthlist">LIBRARY</a></div>
              <div class="col-auto d-none"><a class="bthlist">FEES</a></div>
            </div>
          </div>
          <div
            id="social-links"
            class="col-12 col-sm-2 d-flex align-items-center justify-content-center column-gap-3"
          >
            <a href="#"> <i class="fa fa-facebook" aria-hidden="true"></i> </a>
            <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i> </a>
            <a href="#"> <i class="fa fa-twitter" aria-hidden="true"></i> </a>
          </div>
        </div>
      </div>

      <!--
  HEADINH LAYER 2 IS BELOW THIS LINE
  -->

      <nav id="c2" class="navbar navbar-expand-lg py-0">
        <div id="c1" class="container-fluid">
          <a class="navbar-brand bg-white col-6 col-sm-3" href="#">
            <img id="logo" src="../devimage/rec3.jpg" alt="" />
          </a>

          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav gap-2 sm-row-gap-0">
              <div class="top-level-links d-sm-none">
                <li class="nav-item d-none">
                  <div class="dropdown">
                    <a
                      class="btn btn-secondary"
                      href="#"
                      role="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                    action
                    </a>
                  </div>
                </li>
                <li class="nav-item d-none">
                  <div class="dropdown">
                    <a
                      class="btn btn-secondary"
                      href="#"
                      role="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                    action
                    </a>
                  </div>
                </li>
                <li class="nav-item d-none">
                  <div class="dropdown">
                    <a
                      class="btn btn-secondary"
                      href="#"
                      role="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                    action
                    </a>
                  </div>
                </li>
                <li class="nav-item d-none">
                  <div class="dropdown">
                    <a
                      class="btn btn-secondary"
                      href="#"
                      role="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      action
                    </a>
                  </div>
                </li>

                <hr />
              </div>

              <li class="nav-item">
                <div class="dropdown">
                  <a
                    class="btn btn-secondary"
                    href="../index.php"
                    role="button"
                    aria-expanded="false"
                  >
                    Logout
                  </a>
                </div>
              </li>

              <li class="nav-item">
                <div class="dropdown">
                  <a
                    onclick="toggleCodeWrapper()"
                    class="btn"
                    href="#"
                    role="button"
                  >
                    Code

                    <i class="fa fa-lock" aria-hidden="true"></i>
                  </a>
                </div>
              </li>

              <li class="nav-item">
                <div class="dropdown">
                  <a
                    class="btn btn-secondary"
                    href="../addbook/add_book.php"
                    role="button"
                    aria-expanded="false"
                  >
                    Cataloging

                    <i class="fa fa-leaf" aria-hidden="true"></i>
                  </a>

                  <ul class="dropdown-menu d-none">
                    <li id="gh">
                      <a class="dropdown-item" href="#">Delete One User</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Delete all Users</a>
                    </li>
                    <li><a class="dropdown-item" href="#">Other Action</a></li>
                  </ul>
                </div>
              </li>

              <li class="nav-item">
                <div class="dropdown">
                  <a
                    class="btn btn-secondary"
                    href="../addshelf/add_shelf.php" 
                    role="button"
                    aria-expanded="false"
                  >
                    Add Shelf

                    <i class="fa fa-leaf" aria-hidden="true"></i>
                  </a>

                  <ul class="dropdown-menu d-none">
                    <li id="gh">
                      <a class="dropdown-item" href="#">Delete One User</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Delete all Users</a>
                    </li>
                    <li><a class="dropdown-item" href="#">Other Action</a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown">
                  <a
                    class="btn btn-secondary"
                    href="#" 
                    role="button"
                    aria-expanded="false"
                  >
                    Request

                    <i class="fa fa-bell" aria-hidden="true"></i>
                  </a>

                  <ul class="dropdown-menu d-none">
                    <li id="gh">
                      <a class="dropdown-item" href="#">Delete One User</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Delete all Users</a>
                    </li>
                    <li><a class="dropdown-item" href="#">Other Action</a></li>
                  </ul>
                </div>
              </li>

              <li class="nav-item">
                <div class="dropdown">
                  <a
                  id="btEmptySystem"
                    class="btn btn-secondary"
                    href="#" 
                    role="button"
                    aria-expanded="false"
                  >
                    Empty System

                    <i class="fa fa-trash" aria-hidden="true"></i>
                  </a>
                </div>
              </li>

             

              <li class="nav-item d-none">
                <div class="dropdown">
                  <a
                    class="btn btn-secondary dropdown-toggle"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    Student
                  </a>

                  <ul class="dropdown-menu">
                    <li id="gh">
                      <a class="dropdown-item" href="#"
                        >Upload Student Results</a
                      >
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Download Timetable</a>
                    </li>
                    <li><a class="dropdown-item" href="#">Other Action</a></li>
                  </ul>
                </div>
              </li>

              <li class="nav-item d-none">
                <div class="dropdown">
                  <a
                    class="btn btn-secondary"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    Baosans
                  </a>
                </div>
              </li>

              <li class="nav-item d-none">
                <div class="dropdown">
                  <a
                    class="btn btn-secondary dropdown-toggle"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    About Us
                  </a>
                  <ul class="dropdown-menu">
                    <li id="gh">
                      <a class="dropdown-item" href="#">Our History</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Contact us</a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>

    <!-- BEGIN OF THE REGISTRATION CODE FORM-->
    <div id="codeWrapper" class="container-fluid">
      
      <form
        id="registrationForm"
        class="row g-1 d-flex align-items-center justify-content-center m-auto mt-2"
      >

      <div class="row">
        <div class="col-6">
          <i
            id="delete_all_code"
            class="fa fa-trash me-3"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="Delete all Codes"
            aria-hidden="true"
          ></i>
        </div>
        <div class="col-6">
          <i
            id="delete_all_user"
            class="fa fa-trash me-3"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="Delete all Registration"
            aria-hidden="true"
          ></i>
        </div>
      </div>

        <div class="input-group mb-3">
          <input
            onkeyup="reset_icon()"
            type="text"
            class="form-control fw-bold"
            id="gen_code"
            placeholder="#######"
          />
          <span class="input-group-text" id="basic-addon1">
            <i
              onclick="copy_code()"
              id="copy_icon"
              class="bi bi-clipboard"
              data-bs-toggle="tooltip"
              data-bs-placement="top"
              data-bs-custom-class="custom-tooltip"
              data-bs-original-title="Copy to clipboard"
            ></i>
          </span>
        </div>

        <div class="input-group mb-3">
          <label for="code_user_mobile"></label>

          <span class="input-group-text" id="basic-addon1">
            <i class="bi bi-telephone-inbound-fill"></i>
          </span>
          <input
            type="tel"
            class="form-control"
            id="gen_code_mobile"
            placeholder="Code user mobile"
            required
          />
        </div>

        <div class="input-group mb-3">
          <label for="code_user_email"></label>

          <span class="input-group-text" id="basic-addon1">
            <i class="bi bi-envelope-at-fill"></i>
          </span>
          <input
            type="email"
            class="form-control"
            id="gen_code_email"
            placeholder="Code user email"
            required
          />
        </div>
        <div class="input-group mb-3 gap-1 text-center">
          <div class="col">
            <button type="submit" class="btn btn-primary">User code</button>
          </div>
          <div class="col">
            <button type="submit" class="btn btn-primary">Admin code</button>
          </div>
        </div>

        <div class="input-group mb-3 gap-1 text-center">
          <div class="col">
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">
                <img id="excel_template" style="width: 1.3rem" src="../devimage/excel.png" alt="" />
              </span>
              <input
                type="file"
                class="form-control"
                id="groupCode"
                accept=".xlsx"
              />
            </div>
            <label id="lbGroupCode" for="groupCode">No File Chosen</label>

            <span>
              <a
                style="
                  color: white;
                  font-size: 1.5rem;
                  justify-self: end;
                  background-color: transparent;
                "
                id="downloadCodes"
                href="downloadCodes.php"
              >
                <i class="bi bi-arrow-down-circle-fill"></i
              ></a>
            </span>
          </div>
          <div class="col">
            <button id="btgroupCode" type="button" class="btn btn-primary">
              Generate Codes
            </button>
          </div>
        </div>
      </form>
    </div>

    <!-- END OF THE REGISTRATION CODE FORM-->

    <div id="spinner-container" class="spinner-container text-center d-none">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
      <p class="loading-text">Processing ...</p>
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

    <!-- END MY TOASTS -->

    <div
      id="aeToastYN"
      class="toast"
      role="alert"
      aria-live="assertive"
      aria-atomic="true"
    >
      <div class="toast-header bg-danger text-white">
        <i
          style="color: white"
          class="fa fa-question-circle m-1"
          aria-hidden="true"
        ></i>
        <strong class="me-auto">Confirm Delete Action!</strong>
        <small>Confirm!</small>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="toast"
          aria-label="Close"
        ></button>
      </div>
      <div class="toast-body">
        <p id="toastMessage"></p>
        <div class="row row-cols-2">
          <div class="col text-end">
            <button
              type="button"
              class="btn btn-success btn-sm me-2"
              onclick="handleYesClick()"
            >
              Yes <i class="fa fa-thumbs-up" aria-hidden="true"></i>
            </button>
          </div>
          <div class="col">
            <button
              type="button"
              class="btn btn-danger btn-sm"
              onclick="handleNoClick()"
            >
              No <i class="fa fa-thumbs-down" aria-hidden="true"></i>
            </button>
          </div>
        </div>
      </div>
    </div>



    <div
      id="aeToastYN2"
      class="toast"
      role="alert"
      aria-live="assertive"
      aria-atomic="true"
    >
      <div class="toast-header bg-danger text-white">
        <i
          style="color: white"
          class="fa fa-question-circle m-1"
          aria-hidden="true"
        ></i>
        <strong class="me-auto">Confirm Delete Action!</strong>
        <small>Confirm!</small>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="toast"
          aria-label="Close"
        ></button>
      </div>
      <div class="toast-body">
        <p id="toastMessage"></p>
        <div class="row row-cols-2">
          <div class="col text-end">
            <button
              type="button"
              class="btn btn-success btn-sm me-2"
              onclick="handleYesClick2()"
            >
              Yes <i class="fa fa-thumbs-up" aria-hidden="true"></i>
            </button>
          </div>
          <div class="col">
            <button
              type="button"
              class="btn btn-danger btn-sm"
              onclick="handleNoClick()"
            >
              No <i class="fa fa-thumbs-down" aria-hidden="true"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <div
      id="aeToastYN3"
      class="toast"
      role="alert"
      aria-live="assertive"
      aria-atomic="true"
    >
      <div class="toast-header bg-danger text-white">
        <i
          style="color: white"
          class="fa fa-question-circle m-1"
          aria-hidden="true"
        ></i>
        <strong class="me-auto">Are You Sure You Want To Delete All Records In this System?</strong>
        <small>Confirm!</small>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="toast"
          aria-label="Close"
        ></button>
      </div>
      <div class="toast-body">
        <p id="toastMessage"></p>
        <div class="row row-cols-2">
          <div class="col text-end">
            <button
              type="button"
              class="btn btn-success btn-sm me-2"
              onclick="handleYesClick3()"
            >
              Yes <i class="fa fa-thumbs-up" aria-hidden="true"></i>
            </button>
          </div>
          <div class="col">
            <button
              type="button"
              class="btn btn-danger btn-sm"
              onclick="handleNoClick()"
            >
              No <i class="fa fa-thumbs-down" aria-hidden="true"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!--
      PAGE FOOTER
     -->

    <div id="footerWrapper" class="container-fluid">
      <div id="footer-copyright" class="row text-center py-3">
        <h6>&copy; 2023.BSTI Library. All rights reserved.</h6>
      </div>
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


    <script src="../ae.js?version=<?php echo filemtime('../ae.js'); ?>"></script>
    <script src="admin.js?version=<?php echo filemtime('admin.js'); ?>"></script>
    <script src="delete.js?version=<?php echo filemtime('delete.js'); ?>"></script>
    <script src="code.js?version=<?php echo filemtime('code.js'); ?>"></script>
    <script src="emptySystem.js?version=<?php echo filemtime('emptySystem.js'); ?>"></script>
  </body>
</html>
