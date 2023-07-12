<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>home | aamuted elections.oline</title>
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
    <link rel="stylesheet" href="portal.css" />
    <link rel="stylesheet" href="newBooks.css" />

    <link
    rel="icon"
    type="image/png"
    href="public_html/images/logo/round.jpg"
  />
  </head>
  <body>
    <div id="header1" class="container-fluid">
      <div class="row">
        <div class="col">
          <img class="responsive-img" src="../devimage/rec3.jpg" alt="" />
        </div>
        <div
          id="t1"
          class="col d-none d-sm-flex align-items-center justify-content-start"
        >
          <h4>BSTI library</h4>
        </div>
        <div id="t2" class="col d-flex align-items-center justify-content-end">
          <a class="btn btn-primary btn-sm me-1" href="../index.php">
            <i class="fa fa-sign-out" aria-hidden="true">Logout</i></a
          >
        </div>
      </div>
    </div>

    <div
      id="wrapper1"
      class="container-fluid align-items-center justify-content-center"
    >
      <div class="row g-0 gx-2">
        <div id="user-bio" class="col-12 col-sm-4">
          <div class="row m-0 p-0">
            <div
              class="col-12 align-items-center justify-content-center text-center"
            >
              <img src="../images/logo/default.png" alt="" />
            </div>

            <div id="bio-text" class="col-12">
              <div class="card p-4">
                <h5 class="card-title text-light">
                  <i class="fa fa-user-circle" aria-hidden="true"></i> John Doe
                </h5>
                <p class="card-text text-light">
                  <i class="fa fa-at" aria-hidden="true"></i>
                  johndoe@example.com
                </p>
                <p class="card-text text-light">
                  <i class="fa fa-phone" aria-hidden="true"></i> (123) 456-7890
                </p>
                <p class="card-text text-light">
                  <i class="fa fa-birthday-cake" aria-hidden="true"></i> Date of
                  Birth: 02/02/1990
                </p>
                <p class="card-text text-light">
                  <i class="fa fa-calendar" aria-hidden="true"></i> Registered:
                  01/01/2023
                </p>
                <p class="card-text text-light">
                  <i class="fa fa-heart" aria-hidden="true"></i> Favorite
                  Category: Science Fiction
                </p>
                <p class="card-text text-light">
                  <i class="fa fa-book" aria-hidden="true"></i> Favorite Book:
                  Dune
                </p>
              </div>
            </div>
          </div>
        </div>

        <div id="user-actions" class="col-12 col-sm-8 d-flex align-items-center justify-content-around h-100">
          <div class="row w-100 g-1 align-items-center justify-content-start h-100">
            <div class="col-12 col-md-4">
              <div class="card">
                <div class="card-body">
                  <span class="badge bg-primary rounded-pill">2</span>
                  <i class="bi bi-bell"></i>
                  <h4 class="card-title">Notifications</h4>
                  <p class="card-text">Stay updated with library announcements.</p>
                </div>
              </div>
            </div>
            
            <div class="col-12 col-md-4">
              <div class="card">
                <div class="card-body">
                  <i class="bi bi-book"></i>
                  <h4 class="card-title">Search for Books</h4>
                  <p class="card-text">Explore and find the books you're looking for.</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="card">
                <div class="card-body">
                  <i class="bi bi-journal-plus"></i>
                  <h4 class="card-title">Borrow a Book</h4>
                  <p class="card-text">Request to borrow a book from the library.</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="card">
                <div class="card-body">
                  <i class="bi bi-star"></i>
                  <h4 class="card-title">Rate and Review a Book</h4>
                  <p class="card-text">Share your feedback by rating and reviewing books.</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="card">
                <div class="card-body">
                  <i class="bi bi-list-check"></i>
                  <h4 class="card-title">My Reading List</h4>
                  <p class="card-text">Manage and view your personal reading list.</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="card">
                <div class="card-body">
                  <i class="bi bi-archive"></i>
                  <h4 class="card-title">Other Resources</h4>
                  <p class="card-text">Access additional resources available in the library.</p>
                </div>
              </div>
            </div>
            <!-- Add more cards for other functions -->
          </div>
        </div>
        

      </div>

      <div id="last-row" class="container-fluid">
        <div class="row gap-2">
          <div class="col-sm">
            <div class="card position-relative">
              <div class="ribbon-wrapper">
                <div class="ribbon">New</div>
              </div>
              <div class="card-body">
                <img src="../images/newBooks/1.JPG" alt="Sample Book 1" class="card-img-top">
           
              </div>
            </div>
          </div>
          <div class="col-sm">
            <div class="card position-relative">
              <div class="ribbon-wrapper">
                <div class="ribbon">New</div>
              </div>
              <div class="card-body">
                <img src="../images/newBooks/1.JPG" alt="Sample Book 2" class="card-img-top">
          
              </div>
            </div>
          </div>
          <div class="col-sm">
            <div class="card position-relative">
              <div class="ribbon-wrapper">
                <div class="ribbon">New</div>
              </div>
              <div class="card-body">
                <img src="../images/newBooks/1.JPG" alt="Sample Book 3" class="card-img-top">
          
              </div>
            </div>
          </div>
        </div>
      </div>
      


      </div>

      <div id="myfooter" class="container-fluid">
        <div id="footer-copyright" class="row text-center py-3">
          <h6>&copy; 2023. BSTI library. All rights reserved.</h6>
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

      <script src=""></script>
    </div>
  </body>
</html>