
<?php
 include('session.php');

?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>COVID-19 HOME CARE</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style.css">
        <script type="text/javascript">
            .carousel-inner{
              max-width:80%;
              max-height: 800px !important;
            }
        </script>
    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <a href="index.php"><h3>COVID-19 HOME CARE</h3><a>
                </div>

                <ul class="list-unstyled components">
                    <p><b>DOCTORS PANEL</b></p>
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">PATIENTS LIST</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                          <li><a href="patients.php">PATIENTS LIST</a></li>
                        </ul>
                    </li>
                    <li>

                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">PATIENTS MONITORING</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                          <li><a href="pat_monitor.php">PATIENTS TO MONITOR</a></li>
                        </ul>
                    </li>
                </ul>
                 <ul class="list-unstyled CTAs">
                    <li><a>copyright</a></li>
                    <li><a>CLOUD_project_2020</a></li>
                </ul>

            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>MENU</span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a ><?php echo $login_session; ?></a></li>
                                <li><a href="patients_details.html">Add Patients</a></li>
                                <li><a href="logout.php">Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

               <div class="row">
                 <div class="col-sm-4" >
                   <div class="card  mb-3" style="max-width: 360rem;">
                     <div class="card-body">

                     </div>
                   </div>
                 </div>



                 <div class="col-sm-4">
                   <div class="card ">
                     <div class="card-body">
                       <h3 class="card-title">Areas</h3>
                       <p class="card-text"><h4>click to see the details of supporting area and regions</h4></p>
                       <a href="Area.php" class="btn btn-info">View Details</a>
                     </div>
                   </div>
                 </div>

               </div>
                <div class="line"></div>

             <div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner"  style = " max-width:100%;  max-height: 30% ">
      <div class="item active">
        <img src="images/covid19.jpg" style="width:100%; height: 70%">
      </div>

      <div class="item">
        <img src="images/affected.png" style="width:100%; height: 70%">
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>






        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
    </body>
</html>
