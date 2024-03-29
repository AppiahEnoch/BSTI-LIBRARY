
<?php include '../SS/SESSION_CLR.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> BSTI library | Login</title>
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

    <script
    src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
    crossorigin="anonymous"
  ></script>

  <link
  rel="icon"
  type="image/jpg"
  href="../devimage/round.jpg"
/>
<link rel="stylesheet" href="login.css?version=<?php echo filemtime('login.css'); ?>" />
<link rel="stylesheet" href="animation.css?version=<?php echo filemtime('animation.css'); ?>" />
<link rel="stylesheet" href="loginSCSS.css?version=<?php echo filemtime('loginSCSS.css'); ?>" />

  </head>
  <body>
    <div
      class="container-fluid d-flex align-items-center justify-content-center m-auto mt-2"
    >
      <div class="row d-flex align-items-center justify-content-center m-auto">
        <div
          class="col-12 d-flex align-items-center justify-content-center m-auto"
        >
          <img id="logo" src="../images/logo/p4.jpg" alt="" />
      
           
    
        </div>
   

        <!--- WRAPPER 1-->

        <div id="wrapper1" class="col">
               <i id="spin3" class="fas fa-spinner fa-spin d-none"></i>
          <form
            id="form1"
            class="row g-1 d-flex align-items-center justify-content-center m-auto mt-2"
          >
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-user-circle" aria-hidden="true"></i
              ></span>
              <input
              required
                type="password"
                class="form-control"
                id="login_username"
                placeholder="username"
              />
              <span class="input-group-text">
                <i
                  onclick=" togglePasswordVisibility('login_username', 'toggle_login_username')"
                  class="far fa-eye-slash"
                  id="toggle_login_username"
                  style="cursor: pointer"
                ></i>
              </span>
            </div>

            <div class="input-group">
              <span class="input-group-text" id="basic-addon1"
                ><i class="bi bi-file-lock2-fill"></i
              ></span>

              <input
              required
                type="password"
                class="form-control"
                id="login_password"
                placeholder="password"
              />
              <span class="input-group-text">
                <i
                  onclick=" togglePasswordVisibility('login_password', 'toggle_login_password')"
                  class="far fa-eye-slash"
                  id="toggle_login_password"
                  style="cursor: pointer"
                ></i>
              </span>
            </div>

            <div class="col-12">
              <button id="btsubmit" type="submit" class="btn btn-primary">
                Continue
              </button>
            </div>

            <div class="col-12 mt-1">
              <div id="wrapper-col-6" class="row">
                <div class="col-6">
                  <a onclick="hideWrapper('wrapper2')" href="#"><i class="bi bi-journal-check"></i> Register</a>
                </div>
                <div class="col-6">
                  <a onclick="hideWrapper('wrapper4')" href="#">
                    <i class="bi bi-emoji-angry-fill"></i> forgot password</a
                  >
                </div>
                <div class="col-6">
                  <a onclick="hideWrapper('wrapper3')" href="#"> <i class="bi bi-unlock-fill"></i> Reset </a>
                </div>
                <div class="col-6">
                  <a href="../index.php"> <i class="bi bi-house-add-fill"></i>Go Back</a>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="row">
                <div class="col-12 text-center">
                  <div
                    style="color: blue"
                    class="spinner-border d-none"
                    role="status"
                  >
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="toast-container position-fixed top-0 p-3">
              <div
                id="liveToast"
                class="toast"
                role="alert"
                aria-live="assertive"
                aria-atomic="true"
              >
                <div class="toast-header">
                  <strong class="me-auto">Unknown Username or Password</strong>
                  <small> <i class="fa fa-lock" aria-hidden="true"></i></small>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="toast"
                    aria-label="Close"
                  ></button>
                </div>
                <div class="toast-body">
                  Your username or password is not registered.
                </div>
              </div>
            </div>
          </form>
        </div>

        <!--- WRAPPER 1 END-->







<!--- WRAPPER 2   REGISTRATION PAGE-->
<div id="wrapper2" class="col d-none">
  <i style="color: blue" id="spin1" class="fas fa-spinner fa-spin d-none"></i>

  <form
    id="form2"
    class="row g-1 d-flex align-items-center justify-content-center m-auto mt-2"
  >
    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">
        <i class="fa fa-key" aria-hidden="true"></i>
      </span>
      <input
      required
        type="text"
        class="form-control"
        id="registration_code"
        placeholder="Registration code"
      />
      <span class="input-group-text" id="basic-addon1">
        <button
        onclick="verifyRegitrationCode(event)"
        type="button"
          id="verify_regCode"
          class="btn btn-sm m-0 p-0 pe-1 ps-1  text-white"

          data-bs-toggle="tooltip" data-bs-placement="top"
        data-bs-custom-class="custom-tooltip"
        data-bs-title="Clik to verify your Registration Code"

        >
          Verify
        </button>
      </span>
    </div>

    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">
        <i class="bi bi-telephone-inbound-fill"></i>
      </span>
      <input
      onkeyup="setVerifiedCodeFalse()"
        type="tel"
        class="form-control"
        id="userMobile"
        placeholder="Mobile"
      />
    </div>

    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">
        <i class="fa fa-envelope" aria-hidden="true"></i>
      </span>
      <input
      onkeyup="setVarifiedEmailFalse()"
        type="email"
        class="form-control"
        id="email1"
        placeholder="Email"
      />
      <span class="input-group-text" id="basic-addon1">
        <button
        type="button"
        onclick="sendEmailVerificationCode()"
          id="btCode"
          class="btn btn-sm m-0 p-0 pe-1 ps-1  text-white"

          data-bs-toggle="tooltip" data-bs-placement="top"
          data-bs-custom-class="custom-tooltip"
          data-bs-title="Clik to get New Email Verification Code"
          
        >
          Code
        </button>
      </span>
    </div>

    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">
        <i class="fa fa-handshake-o" aria-hidden="true"></i>
    
    </span>
      <input
  
        type="text"
        class="form-control"
        id="tbVerify_email_Code"
        placeholder="Email Verification Code"
      />

      <span class="input-group-text" id="basic-addon1">
        <button
        type="button"
        onclick="verifyEmaiCode()"
          id="btVerifyEmailCode"
          class="btn btn-sm m-0 p-0 pe-1 ps-1  text-white"

          data-bs-toggle="tooltip" data-bs-placement="top"
          data-bs-custom-class="custom-tooltip"
          data-bs-title="Clik to verify your Email Verification Code"
        >
          Verify
        </button>
      </span>
    </div>

   

    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">
        <i class="fa fa-user-circle" aria-hidden="true"></i
      ></span>
      <input
         required
        type="text"
        class="form-control"
        id="regUserName"
        placeholder="username"
      />
      <span class="input-group-text">
        <i
          onclick=" togglePasswordVisibility('regUserName', 'toggleregUserName')"
          class="far fa-eye-slash d-none"
          id="toggleregUserName"
          style="cursor: pointer"
        ></i>
      </span>
    </div>

    <div class="input-group">
      <span class="input-group-text" id="basic-addon1"
        ><i class="bi bi-file-lock2-fill"></i
      ></span>

      <input
      required
        type="password"
        class="form-control"
        id="regPassword"
        placeholder="password"
      />
      <span class="input-group-text">
        <i
          onclick=" togglePasswordVisibility('regPassword', 'toggleregPassword')"
          class="far fa-eye-slash"
          id="toggleregPassword"
          style="cursor: pointer"
        ></i>
      </span>
    </div>

    <div class="input-group">
      <span class="input-group-text" id="basic-addon1"
        ><i class="bi bi-file-lock2-fill"></i
      ></span>

      <input
      required
        type="password"
        class="form-control"
        id="regConfrmPassword"
        placeholder="Confirm password"
      />
      <span class="input-group-text">
        <i
          onclick=" togglePasswordVisibility('regConfrmPassword', 'toggleregConfrmPassword')"
          class="far fa-eye-slash"
          id="toggleregConfrmPassword"
          style="cursor: pointer"
        ></i>
      </span>
    </div>

    <div class="col-12">
      <button id="register" type="submit" class="btn btn-primary">
        Continue
      </button>
    </div>

    <div class="col-12 mt-1">
      <div class="row">
        <div id="wrapper-col-6" class="row">
          <div class="col-6">
            <a onclick="hideWrapper('wrapper1')" href="#"> <i class="fa fa-key" aria-hidden="true"></i> Login</a>
          </div>

          <div class="col-6">
            <a href="../index.php"> <i class="bi bi-house-add-fill"></i>Go Back</a>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="row">
          <div class="col-12 text-center">
            <div
              style="color: blue"
              class="spinner-border d-none"
              role="status"
            >
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>
        </div>
      </div>

      <div class="toast-container position-fixed top-0 p-3">
        <div
          id="liveToast"
          class="toast"
          role="alert"
          aria-live="assertive"
          aria-atomic="true"
        >
          <div class="toast-header">
            <strong class="me-auto">Unknown Username or Password</strong>
            <small> <i class="fa fa-lock" aria-hidden="true"></i></small>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="toast"
              aria-label="Close"
            ></button>
          </div>
          <div class="toast-body">
            Your username or password is not registered.
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<!--- WRAPPER 2 END-->
























        <!-- warpper3  RESET PASSWORD PAGE-->
        <div id="wrapper3" class="col d-none">
          <form
            id="form3"
            class="row g-1 d-flex align-items-center justify-content-center m-auto mt-2"
          >
            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-user-circle" aria-hidden="true"></i
              ></span>
              <input
              required
                type="password"
                class="form-control"
                id="reset_old_username"
                placeholder="Old username"
              />
              <span class="input-group-text">
                <i
                  onclick=" togglePasswordVisibility('reset_old_username', 'togglereset_old_username')"
                  class="far fa-eye-slash"
                  id="togglereset_old_username"
                  style="cursor: pointer"
                ></i>
              </span>
            </div>

            <div class="input-group">
              <span class="input-group-text" id="basic-addon1"
                ><i class="bi bi-file-lock2-fill"></i
              ></span>

              <input
              required
                type="password"
                class="form-control"
                id="reset_old_password"
                placeholder="Old password"
              />
              <span class="input-group-text">
                <i
                  onclick=" togglePasswordVisibility('reset_old_password', 'toggle_reset_old_password')"
                  class="far fa-eye-slash"
                  id="toggle_reset_old_password"
                  style="cursor: pointer"
                ></i>
              </span>
            </div>

            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-user-circle" aria-hidden="true"></i
              ></span>
              <input
              required
                type="password"
                class="form-control"
                id="reset_new_username"
                placeholder="New Username"
              />
              <span class="input-group-text">
                <i
                  onclick=" togglePasswordVisibility('reset_new_username', 'toggle_reset_new_username')"
                  class="far fa-eye-slash"
                  id="toggle_reset_new_username"
                  style="cursor: pointer"
                ></i>
              </span>
            </div>

            <div class="input-group">
              <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-lock" aria-hidden="true"></i>
              </span>

              <input
              required
                type="password"
                class="form-control"
                id="reset_new_password"
                placeholder="New Password"
              />
              <span class="input-group-text">
                <i
                  onclick=" togglePasswordVisibility('reset_new_password', 'toggle_reset_new_password')"
                  class="far fa-eye-slash"
                  id="toggle_reset_new_password"
                  style="cursor: pointer"
                ></i>
              </span>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-lock" aria-hidden="true"></i>
              </span>
              <input
              required
                type="password"
                class="form-control"
                id="reset_confirm_password"
                placeholder="Confirm Password"
              />
              <span class="input-group-text">
                <i
                  onclick=" togglePasswordVisibility('reset_confirm_password', 'toggle_reset_confirm_password')"
                  class="far fa-eye-slash"
                  id="toggle_reset_confirm_password"
                  style="cursor: pointer"
                ></i>
              </span>
            </div>

            <div class="col-12">
              <button id="btReset" type="submit" class="btn btn-primary">
                Continue
              </button>
            </div>

            <div class="col-12 mt-1">
              <div id="wrapper-col-6" class="row">
                <div class="col-6">
                  <a onclick="hideWrapper('wrapper2')" href="#"><i class="bi bi-journal-check"></i> Register</a>
                </div>
                <div class="col-6">
                  <a onclick="hideWrapper('wrapper4')" href="#">
                    <i  class="bi bi-emoji-angry-fill"></i> forgot password</a
                  >
                </div>
                <div class="col-6">
                  <a onclick="hideWrapper('wrapper1')" href="#">
                    <i class="fa fa-key" aria-hidden="true"></i>
                    Login</a
                  >
                </div>

                <div class="col-6">
                  <a href="../../../index.html"> <i class="bi bi-house-add-fill"></i>Go Back</a>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="row">
                <div class="col-12 text-center">
                  <div
                    style="color: blue"
                    class="spinner-border d-none"
                    role="status"
                  >
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="toast-container position-fixed top-0 p-3">
              <div
                id="liveToast"
                class="toast"
                role="alert"
                aria-live="assertive"
                aria-atomic="true"
              >
                <div class="toast-header">
                  <strong class="me-auto">Unknown Username or Password</strong>
                  <small> <i class="fa fa-lock" aria-hidden="true"></i></small>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="toast"
                    aria-label="Close"
                  ></button>
                </div>
                <div class="toast-body">
                  Your username or password is not registered.
                </div>
              </div>
            </div>
          </form>
        </div>
     <!-- END warpper3  RESET PASSWORD PAGE-->


     <!-- warpper4  FORGOT PASSWORD PAGE-->
        <div id="wrapper4" class="col d-none">
         
          <i id="spin2" class="fas fa-spinner fa-spin d-none"></i>
          <form
            id="form4"
            class="row g-1 d-flex align-items-center justify-content-center m-auto mt-2"
          >
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
              <input
              required
                type="email"
                class="form-control"
                id="forgot_password"
                placeholder="Email"
              />
            </div>

            <div class="col-12">
              <button id="btforgot_password" type="submit" class="btn btn-primary">
                Continue
              </button>
            </div>

            <div class="col-12 mt-1">
              <div id="wrapper-col-6" class="row">
                <div class="col-6">
                  <a onclick="hideWrapper('wrapper2')" href="#"><i class="bi bi-journal-check"></i> Register</a>
                </div>
                <div class="col-6">
                  <a onclick="hideWrapper('wrapper1')" href="#">
                    <i class="fa fa-key" aria-hidden="true"></i>
                    Login</a
                  >
                </div>
                <div class="col-6">
                  <a onclick="hideWrapper('wrapper3')" href="#">
                    <i class="bi bi-unlock-fill"></i> Reset
                  </a>
                </div>
                <div class="col-6">
                  <a href="../index.php"> <i class="bi bi-house-add-fill"></i>Go Back</a>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="row">
                <div class="col-12 text-center">
                  <div
                    style="color: blue"
                    class="spinner-border d-none"
                    role="status"
                  >
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>
              </div>
            </div>

           
            
          </form>
        </div>



        <div id="wrapper5" class="container-fluid mt-5  d-none">
        <div class="card shadow-lg">
          <div class="card-body text-center">
            <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
            <h2 class="card-title">Congratulations!</h2>
            <p class="card-text">You have successfully registered. Remember to use your username and password to login</p>
            <button id="btback" class="btn btn-primary mt-3" type="button">
              <a href="../index.php"> <i class="fas fa-arrow-left"></i>return</a>
            </button>
          </div>
        </div>
      </div>



      </div>
    </div>
  <!--END warpper4  FORGOT PASSWORD PAGE-->







<!-- BEGIN MY TOASTS -->


<div id="aeToastE" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
   
    <div class="toast-header bg-danger text-white">
        <i style="color:white" class="fa fa-exclamation-triangle me-2" aria-hidden="true"></i>
      <strong class="me-auto">Error!</strong>
      <small>BSTI library</small>
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

<div id="spinner-container" class="spinner-container" style="display: none">
  <div class="spinner-border" role="status">
      <span class="visually-hidden">Loading...</span>
  </div>
  <p class="loading-text">Please Wait...</p>
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
      src="https://kit.fontawesome.com/c1db89cf54.js"
      crossorigin="anonymous"
    ></script>

    <script src="../ae.js?version=<?php echo filemtime('../ae.js'); ?>"></script>
<script src="username_password.js?version=<?php echo filemtime('username_password.js'); ?>"></script>
<script src="new_registration.js?version=<?php echo filemtime('new_registration.js'); ?>"></script>
<script src="reset_password.js?version=<?php echo filemtime('reset_password.js'); ?>"></script>
<script src="forgot_password.js?version=<?php echo filemtime('forgot_password.js'); ?>"></script>
<script src="login.js?version=<?php echo filemtime('login.js'); ?>"></script>
<script src="autofill.js?version=<?php echo filemtime('autofill.js'); ?>"></script>


 

  </body>
</html>
