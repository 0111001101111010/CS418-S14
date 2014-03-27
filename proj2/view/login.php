<?php include 'include/header.php';?>
<?php include 'include/nav.php';?>
<?php include 'include/connect_database.php';?>

    <body>
      <div class="navbar my_navbar navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Title</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="login.html"><i class="fa fa-cog fa-fw"></i> Log In</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>

      <div class="wrapper wrapper_login">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <h2>Log in</h2>
            <form role="form" method="post" action="loginCheck.php">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="myusername" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="mypassword" placeholder="Password">
              </div>

              <button type="submit" class="btn btn-default">Submit</button>
            </form>

          </div>

        </div>
      </div>




      <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

      <script type='text/javascript' src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

      <script type='text/javascript'>
        $(document).ready(function() {
          });
      </script>
<?php include 'include/footer.php';?>
