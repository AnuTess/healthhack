<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" user-scalable=no>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Rede</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/additional.css" rel="stylesheet">
    <link href="css/daterangepicker.css" rel="stylesheet">

    <!--fonts-->
    <link async href='https://fonts.googleapis.com/css?family=Avenir:100,800|Lato' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script>
      $(function(){
            if($(window).width() < 1025){
            $('nav').addClass('navbar-default');
            $('nav').removeClass('navbar-static-top').addClass('navbar-fixed-top');
            $('body').css({"padding-top": "70px"});
            }
        });
    </script>
  </head>

  <body>

    <header class="jumbotron subhead" style="background-color:#000;">
      <nav class="navbar navbar-change navbar-static-top">
            <div class="container-fluid">

             <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-control="navbar">
                  <span class="sr-only"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button><a class="navbar-brand" href="index.html">Rede<span class="color">.</span></a>
              </div>

              <div class="collapse navbar-collapse navbar-right" id="navbar">
                <ul class="nav navbar-nav">
                  <li><a href="./index.html">Home</a></li>
                  <li><a href="./about.html">About</a></li>
                  <li class="active"><a href="./getstarted.php">Get Started</a></li>
                  <li><a href="./contact.php">Contact</a></li>
                </ul>
              </div>

            </div><!--container-->
      </nav>

      <div class="container" style="text-align: left; color:#fff">
        <h1>Report</h1>
      </div>
    </header>

    <?php 

     $link = mysqli_connect("localhost","root","", "rede") or die("failed to connect to server!!");

     $sql = 'SELECT * FROM patient'; 

     $record = mysqli_query($link, $sql);
    ?>

    <div class="site-wrapper">
        <div class="inner cover">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Value</th>
                    <th>Normal</th>    
                    <th>New</th>
                    <th>Important</th>
                    <th>Meaning</th>
                    <th>To Do</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                   while($patient=mysqli_fetch_assoc($record)){
                    echo "<tr>";

                    echo "<td>".$patient['biomarker']."</td>";
                    echo "<td>".$patient['biomarker_value']."</td>";
                    echo "<td>".$patient['biomarker_range']."</td>";

                    echo "<td>"."<input type='text' name='name'>"."</td>";
                    echo "<td>"."<input type='text' name='name'>"."</td>";
                    echo "<td>"."<input type='text' name='name'>"."</td>";
                    echo "<td>"."<input type='text' name='name'>"."</td>";

                    echo "</tr>";
                   }
                  ?>
                </tbody>
              </table>

              <div class="control-group" style="text-align: center; padding-top: 10px; padding-bottom: 10px"> 
                <div class="controls">
                  <button type="submit" name="submit" class="btn">Submit</button>
                </div>
              </div>
        </div>
    </div>

    <div class="mastfoot">
      <div class="inner">
        <ul>
          <li><a href="https://twitter.com/AskJacobNYC" target="_blank"><div class="socialmedia" id="twitter"></div></a></li>
          <li><a href="https://www.instagram.com/askjacob_nyc" target="_blank"><div class="socialmedia" id="instagram"></div></a></li>
        </ul>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/moment.min.js"></script>

    <script type="text/javascript">
  
    </script>
  </body>
</html>
