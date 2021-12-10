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
    <link rel="stylesheet" type="text/css" media="screen" href="js/jquery-ui.css" />
    <script src="js/jquery-ui.js"></script>
    <!-- <script src="js/jquery.js"></script> -->
    <link href='select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/iCheck/skins/flat/green.css">
  <style>
    input[type=text] {
      width: 100%;
      padding: 4px 15px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 1px solid #555;
      outline: none;
    }

    input[type=text]:focus {
      border: 3px solid #555;
      background-color: lightblue;
    }
  </style>
  </head>
  <?php 
  include_once "config/db_connection.php";
  ?>
  <?php
  ob_start();

  session_start();
  if (!(isset($_SESSION['username'])) || (isset($_SESSION['role'])) && ($_SESSION['key_log']) != '$2y$10$9xxdZv4hPmKzK9Y5f2/useHw86fR0/5gKxD9pmDwJ/d0iKq8/uW2.'){
    session_destroy();
    header("location:index.php");
  } else {
    
      $username = $_SESSION['username'];
    }
  ?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>AIIUYT</span></a>
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
                  ?>><a href="dashboard.php?y=1"><i class="fa fa-home"></i><b>Home</b></a></li>
                    <li <?php
                  if (@$_GET['y'] == 2)
                      echo 'class="active"';
                  ?>><a href="dashboard.php?y=2"><i class="fa fa-edit"></i><b>Details_Entry</b></a></li>
                    <li <?php
                  if (@$_GET['y'] == 3)
                      echo 'class="active"';
                  ?>><a href="dashboard.php?y=3"><i class="fa fa-list-alt"></i><b>My History</b></a></li>
                    <li <?php
                  if (@$_GET['y'] == 4)
                      echo 'class="active"';
                  ?>><a href="dashboard.php?y=4"><i class="fa fa-plus-square"></i><b>Age / DOB Assign</b></a></li>
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
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
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
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
  Rules and Regulations...</div>';
}
?>
<!-- 1st Page Done -->
<!--2nd Page Starts -->
<?php
if(@$_GET['y'] == 2 && (@$_GET['Step']) == 2){
  echo '
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Detail <small>Entry</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">

                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                     <code>Note ::</code> Enter the Details Carefully, Changes would not be possible! 
                    </p>
                    <form action="yogashala.php?y=add_participants&name=' . @$_GET['name'] . '&count=' . @$_GET['count'] . '&gender='.@$_GET['gender'].' "  method="POST">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th><center>  Name  </center></th>
                          <th><center>Tag_Num</center></th>
                          <th><center>Age</center></th>
                          <th><center>DOB</center></th>
                          <th><center>University</center></th>
                          <th>Optional_Asana_1</th>
                          <th>Optional_Asana_2</th>
                          <th>Optional_Asana_3</th>
                        </tr>
                      </thead>
                      <tbody>';
                      
                      for ($i=1 ;$i<= @$_GET['count']; $i++)
                      {
                        echo '<tr>
                                <td><input type="text" name="1'.$i.'" id="Check_Name" placeholder="Name" required="required"></td>';
                                $tag = mt_rand(10000,99999);
                                echo '<td><b>'.$tag.'</b></td>
                                <input type="hidden" name="2'.$i.'" value="'.$tag.'">
                                <td><input type="text" name="3'.$i.'" id="age'.$i.'" readonly /></td>
                                <td><input type="text" name="4'.$i.'" id="dob'.$i.'"></td>
                                <td>'.@$_GET['name'].'</td>
                                <td><input type="text" name="5'.$i.'" id="Check_op1" placeholder="Ex :: ....." required="required"></td>
                                <td><input type="text" name="6'.$i.'" id="Check_op2" placeholder="Ex :: ....." required="required"></td>
                                <td><input type="text" name="7'.$i.'" id="Check_op3" placeholder="Ex :: ....." required="required"></td>
                              </tr>';
                      }

                      echo  '</tbody>
                    </table>
                    <div class="form-group">
                    <label class="col-md-12 control-label" for=""></label>
                    <div class="col-md-12"> 
                      <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="submit" onsubmit="ChechForm()" class="btn btn-primary"/>
                    </div>
                  </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>';
        for ($j=1;$j<=@$_GET['count'];$j++){
        echo '<script type = "text/javascript">
        $(document).ready(function () {
            var age = "";
            $("#dob'.$j.'").datepicker({
                onSelect: function (value, ui) {
                    var today = new Date();
                    age = today.getFullYear() - ui.selectedYear;
                    $("#age'.$j.'").val(age);
                },
                changeMonth: true,
                changeYear: true
                })
            })
        </script>';
        }
        echo '<script>
        window.onload = function AlertFunction() { 
          Swal.fire({
            icon: "warning",
            title: "17 >= Age <=24",
            text: "Be Sure When You Enter Age!!!",
            footer: "Any Problem Contact Admin!"
          })              
        }
        </script>
      <script>
      function Mysuccess(){
        Swal.fire(
        "Good job!",
        "You have uploaded the Details!",
        "success"
      )
      }
      </script>';

}
if (@$_GET['y'] == 2 && !(@$_GET['Step'])) {
    echo '<div class="right_col" role="main">
<div class="row">
<span class="title1" style="margin-left:35%;font-size:30px;"><b>Enter Participant Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="yogashala.php?y=Num_participants"  method="POST">
<fieldset>
<center>
  <select id="selUser" style="width: 200px;" name="university_name" required="required">
            <option value="0">-- Select University --</option>          
            <option value="RGUKT NUZVID">RGUKT NUZVID</option>  
            <option value="RGUKT ONGOLE">RGUKT ONGOLE</option>   
            <option value="RGUKT SRIKAKULAM">RGUKT SRIKAKULAM</option>        
            <option value="RGUKT RK VALLEY">RGUKT RK VALLEY</option>        
            <option value="RGUKT BASARA">RGUKT BASARA</option>
            <option value="GUNTUR">GUNTUR</option>
            <option value="Rajamundry">Rajamundry</option>        
            <option value="RGUKT IIIT N">RGUKT IIIT N</option>        
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


<h4><label>Gender *:</label><h4>
<p>
  Boys:
  <input type="radio" class="flat" name="gender" id="genderM" value="Boy" checked="" required /> 
  <br />
  <br />
  Girls:
  <input type="radio" class="flat" name="gender" id="genderF" value="Girl" />
</p>

<br />
<br />

<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>  
  <div class="col-md-12">
  <input id="Paticipants" name="Num_participant" placeholder="Enter Number of Participants from the University" class="form-control input-md" min="0" type="number" required="required">
  </div>
</div>
<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>
</fieldset>
</form>
</div>
</div></div>
<script>
window.onload = function AlertFunction() {
var c = location.search.split("uploaded")[1];
if (c == "=AlreadyTaken"){ 
  Swal.fire({
    icon: "warning",
    title: "University AlredyTaken",
    text: "Check Your Schedule",
    footer: "Any Problem Contact Admin!"
  }) 
}
else if (c == "=True"){
  Swal.fire({
    icon: "success",
    title: "Uploaded Successfully",
    text: "Great Job!!!",
    footer: "Any Problem Contact Admin!"
  }) 
}

}
</script>';
}
?>
<?php
if(@$_GET['y'] == 4 && (@$_GET['Step']) == 4){
  echo '
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Detail <small>Entry</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">

                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                     <code>Note ::</code> Enter the Details Carefully, Changes would not be possible! 
                    </p>
                    <form action="yogashala.php?y=add_dob&name=' . @$_GET['name'] . '&count=' . @$_GET['count'] . '&gender='.@$_GET['gender'].' "  method="POST">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th><center>  Name  </center></th>
                          <th><center>Tag_Num</center></th>
                          <th><center>Age</center></th>
                          <th><center>DOB</center></th>
                          <th><center>University</center></th>
                          <th>Optional_Asana_1</th>
                          <th>Optional_Asana_2</th>
                          <th>Optional_Asana_3</th>
                        </tr>
                      </thead>
                      <tbody>';
                      $Uni_name = @$_GET['name'];
                      $Gen = @$_GET['gender'];
                      $Query = mysqli_query($con,"SELECT * FROM Participants WHERE University_Name = '$Uni_name' AND Gender = '$Gen'");
                      $i=0;
                      while($res = mysqli_fetch_array($Query)){
                        $Name = $res['Name'];
                        $Tag = $res['Tag'];
                        $uni = $res['University_Name'];
                        $Gen = $res['Gender'];
                        $AS1 = $res['Asana_1'];
                        $AS2 = $res['Asana_2'];
                        $AS3 = $res['Asana_3'];
                        $i = $i+1;
                        echo '<tr>
                              <td>'.$Name.'</td>
                              <td>'.$Tag.'</td>';
                              $DOB = $res['DOB'];
                              if($DOB == NULL){
                              echo '<td><input type="text" name="3'.$i.'" id="age'.$i.'" required="required" readonly /></td>
                              <td><input type="text" name="4'.$i.'" id="dob'.$i.'" required="required"></td>';
                              }
                              else{
                                echo '<td>'.$res['Age'].'</td>
                                      <td>'.$res['DOB'].'</td>';       
                              }
                              echo '<td>'.$uni.'</td>
                              <td>'.$AS1.'</td>
                              <td>'.$AS2.'</td>
                              <td>'.$AS3.'</td>
                              </tr>';
                      }
                      
                      echo  '</tbody>
                    </table>
                    <div class="form-group">
                    <label class="col-md-12 control-label" for=""></label>
                    <div class="col-md-12"> 
                      <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="submit" onsubmit="ChechForm()" class="btn btn-primary"/>
                    </div>
                  </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>';
        for ($j=1;$j<=@$_GET['count'];$j++){
        echo '<script type = "text/javascript">
        $(document).ready(function () {
            var age = "";
            $("#dob'.$j.'").datepicker({
                onSelect: function (value, ui) {
                    var today = new Date();
                    age = today.getFullYear() - ui.selectedYear;
                    $("#age'.$j.'").val(age);
                },
                changeMonth: true,
                changeYear: true
                })
            })
        </script>';
        }
        echo '<script>
        window.onload = function AlertFunction() { 
          Swal.fire({
            icon: "warning",
            title: "17 >= Age <=24",
            text: "Be Sure When You Enter Age!!!",
            footer: "Any Problem Contact Admin!"
          })              
        }
        </script>
      <script>
      function Mysuccess(){
        Swal.fire(
        "Good job!",
        "You have uploaded the Details!",
        "success"
      )
      }
      </script>';
}
if (@$_GET['y'] == 4 && !(@$_GET['Step'])) {
    echo '<div class="right_col" role="main">
<div class="row">
<span class="title1" style="margin-left:35%;font-size:30px;"><b>Enter Participant Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="yogashala.php?y=Updation_dob"  method="POST">
<fieldset>
<center>
  <select id="selUser" style="width: 200px;" name="university_name" required="required">
            <option value="0">-- Select University --</option>          
            <option value="RGUKT NUZVID">RGUKT NUZVID</option>  
            <option value="RGUKT ONGOLE">RGUKT ONGOLE</option>   
            <option value="RGUKT SRIKAKULAM">RGUKT SRIKAKULAM</option>        
            <option value="RGUKT RK VALLEY">RGUKT RK VALLEY</option>        
            <option value="RGUKT BASARA">RGUKT BASARA</option>
            <option value="GUNTUR">GUNTUR</option>
            <option value="Rajamundry">Rajamundry</option>        
            <option value="RGUKT IIIT N">RGUKT IIIT N</option>        
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


<h4><label>Gender *:</label><h4>
<p>
  Boys:
  <input type="radio" class="flat" name="gender" id="genderM" value="Boy" checked="" required /> 
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Girls:
  <input type="radio" class="flat" name="gender" id="genderF" value="Girl" />
</p>

<br />
<br />
<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>
</fieldset>
</form>
</div>
</div></div>
<script>
window.onload = function AlertFunction() {
var c = location.search.split("uploaded")[1];
if (c == "=AlreadyTaken"){ 
  Swal.fire({
    icon: "warning",
    title: "University AlredyTaken",
    text: "Check Your Schedule",
    footer: "Any Problem Contact Admin!"
  }) 
}
else if (c == "=True"){
  Swal.fire({
    icon: "success",
    title: "Uploaded Successfully",
    text: "Great Job!!!",
    footer: "Any Problem Contact Admin!"
  }) 
}

}
</script>';
}
if( @$_GET['y'] == 3 ){
  // echo '<span class="title1" style="margin-left:40%;font-size:30px;"><b>My History</b></span><br /><br />';
    $query = mysqli_query($con, "SELECT * FROM Participants WHERE Uploader='$username' ORDER BY Time DESC ") or die('Error197');
    echo '<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>My <small>History</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                  
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Detail Entry List</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      <code>Note ::</code> If any mistake goes, Inform Immeditely! 
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>S.No.</th>
                          <th>Name</th>
                          <th>Age</th>
                          <th>DOB</th>
                          <th>University</th>
                          <th>Gender</th>
                          <th>Optional_Asana_1</th>
                          <th>Optional_Asana_2</th>
                          <th>Optional_Asana_3</th>
                        </tr>
                      </thead>
                      <tbody>';
                        $count = 0;
                        while ($row = mysqli_fetch_array($query)) {
                            $name = $row['Name'];
                            $tag   = $row['Tag'];
                            $Age   = $row['Age'];
                            $DOB   = $row['DOB'];
                            $uni   = $row['University_Name'];
                            $Gender = $row['Gender'];
                            $op_a1  = $row['Asana_1'];
                            $op_a2  = $row['Asana_2'];
                            $op_a3  = $row['Asana_3'];
                            // $time = $row['Time'];
                            $count++;
                            echo '<tr>
                                  <td>'.$count.'</td>
                                  <td>'.$name.'</td>
                                  <td>'.$Age.'</td>
                                  <td>'.$DOB.'</td>
                                  <td>'.$uni.'</td>
                                  <td>'.$Gender.'</td>
                                  <td>'.$op_a1.'</td>
                                  <td>'.$op_a2.'</td>
                                  <td>'.$op_a3.'</td>
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
</html>