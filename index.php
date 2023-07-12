
<?php include 'SS/SESSION_CLR.php'; ?>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="index-carousel.css" />


    <link rel="stylesheet" href="index-xm.css" />
    <link rel="stylesheet" href="index-sm.css" />
    <link rel="stylesheet" href="index-lg.css" />
    <link rel="stylesheet" href="news-card.css" />

    <link
  rel="icon"
  type="image/jpg"
  href="./devimage/round.jpg"
/>

  </head>
  <body>
    <div id="fixed-Header-wrapper" class="row m-0 p-0">
      <div id="headerContainer1" class="container-fluid p-1 m-0">
        <div class="row">
          <div class="col-10 d-none d-sm-block">
            <div class="row align-items-center justify-content-start">
              <div class="col-auto">
                <a href="#" class="bthlist"> BSTI library</a>
              </div>
              <div class="col-auto  d-none">
                <a class="bthlist">E-LEARNING</a>
              </div>
              <div class="col-auto  d-none"><a class="bthlist">LIBRARY</a></div>
              <div class="col-auto  d-none"><a class="bthlist">FEES</a></div>
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

      <nav id="c2" class="navbar navbar-expand-lg py-0 ">
        <div id="c1" class="container-fluid">
          <a class="navbar-brand bg-white col-6 col-sm-3" href="#"
            >  
            <img  id="logo" src="devimage/rec3.jpg" alt="">
             </a>

          <button
            class="navbar-toggler "
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
                      Student handbook
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
                      E-learning
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
                      Library
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
                      Fees
                    </a>
                  </div>
                </li>

                <hr />
              </div>

              <li class="nav-item d-none">
                <div class="dropdown">
                  <a
                    class="btn btn-secondary"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    some action
                    <i class="bi bi-eye-fill"></i>
                  </a>
                </div>
              </li>

              <li class="nav-item">
                <div class="dropdown">
                  <a
                  
                    class="btn"
                    href="login/login.php"
                    role="button"
                  
                  >
                Login
                <i class="fa fa-lock" aria-hidden="true"></i>
                  </a>
                </div>
              </li>

               <li class="nav-item">
                <div class="dropdown">
                  <a
                
                  
                    class="btn"
                    href="search/page.php"
                    role="button"
                  
                  >
             Quick Search
                <i class="bi bi-book-half"></i>
                  </a>
                </div>
              </li>

              <li class="nav-item d-none">
                <div class="dropdown">
                  <a
                  
                    class="btn"
                    href="login/login.php"
                    role="button"
                  
                  >
                some action
                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
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
                    Academics
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
              <li class="nav-item  d-none">
                <div class="dropdown">
                  <a
                    class="btn btn-secondary dropdown-toggle"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                   Staff
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

              <li class="nav-item  d-none">
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



              <li class="nav-item  d-none">
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

              <li class="nav-item  d-none">
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
                      <a class="dropdown-item" href="#"
                        >Our History</a
                      >
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

    <!--
CAROUSEL ELEMENT BELOW THIS LINE
-->

    <div id="carousel-wrapper" class="row">
      <div
        id="carouselExampleCaptions"
        class="carousel slide"
        data-bs-ride="carousel"
      >
        <div class="carousel-indicators">
          <button
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="1"
            aria-label="Slide 2"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="2"
            aria-label="Slide 3"
          ></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="carousel/1.jpg"
              class="d-block w-100"
              alt="..."
            />
          </div>
          <div class="carousel-item">
            <img
              src="carousel/2.jpg"
              class="d-block w-100"
              alt="..."
            />
          </div>
          <div class="carousel-item">
            <img
              src="carousel/3.jpg"
              class="d-block w-100"
              alt="..."
            />
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev"
        >
          <span
            id="carousel-btn-prev"
            class="carousel-control-prev-icon"
            aria-hidden="true"
          ></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next"
        >
          <span
            id="carousel-btn-next"
            class="carousel-control-next-icon"
            aria-hidden="true"
          ></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <!--
LATEST NEWS CARDS BELOW
-->

<div id="recent-news" class="container-fluid text-center">
  <h3  id="newBooks"> <span id="lbNewlyArrived">THE DEVELOPERS<i id="newArrow" class="fa fa-arrow-down" aria-hidden="true"></i></span></h3>
</div>

<div id="news-card-wrapper" class="container-fluid">
  <div class="container">
    <div class="row text-center g-2">
     
      <div class="col-12 col-sm-4">
        <div class="card position-relative">
          <h6 class="title mb-0">SULEMANA AYUBA:5191040833</h6>
        
          <div class="card-body">
            <img class="img-fluid" src="developerimage/a1.jpg" alt="">
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-4">
        <div class="card position-relative">
   
          <h6 class="title mb-0">SARPONG MENSAH HENRY:5191040824</h6>
        
          <div class="card-body">
          <img class="img-fluid" src="developerimage/a2.jpg" alt="">
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-4">
        <div class="card position-relative">
    
          <h6 class="title mb-0">ABUGRI ABUBAKAR SADIK:5191040828</h6>
        
          <div class="card-body">
          <img class="img-fluid" src="developerimage/a3-1.jpg" alt="">
          </div>
        </div>
      </div>
      
      
      
     
      <!-- Repeat the same structure for the other cards -->
    </div>
  </div>
</div>



    <!-- 
      MORE NEWS BELOW
    -->




    <!-- 
ACADEMIC PROGRAMS
    -->



    <!--
      PAGE FOOTER
     -->

    <div class="container-fluid ">

      <div id="footer-copyright" class="row text-center py-3">
        <h6> &copy; 2023.  BSTI library. All rights reserved.</h6>
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

    <script src="homepageFiles/animation.js"></script>
  </body>
</html>