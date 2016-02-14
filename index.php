<?php include("login.php"); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Secret Diary</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>

      .navbar-brand {
        font-size: 2em;
      }

      .topContainer {
        background-image: url("background.jpg");
        height: 500px;
        width: 100%;
        background-size: cover;
      }

      #topRow {
        margin-top: 100px;
        text-align: center;
      }

      #topRow h1 {
        font-size: 300%;
      }

      .bold {
        font-weight: bolder;
      }

      .marginTop {
        margin-top: 35px;
      }

      .center {
        text-align: center;
      }

      #aboutContainer {
        height: 500px;
        width: 100%
      }

      #aboutRow {
        margin-top: 200px;
        text-align: center;
      }

      .title {
        margin-top: 100px;
        font-size: 300%;
      }

      .footer {
        background-color: #81C7DE;
        padding: 100px;
        width: 100%;
      }

      .marginBottom {
        margin-bottom: 40px;
      }

      .appstoreImage {
        width: 250px;
      }

    </style>

  </head>
  <body data-spy="scroll" data-target=".navbar-collapse">
    
    <div class="navbar navbar-inverse navbar-fixed-top">
      
      <div class="container">        
          
        <div class="navbar-header">
            
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand">Secret Diary</a>

        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <ul class="nav navbar-nav">

            <li class="active"><a href="index.php">Home</a></li>

          </ul>

          <form class="navbar-form navbar-right" method="post">
            
            <div class="form-group">

              <input type="email" name="loginemail" id="email" value="<?php echo addslashes($_POST['email']); ?>" class="form-control" placeholder="Email Address" />

            </div>

            <div class="form-group">

              <input type="password" name="loginpassword" value="<?php echo addslashes($_POST['password']); ?>" class="form-control" placeholder="Password" />

            </div>           

            <input type="submit" name="submit" value="Log In" class="btn btn-success" />

          </form>

        </div>

      </div>

    </div>

    <div class="container contentContainer topContainer" id="home">
      
      <div class="row">
        
        <div class="col-md-6 col-md-offset-3" id="topRow">
          
          <h1 class="marginTop">Secret Diary</h1>

          <p class="lead">Your own private diary, with you wherever you go</p>

          <?php 

            if ($errorMsg) {

              echo '<div class="alert alert-danger">'.addslashes($errorMsg).'</div>';

            }

            if ($message) {

              echo '<div class="alert alert-success">'.addslashes($message).'</div>';

            }

          ?>

          <form class="marginTop" method="post">
            
            <div class="form-group">

              <label for="email">Email Address</label>
              
              <input type="email" name="email" id="email" value="<?php echo addslashes($_POST['email']); ?>" class="form-control" />

            </div>

            <div class="form-group">

              <label for="password">Password</label>
            
              <input type="password" name="password" value="<?php echo addslashes($_POST['password']); ?>" class="form-control" />

            </div>

            <input type="submit" name="submit" value="Sign Up" class="btn btn-success btn-lg marginTop marginBottom" />

          </form>

          

        </div>

      </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script>

    $(".contentContainer").css("min-height",$(window).height());

    </script>

  </body>
</html>
