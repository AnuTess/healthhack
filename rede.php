<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="A lightweight autocomplete plugin for jQuery">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" user-scalable=no>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300">
    <link rel="stylesheet" href="css/jquery.auto-complete.css">

    <title>Rede</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/additional.css" rel="stylesheet">

    <!--fonts-->
    <link async href='https://fonts.googleapis.com/css?family=Avenir:100,800|Lato' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
      $(function(){
            if($(window).width() < 1025){
            $('nav').addClass('navbar-default');
            $('nav').removeClass('navbar-static-top').addClass('navbar-fixed-top');
            $('body').css({"padding-top": "70px"});
            }

        var availableTags = [
          "Diabetes",
          "High Blood Pressure",
          "Dehydration",
          "",
        ];
        var availableTags1 = [
          "Kidney Problems",
          "Vision Problems",
          "Foot Numbness",
        ];

        $( "#availableTags" ).autocomplete({
          source: availableTags
        });

        $( "#availableTags1" ).autocomplete({
      source: availableTags
    });
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

     $link = mysqli_connect("","root","", "rede") or die("failed to connect to server!!");

     $sql = 'SELECT * FROM Sam'; 

     $record = mysqli_query($link, $sql);

    if(isset($_POST['send'])){
    $errorMessage = "";
    $name=$_POST['name'];
    $email=$_POST['email'];
    $hometown=$_POST['hometown'];
    $daterange=$_POST['daterange'];

    echo "<p><span class='glyphicon glyphicon-ok-sign'></span>Great! You'll receive a confirmation email in a moment.</p>"."\n";

    $insqDbtb="INSERT INTO `Sam`
    (`causes`, `advise`) VALUES ('$causes', '$advise')";
    mysqli_query($link,$insqDbtb) or die(mysqli_error($link));
   }

      mysqli_close($link);
    ?>

    <div class="site-wrapper">

      <div class="inner-cover">
          <div class="col-sm-6 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Value</th>
                    <th>Normal</th>    
                    <th>New</th>
                    <th>Education Level</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                   while($patient=mysqli_fetch_assoc($record)){
                    if($patient['biomarker_value']<=$patient['biomarker_low']||$patient['biomarker_value']>=$patient['biomarker_high']){
                    echo "<tr class='danger'>";
                  } else if ($patient['biomarker_value']>$patient['biomarker_low']||$patient['biomarker_value']<$patient['biomarker_high']){
                    echo "<tr class='success'>";
                  }

                    echo "<td align='left'>".$patient['biomarker']."</td>";
                    echo "<td align='left'>".$patient['biomarker_value']."</td>";
                    echo "<td align='left'>".$patient['biomarker_range']."</td>";
                    echo "<td align='left'>"."<label class='radio-inline'>"."<input type='radio' name='cf' id='optionsRadios1' value='1'>"."Yes"."</label>"."<label class='radio-inline'>"."<input type='radio' name='cf' id='optionsRadios2' value='2'>"."No"."</label>"."</td>";
                    echo "<td align='left'>"."<div class='controls'>"."<select name='party'>"."<option value='1'>"."Low"."</option>"."<option value='2'>"."Medium"."</option>"."<option value='3'>"."High"."</option>"."</td>";

                    echo "</tr>";
                   }
                  ?>
                </tbody>
              </table>
          </div>
          </div> <!--side bar-->v
          <div class="col-sm-6 blog-sidebar">
          <form class="form-vertical" style="text-align:left"  id="user_form" role="form" method="post">
            
            <div class="control-group col-sm-12">
              <label class="control-label" for="inputRisks">Causes:</label>
                <div class="controls">
                  <textarea class="form-control" id="availableTags" name="risks" type="text" rows="3"></textarea>
                </div>
            </div>

            <div class="control-group col-sm-12">
              <label class="control-label" for="inputAdvise">Advise:</label>
                <div class="controls">
                  <textarea class="form-control" id="availableTags1" name="advise" type="text" rows="3"></textarea>
                </div>
            </div>

           <div class="control-group col-sm-12" style="text-align: center; padding-top: 10px; padding-bottom: 10px"> 
              <div class="controls">
                <button type="submit" name="send" class="btn">Send</button>
              </div>
           </div>
          </form>
        </div>
     </div>   
   </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/moment.min.js"></script> 
    <script src="bootstrap-tagautocomplete.js"></script>
  </body>
</html>
