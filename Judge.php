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

  <link href='select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/iCheck/skins/flat/green.css">
<style>
input[type=number] {
  width: 100%;
  padding: 4px 10px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 1px solid #555;
  outline: none;
}

input[type=number]:focus {
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
if (!(isset($_SESSION['username'])) || !(isset($_SESSION['role'])) && ($_SESSION['keys_log']) != '$2y$10$Reg6.CaUJVu0pmahdlyY3uqX01XeSLQCwvOP32IEC/nvR2L/MHmL.'){
  session_destroy();
  header("location:index.php");
} else {
    // $id = $_SESSION['user_role_id'];
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
              <a href="Judge.php?y=1" class="site_title"><i class="fa fa-linux"></i> <span><b>AIIUYT</b></span></a>
            </div>

            <div class="clearfix"></div>


            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><b><?php echo $username; ?></b></h2>
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
                ?>><a href="Judge.php?y=1"><i class="fa fa-home"></i><b>Home</b></a></li>
                  <li <?php
                if (@$_GET['y'] == 2)
                    echo 'class="active"';
                ?>><a href="Judge.php?y=2"><i class="fa fa-edit"></i><b>Details_Entry</b></a></li>
                  <li <?php
                    if (@$_GET['y'] > 2)  
                ?>><a href="Judge.php?y=4"></a></li>
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
        <!-- <div class="right_col" role="main"> -->
          
<?php
if (@$_GET['y'] == 1){
  echo '<div class="right_col" role="main">
  <b>King Daa....</b></div>';
  
}

?>
<?php
if(@$_GET['y'] == 2 && (@$_GET['Step']) == 2 ){
echo '<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Score <small>Entry</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <h3></h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Score<small>Sheet</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                     <code>$Note :: </code> : Enter Score Carefully, Check the data and then submit
                    </p>
                    <form method="post" action ="Judge_Score.php?y=Score_Sheet&count=' . @$_GET['count'] .'&uni_name='.@$_GET['uni_name'].'&Gender='.@$_GET['Gender'].'">
                <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
              <td rowspan="2"><b><center>S.no.</center></b></td>
              <td rowspan="2"><b><center>Name</center></b></td>
              <td colspan="4"><b><center>COMPULSORY ASANAS</center></b></td>
              <td colspan="3"><b><center>OPTIONAL ASANAS</center></b></td>
              <td rowspan="2"><b><center>SURYA NAMASKAR</center></b></td>
              <td colspan="2"><b><center>SHAT KRIYAS</center></b></td>
              </tr>
              <tr>
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>1</td>
              <td>2</td>
              </tr>
            </thead>
            <tbody>';
            $query = mysqli_query($con,"SELECT * FROM Participants WHERE University_Name='$_GET[uni_name]' AND Gender='$_GET[Gender]'") or die("Error in Details :: Missing Records.");

            $c=0;
            
            while($row = mysqli_fetch_array($query))
            { 
              $c++;
              $name = $row['Name'];
              echo '<tr>
                      <td><b>'.$c.'</b></td>
                      <td><b>'.$name.'</b></td>
                      <input type="hidden" name="Name'.$c.'" value="'.$name.'">';
                      $query3 = mysqli_query($con,"SELECT * FROM Primary_Score WHERE University='$_GET[uni_name]' AND Gender='$_GET[Gender]' AND Name='$name' AND  Judge_Name = '$username'") or die("Error in Details :: Missing Records.".mysqli_error($con));

                      while($res = mysqli_fetch_array($query3))
                      {

                        $CP_AS1 = $res['CP_AS1'];
                        if($CP_AS1 == -1.0){
                          echo '<td><input type="number" min="-1" pattern="^-?(?:[0-9](?:\.5)?|10)$"  step="0.5" max="10" name="CPA1'.$c.'" value="-1"></td>';
                        }
                        else{
                          echo '<td><b><center>'.$CP_AS1.'</center><b/></td>';
                        }
                        $CP_AS2 = $res['CP_AS2'];
                        if ($CP_AS2 == -1.0)
                        {
                          echo '<td><input type="number" min="-1" pattern="^-?(?:[0-9](?:\.5)?|10)$"  step="0.5" max="10" name="CPA2'.$c.'" value="-1"></td>';
                        }
                        else{
                          echo '<td><b><center>'.$CP_AS2.'</center><b/></td>';
                        }
                        $CP_AS3 = $res['CP_AS3'];
                        if ($CP_AS3 == -1)
                        {
                          echo '<td><input type="number" min="-1" pattern="^-?(?:[0-9](?:\.5)?|10)$"  step="0.5" max="10" name="CPA3'.$c.'" value="-1"></td>';
                        }
                        else{
                          echo '<td><b><center>'.$CP_AS3.'</center><b/></td>';
                        }
                        $CP_AS4 = $res['CP_AS4'];
                        if ($CP_AS4 == -1)
                        {
                          echo '<td><input type="number" min="-1" pattern="^-?(?:[0-9](?:\.5)?|10)$"  step="0.5" max="10" name="CPA4'.$c.'" value="-1"></td>';
                        }
                        else{
                          echo '<td><b><center>'.$CP_AS4.'</center><b/></td>';
                        }
                        $OP_AS1 = $res['OP_AS1'];
                        if ($OP_AS1 == -1)
                        {
                          echo '<td><input type="number" min="-1" pattern="^-?(?:[0-9](?:\.5)?|10)$"  step="0.5" max="10" name="OPA1'.$c.'" value="-1"></td>';
                        }
                        else{
                          echo '<td><b><center>'.$OP_AS1.'</center><b/></td>';
                        }
                        $OP_AS2 = $res['OP_AS2'];
                        if ($OP_AS2 == -1)
                        {
                          echo '<td><input type="number" min="-1" pattern="^-?(?:[0-9](?:\.5)?|10)$"  step="0.5" max="10" name="OPA2'.$c.'" value="-1"></td>';
                        }
                        else{
                          echo '<td><b><center>'.$OP_AS2.'</center><b/></td>';
                        }
                        $OP_AS3 = $res['OP_AS3'];
                        if ($OP_AS3 == -1)
                        {
                          echo '<td><input type="number" min="-1" pattern="^-?(?:[0-9](?:\.5)?|10)$"  step="0.5" max="10" name="OPA3'.$c.'" value="-1"></td>';
                        }
                        else{
                          echo '<td><b><center>'.$OP_AS3.'</center><b/></td>';
                        }
                        $SN     = $res['SN'];
                        if ($SN == -1)
                        {
                          echo '<td><input type="number" min="-1" pattern="^-?(?:[0-9](?:\.5)?|10)$"  step="0.5" max="10" name="SN'.$c.'" value="-1"></td>';
                        }
                        else{
                          echo '<td><b><center>'.$SN.'</center><b/></td>';
                        }
                        $SK_1   = $res['SK_1'];
                        if ($SK_1 == -1)
                        {
                          echo '<td><input type="number" min="-1" pattern="^-?(?:[0-9](?:\.5)?|10)$"  step="0.5" max="10" name="SK1'.$c.'" value="-1"></td>';
                        }
                        else{
                          echo '<td><b><center>'.$SK_1.'</center><b/></td>';
                        }
                        $SK_2   = $res['SK_2'];
                        if ($SK_2 == -1)
                        {
                          echo '<td><input type="number" min="-1" pattern="^-?(?:[0-9](?:\.5)?|10)$"  step="0.5" max="10" name="SK2'.$c.'" value="-1"></td>';
                        }
                        else{
                          echo '<td><b><center>'.$SK_2.'</center><b/></td>';
                        }
                      }
                      echo '</tr>';
            }
            echo '</tbody>
          </table>
          <div class="form-group">
          <label class="col-md-12 control-label" for=""></label>
          <div class="col-md-12"> 
            <input  type="submit" onclick="Mysuccess()" style="margin-left:40%" class="btn btn-primary" value="Submit" name="" class="btn btn-primary"/>
            <input  type="submit" onclick="MyUpdate()" style="margin-top:-2.8%;margin-left:55%;color:#FFFFFF;;background:darkgreen;font-size:15px;padding:7px;padding-left:10px;padding-right:10px" class="btn" value="Update" name="result-update" class="btn btn-primary"/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form></div>
<script>
function Mysuccess(){
  Swal.fire({
    icon: "warning",
    title: "Are You Sure Want to Submit",
    text: "Check Once Again!",
    footer: "Any Problem Contact @Admin!"
  })
}
function MyUpdate(){
  Swal.fire({
    icon: "success",
    title: "Updated Successfully",
    text: "Be Sure Before Updation!!",
    footer: "Any Problem Contact @Admin!"
  })
}
</script>';

}
if (@$_GET['y'] == 2 && !(@$_GET['Step'])) {
    echo '<div class="right_col" role="main">
<div class="row">
<span class="title1" style="margin-left:35%;font-size:30px;"><b>Enter Participant Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="Judge_Score.php?y=Score_Participants"  method="POST">
<fieldset>
<center>
  <select id="selUser" style="width: 200px;" name="university_name" required="required">
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
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>
</fieldset>
</form></div>
</div></div>
<script>
window.onload = function AlertFunction() {
var c = location.search.split("uploaded")[1];
if (c == "=True"){ 
  Swal.fire({
    icon: "warning",
    title: "Are You Sure to Submit!!",
    text: "Check Score Once Again!!",
    footer: "Any Problem Contact @Admin!"
  }) 
}
</script>';
}
if (@$_GET['y'] > 3){
  echo '<div class="right_col" role="main">
  <b>Shit....What You are looking would not be there here...</b></div>';
  
}
?>
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
    <script src="js/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
</html>
