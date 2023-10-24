<?php
require("../config/autoload.php");
$dao = new DataAccess();
$elements = array(
  'username' => '',
  'password' => ''
);
$rules = array(
  'username' => array(
    "required" => true,
    "minlength" => 4,
    "maxlength" => 20,
    "alphaonly" => true
  ),
  'password' => array(
    "required" => true,
    "minlength" => 4,
    "maxlength" => 20,
  )
);
$labels = array(
  'username' => 'Username',
  'password' => 'Password'
);
$form = new FormAssist($elements, $_POST);
$validator = new FormValidator($rules, $labels);
$flag = true;
if (isset($_POST['signin'])) {
  if ($validator->validate($_POST)) {
    $data = array('username' => $_POST['username'], 'password' => $_POST['password']);
    if ($info = $dao->login($data, 'doc')) {
      $_SESSION['docid'] = $info['docid'];
      $_SESSION['doc'] = $info['fname'] .' '. $info['lname'];
      $_SESSION['setTime'] = time();
      echo "<script> location.replace('index.php'); </script>";
    }
    else $flag = false;
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Purple Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth bg-secondary">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="card card-outline-primary text-left p-5">
              <div class="brand-logo">
                <img src="assets/images/logo.svg">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <?php
              if(!$flag){
                echo "<div class='alert alert-warning d-flex align-items-center justify-content-center'>
                  Incorrect Username or Password
                  </div>";
              }
              ?>
              <form method='POST' class="pt-3">
                <div class="form-group">
                  <?= 
                  $form->textBox(
                    'username',
                    array(
                      'class' => 'form-control form-control-lg rounded',
                      'placeholder' => 'Username'
                      )
                    )
                  ?>
                  <?= $validator->error('username') ?>
                </div>
                <div class="form-group">
                <?= 
                  $form->passwordBox(
                    'password',
                    array(
                      'class' => 'form-control form-control-lg rounded',
                      'placeholder' => 'Password'
                      )
                    )
                  ?>
                  <?= $validator->error('password') ?>
                </div>
                <div class="mt-3">
                  <button  type='submit' name='signin' class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                    SIGN IN
                  </button>
                </div>
                <div class="mt-4 text-center">
                  <a href="#" class="btn btn-light">Forgot password?</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <!-- endinject -->
</body>

</html>