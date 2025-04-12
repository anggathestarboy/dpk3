<?php
session_start();

// Kalau sudah login, arahkan langsung ke dashboard
if (isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/custom.css">
</head>
<body>
  <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
      <div class="row d-flex">
        <div class="col-lg-6">
          <div class="card1 pb-5">
            <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
              <img src="images/image.png" class="image">
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card2 card border-0 px-4 py-5">
            <form action="login_proses.php" method="POST">
              <div class="row mb-4 px-3">
                <h3 class="mb-0 mr-4 mt-2">LOGIN ADMIN</h3>
              </div>
              <div class="row px-3">
                <label class="mb-1"><h6 class="mb-0 text-sm">Username</h6></label> 
                <input class="mb-4 form-control" type="text" name="username" placeholder="Enter a valid username" required> 
              </div>
              <div class="row px-3">
                <label class="mb-1"><h6 class="mb-0 text-sm">Password</h6></label>
                <input class="form-control" type="password" name="password" placeholder="Enter password" required>
              </div>
              <div class="row px-3 mb-4">
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input id="chk1" type="checkbox" name="chk" class="custom-control-input">
                  <label for="chk1" class="custom-control-label text-sm">Remember me</label>
                </div>
                <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
              </div>
              <div class="row mb-3 px-3">
                <button type="submit" class="btn btn-blue text-center w-100">Login</button>
              </div>
            </form>

            <!-- Alert untuk Forgot Password -->
            <div id="forgotPasswordAlert" class="alert alert-warning d-none" role="alert">
              Harap hubungi developer untuk mendapatkan bantuan
            </div>
          </div>
        </div>
      </div>
      <div class="bg-blue py-4">
        <div class="row px-3">
          <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; Rizqi Anggara 2025. All rights reserved.</small>
          <div class="social-contact ml-4 ml-sm-auto">
            <span class="fa fa-facebook mr-4 text-sm"></span>
            <span class="fa fa-google-plus mr-4 text-sm"></span>
            <span class="fa fa-linkedin mr-4 text-sm"></span>
            <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- JavaScript untuk Forgot Password Alert -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const forgotPasswordLink = document.querySelector('a[href="#"]');
      const forgotPasswordAlert = document.getElementById("forgotPasswordAlert");

      forgotPasswordLink.addEventListener("click", function (event) {
        event.preventDefault();
        forgotPasswordAlert.classList.remove("d-none");
      });
    });
  </script>
</body>
</html>
