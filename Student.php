<html>
  <head>
  <title>Home</title>

    <link href="css/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/Table.css">
   
    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
    <script src='select2/jquery-3.2.1.min.js' type='text/javascript'></script>
    <script src='select2/dist/js/select2.min.js' type='text/javascript'></script>
    <link href="js/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href='select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/iCheck/skins/flat/green.css">
  </head>
  <?php 
  include_once "config/db_connection.php";
  ?>
  <?php
  ob_start();

  session_start();
  if (($_SESSION['keys_log']) != '$2y$10$Jie9cW1tl1vKaUcXQ1A3Zuxs653F1Y/A8ceElgEQ8SgZ9HNCWc5N.'){
    session_destroy();
    header("location:sir.php");
  } else {
      $role = $_SESSION['role'];
      $username = $_SESSION['username'];
    }
  ?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="sir.php" class="site_title"><i class="fa fa-paw"></i> <span>AIIUYT</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><b><?php echo $username; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                  <ul class="nav side-menu">
                    <li <?php
                  if (@$_GET['y'] == 1)
                      echo 'class="active"';
                  ?>><a href="Student.php?y=1"><i class="fa fa-home"></i><b>Home</b></a></li>
                    <li <?php
                  if (@$_GET['y'] == 2)
                      echo 'class="active"';
                  ?>><a href="Student.php?y=2"><i class="fa fa-edit"></i><b>Participants List</b></a></li>
                    <li <?php
                  if (@$_GET['y'] == 3)
                      echo 'class="active"';
                  ?>><a href="Student.php?y=3"><i class="fa fa-list-alt"></i><b>Primary</b></a></li>
                  <li <?php
                  if (@$_GET['y'] == 4)
                      echo 'class="active"';
                  ?>><a href="Student.php?y=4"><i class="fa fa-list"></i><b>Secondary</b></a></li>
                  <li <?php
                  if (@$_GET['y'] == 5)
                      echo 'class="active"';
                  ?>><a href="Student.php?y=5"><i class="fa fa-trash-o"></i><b>Delete Account</b></a></li>
                  <li <?php
                  if (@$_GET['y'] == 6)
                      echo 'class="active"';
                  ?>><a href="Student.php?y=6"><i class="fa fa-bar-chart"></i><b>LeadBoard Sample</b></a></li>
                  </ul>
                </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout_1.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><b><?php echo $username; ?></b>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="logout_1.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <?php
if (@$_GET['y'] == 1){
  echo '<div class="right_col" role="main">
  <h3>One Mistake Cost a lot be sure that everything is correct....!!!!!</h3></div>';
}
?>
<!-- 1st Page Done -->
<!--2nd Page Starts -->
<?php
if (@$_GET['y'] == 2) {
    echo '<div class="right_col" role="main">
          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Participants<small>List</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      These were the list of entire Participants.All the DetailEntired Participant Would be avalible Here.Check thoughly..!!<code>Here Each Participant Details Would be of One time,More than One means Just Delete/inform.</code>
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Tag</th>
                          <th>Age</th>
                          <th>DOB</th>
                          <th>Asana_1</th>
                          <th>Asana_2</th>
                          <th>Asana_3</th>
                          <th>University</th>
                          <th>Gender</th>
                          <th>Uploader</th>
                          <th>Time</th>
                        </tr>
                      </thead>
                      <tbody>';
                        $Query = mysqli_query($con,"SELECT * FROM Participants");
                        while ($res = mysqli_fetch_array($Query)){
                          $Name =$res['Name'];
                          $Tag = $res['Tag'];
                          $Age = $res['Age'];
                          $DOB = $res['DOB'];
                          $AS1 = $res['Asana_1'];
                          $AS2 = $res['Asana_2'];
                          $AS3 = $res['Asana_3'];
                          $University = $res['University_Name'];
                          $Uploader = $res['Uploader'];
                          $gender = $res['Gender'];
                          $Time = $res['Time'];
                          echo '<tr>
                                <td>'.$Name.'</td>
                                <td>'.$Tag.'</td>
                                <td>'.$Age.'</td>
                                <td>'.$DOB.'</td>
                                <td>'.$AS1.'</td>
                                <td>'.$AS2.'</td>
                                <td>'.$AS3.'</td>
                                <td>'.$University.'</td>
                                <td>'.$gender.'</td>
                                <td>'.$Uploader.'</td>
                                <td>'.$Time.'</td>
                                </tr>'; 
                        }
                      echo '</tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>';
}
if (@$_GET['y'] == 3) {
    echo '<div class="right_col" role="main">
          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Participants<small>List</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      These were the list of entire Participants.All the DetailEntired Participant Would be avalible Here.Check thoughly..!!<code>Here Each Participant Details Would be of One time,More than One means Just Delete/inform.</code>
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>University</th>
                          <th>Gender</th>
                          <th>JudgeNames(Default)</th>
                          <th>Panel</th>
                          <th>Time</th>
                          </tr>
                      </thead>
                      <tbody>';
                        $Query = mysqli_query($con,"SELECT * FROM Primary_Score");
                        while ($res = mysqli_fetch_array($Query)){
                          $Name =$res['Name'];
                          $University = $res['University'];
                          $gender = $res['Gender'];
                          $Uploader = $res['Judge_Name'];
                          $Panel = $res['Panel_Num'];
                          $Time = $res['Time'];
                          echo '<tr>
                                <td>'.$Name.'</td>
                                <td>'.$University.'</td>
                                <td>'.$gender.'</td>
                                <td>'.$Uploader.'</td>
                                <td>'.$Panel.'</td>
                                <td>'.$Time.'</td>
                                </tr>'; 
                        }                      
                      echo '</tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>';
}
if (@$_GET['y'] == 4) {
    echo '<div class="right_col" role="main">
          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Participants<small>List</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      These were the list of entire Participants.All the DetailEntired Participant Would be avalible Here.Check thoughly..!!<code>Here Each Participant Details Would be of One time,More than One means Just Delete/inform.</code>
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>University</th>
                          <th>Gender</th>
                          <th>Time</th>
                          </tr>
                      </thead>
                      <tbody>';
                        $Query = mysqli_query($con,"SELECT * FROM Final_Score");
                        while ($res = mysqli_fetch_array($Query)){
                          $Name =$res['Name'];
                          $University = $res['University'];
                          $gender = $res['Gender'];
                          $Time = $res['Time'];
                          echo '<tr>
                                <td>'.$Name.'</td>
                                <td>'.$University.'</td>
                                <td>'.$gender.'</td>
                                <td>'.$Time.'</td>
                                </tr>'; 
                        }                      
                      echo '</tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>';
}
?>
<?php
if (@$_GET['y'] == 5) {
    echo '<div class="right_col" role="main">
<div class="row">
<span class="title1" style="margin-left:35%;font-size:30px;"><b>Enter Participant Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="StudentScore.php?y=DelAccount"  method="POST">
<fieldset>
<center>
  <select id="selUser" style="width: 300px;" name="university_name" required="required">
            <option value="0">-- Select University --</option>          
            <option value="RGUKT NUZVID">RGUKT NUZVID</option>  
            <option value="RGUKT ONGOLE">RGUKT ONGOLE</option>   
            <option value="RGUKT SRIKAKULAM">RGUKT SRIKAKULAM</option>        
            <option value="RGUKT RK VALLEY">RGUKT RK VALLEY</option>        
            <option value="RGUKT BASARA">RGUKT BASARA</option>        
            <option value="RGUKT IIIT N">RGUKT IIIT N</option>
            <option value="GUNTUR">GUNTUR</option>
            <option value="Rajamundry">Rajamundry</option>        
            <option value="RGUKT IIIT NUZVID">RGUKT IIIT NUZVID</option> 
  </select>   
  <br/>

</center>
<script>
$(document).ready(function(){
    $("#selUser").select2();
});
</script>

<br />
<br />

<center>
<h4><label>Gender :</label><h4>
<p>
  Boys:
  <input type="radio" class="flat" name="gender" id="genderM" value="Boy" checked="" required />  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
  Girls:
  <input type="radio" class="flat" name="gender" id="genderF" value="Girl" />
</p>
</center>
<br />
<br />

<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" onsubmit="onsuccess()" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>
</fieldset>
</form></div>
</div></div>
<script>
function onsuccess(){ 
  Swal.fire({
    icon: "warning",
    title: "Are You Sure to Submit!!",
    text: "Check Score Once Again!!",
    footer: "Any Problem Contact @Admin!"
  }) 
}
</script>';
}
if (@$_GET['y'] == 6){
  echo '<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Final Score <small>Individual & Team</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Individual <small>MEN</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Rank</th>
                          <th>Name</th>
                          <th>University</th>
                          <th>Score</th>
                        </tr>
                      </thead>
                      <tbody>';
                      $Query  = mysqli_query($con,"SELECT Name,University,Grand_Total FROM Final_Score WHERE Gender = 'Boy' ORDER BY Grand_Total DESC,Total_CPAS DESC,Total_OPAS DESC,Total_SK DESC,SN DESC LIMIT 6");
                      $c=1;
                      while($res = mysqli_fetch_array($Query)){
                        
                        $Name = $res['Name'];
                        $University = $res['University'];
                        $total = $res['Grand_Total'];
                        echo '<tr>
                          <th scope="row">'.$c++.'</th>
                          <td>'.$Name.'</td>
                          <td>'.$University.'</td>
                          <td>'.$total.'</td>
                        </tr>';
                      }  
                      echo '</tbody>
                    </table>

                  </div>
                </div>
              </div>
}

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Individual <small>WOMEN</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Rank</th>
                          <th>Name</th>
                          <th>University</th>
                          <th>Score</th>
                        </tr>
                      </thead>
                      <tbody>';
                      $Query  = mysqli_query($con,"SELECT Name,University,Grand_Total FROM Final_Score WHERE Gender = 'Girl' ORDER BY Grand_Total DESC,Total_CPAS DESC,Total_OPAS DESC,Total_SK DESC,SN DESC LIMIT 6");
                      $c=1;
                      while($res = mysqli_fetch_array($Query)){
                        
                        $Name = $res['Name'];
                        $University = $res['University'];
                        $total = $res['Grand_Total'];
                        echo '<tr>
                          <th scope="row">'.$c++.'</th>
                          <td>'.$Name.'</td>
                          <td>'.$University.'</td>
                          <td>'.$total.'</td>
                        </tr>';
                      }  
                      echo '</tbody>
                    </table>

                  </div>
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Team Event<small>MEN</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Rank</th>
                          <th>University</th>
                          <th>Score</th>
                        </tr>
                      </thead>
                      <tbody>';
                       $Query  = mysqli_query($con,"SELECT University,sum(Grand_Total) as AGS FROM Final_Score WHERE Gender ='Boy' GROUP BY University ORDER BY AGS DESC LIMIT 5");
                      $c=1;
                      while($res = mysqli_fetch_array($Query)){
                        $University = $res['University'];
                        $total = $res['AGS'];
                        echo '<tr>
                          <th scope="row">'.$c++.'</th>
                          <td>'.$University.'</td>
                          <td>'.$total.'</td>
                        </tr>';
                      } 

                      echo '</tbody>
                    </table>

                  </div>
                </div>
              </div>


              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Team Event<small>WOMEN</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Rank</th>
                          <th>University</th>
                          <th>Score</th>
                        </tr>
                      </thead>
                      <tbody>';
                      $Query  = mysqli_query($con,"SELECT University,sum(Grand_Total) as AGS FROM Final_Score WHERE Gender ='Girl' GROUP BY University ORDER BY AGS DESC LIMIT 5;");
                      $c=1;
                      while($res = mysqli_fetch_array($Query)){
                        $University = $res['University'];
                        $total = $res['AGS'];
                        echo '<tr>
                          <th scope="row">'.$c++.'</th>
                          <td>'.$University.'</td>
                          <td>'.$total.'</td>
                        </tr>';
                      }  
                      echo '</tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>';
}
?>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            copyrights by Yogashala
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
  </body>
  <!-- jQuery -->
  <!-- <script src="css/jquery.min.js"></script> -->
  <!-- Bootstrap -->
  <script src="css/bootstrap.min.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="css/custom.min.js"></script>
  <!-- Radio Button -->
  <script src="css/iCheck/icheck.min.js"></script>
  <script src="js/prettify.js"></script>
  <script src="css/Switchery/dist/switchery.min.js"></script>
  <script src="js/sweetalert2@9.js"></script>
  <script src="js/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="js/datatables.net-bs/js/dataTables.buttons.min.js"></script>
  <script src="js/datatables.net-bs/js/buttons.bootstrap.min.js"></script>
  <script src="js/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="js/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="js/datatables.net-buttons/js/buttons.print.min.js"></script>
</html>