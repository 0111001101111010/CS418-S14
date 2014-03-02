<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>CS418 - Project 1</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="dist/css/bootstrap.css" rel="stylesheet">
        <link href="dist/css/extra.css" rel="stylesheet">

        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="/bootstrap/img/favicon.ico">
        <link rel="apple-touch-icon" href="/bootstrap/img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/bootstrap/img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/bootstrap/img/apple-touch-icon-114x114.png">


        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

        <script src="dist/js/jquery-1.10.2.min.js" type="text/javascript"></script>


    </head>

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

    </body>
</html>
