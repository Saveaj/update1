<?php require('session.php');?>
<?php if(logged_in()){ ?>
          <script type="text/javascript">
            window.location = "index.php";
          </script>
    <?php
    } ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pos And Inventory System</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
<style>
 .bg-side {
  background-color: hsl(207, 49.8%, 50.0%);
  background-image: radial-gradient(650px circle at 0% 0%,
      hsl(207, 41%, 40%) 15%,
      hsl(207, 41%, 30%) 35%,
      hsl(207, 41%, 20%) 75%,
      hsl(207, 41%, 19%) 80%,
      transparent 100%),
    radial-gradient(1250px circle at 100% 100%,
      hsl(207, 41%, 45%) 15%,
      hsl(207, 41%, 30%) 35%,
      hsl(207, 41%, 20%) 75%,
      hsl(207, 41%, 19%) 80%,
      transparent 100%);
}

#radius-shape-1 {
  height: 220px;
  width: 220px;
  top: -60px;
  left: -130px;
  background: radial-gradient(#3963BA, #A0C8F5);
  overflow: hidden;
}

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#3963BA, #A0C8F5);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
</style>
</head>

<body class="bg-side">

<div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          RICE WHIZ <br />
          <span style="color: hsl(218, 81%, 75%)">Arenas' POS & Inventory System</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
       
        </p>
      </div>

      <div class="col-lg-4 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-2-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-2-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">

                  <form class="user" role="form" action="processlogin.php" method="post">
                    <div class="form-group">
                        <label class="form-group text-left font-weight-bold" for="user">Username:
                        <input class="form-control form-control-user" placeholder="Username" name="user" type="text" id="user" autofocus>
                    </div>
                    <div class="form-group">
                    <label class="form-group text-left font-weight-bold" for="pass">Password:
                        <input class="form-control form-control-user" placeholder="Password" name="password" type="password" value="" id="pass">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-user btn-block" type="submit" name="btnlogin">Login</button>
                    <hr>
                  <!-- <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div> -->
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
