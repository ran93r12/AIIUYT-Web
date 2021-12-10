<?php

session_start();
// error_reporting(0); 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location:Judge.php?y=1");
    exit;
}
require_once "config/db_connection.php";

if (isset($_POST['login'])){
  $username = $password = "";
  $username_err = $password_err = "";
  if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, username, password FROM Judge_login WHERE username = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                          $Query = mysqli_query($con,"SELECT * FROM Judge_login WHERE username = '$username'");
                          while($row = mysqli_fetch_array($Query)){
                            $role = $row['role'];
                          }
                          switch($role){

                            case 'Judge':
                            session_start();
                            if (isset($_SESSION['username'])) {
                                session_unset();
                            }
                            $_SESSION['loggedin'] = true;
                            $_SESSION["keys_log"]  = '$2y$10$Reg6.CaUJVu0pmahdlyY3uqX01XeSLQCwvOP32IEC/nvR2L/MHmL.';
                            $_SESSION["role"]     = 'Judge';
                            $_SESSION["username"] = $username;
                            header("location:Judge.php?y=1");                      
                            break;
                            case 'Chief_Judge_Admin':
                            session_start();
                            if (isset($_SESSION['username'])) {
                                session_unset();
                            }
                            $_SESSION['loggedin'] = true;
                            $_SESSION["keys_log"]  = '$2y$10$vCygzhFUFu.jtM5FC7qDT.ib.4KSMurmMfCk.vORtVliM5ODTE2Rm';
                            $_SESSION["role"]     = 'Chief_Judge_Admin';
                            $_SESSION["username"] = $username;
                            header("location:ChiefReferee.php?y=1");
                            break;
                            case 'StudentAdmin':
                            session_start();
                            if (isset($_SESSION['username'])) {
                                session_unset();
                            }
                            $_SESSION['loggedin'] = true;
                            $_SESSION["keys_log"]  = '$2y$10$Jie9cW1tl1vKaUcXQ1A3Zuxs653F1Y/A8ceElgEQ8SgZ9HNCWc5N.';
                            $_SESSION["role"]     = 'StudentAdmin';
                            $_SESSION["username"] = $username;
                            header("location:Student.php?y=1");
                            break;

                            default: break;
                          }
                                                   
                        } else{
                            echo '<div id="note">The password you entered was not valid.<a id="close">[close]</a></div>';
                        }
                    }
                } else{
                    echo '<div id="note">No account found with that username.<a id="close">[close]</a></div>';
                }
            } else{
                echo '<div id="note">Oops! Something went wrong. Please try again later.<a id="close">[close]</a></div>';
            }
        }       
      mysqli_stmt_close($stmt);
    }
    mysqli_close($con);
  }
}
elseif(isset($_POST['signup'])){
  if(isset($_POST['uid_username']) && isset($_POST['uid_password']) && isset($_POST['uid_confirm_password'])){
    $username=mysqli_real_escape_string($con,$_POST['uid_username']);
    $password=mysqli_real_escape_string($con,$_POST['uid_password']);
    $confirm_password=mysqli_real_escape_string($con,$_POST['uid_confirm_password']);
    $role = 'Judge';
    $user_role_id = 2;
    $sql = "SELECT id FROM Judge_login WHERE username = '$username'";
    $res = mysqli_query($con, $sql);
    if(mysqli_num_rows($res)>=1){
      echo '<div id="note">The username is already taken.<a id="close">[close]</a></div>';
    }
    else{
       if ($password != $confirm_password){
        echo '<div id="note">Passwords Did not match...<a id="close">[close]</a></div>';
      }
      else{
        $sql = "INSERT INTO Judge_login (username, password, role, user_role_id) VALUES (?, ?, ?, ?)";         
        if($stmt = mysqli_prepare($con, $sql)){
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password,$role,$user_role_id);
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            if(mysqli_stmt_execute($stmt)){
                echo '<div id="note">Account Created Succesfully.<a id="close">[close]</a></div>';
            } else{
                echo '<div id="note">OOPS!! Something went wrong :(<a id="close">[close]</a></div>';
            }
            mysqli_stmt_close($stmt);
          }
        }
      }
    mysqli_close($con);  
  } 
}
?>
<html>
<head>
	<link href="css/login.css" rel="stylesheet">
	<script src="js/modernizr.custom.80028.js"></script>
  	<!-- <link rel='stylesheet' href='js/style.css'> -->
	<style>
    #note {
        position: absolute;
        z-index: 6001;
        top: 0;
        left: 0;
        right: 0;
        background: #FF6347;
        text-align: center;
        line-height: 2.5;
        overflow: hidden; 
        -webkit-box-shadow: 0 0 5px black;
        -moz-box-shadow:    0 0 5px black;
        box-shadow:         0 0 5px black;
      }
      .cssanimations.csstransforms #note {
          -webkit-transform: translateY(-50px);
          -webkit-animation: slideDown 2.5s 1.0s 1 ease forwards;
          -moz-transform:    translateY(-50px);
          -moz-animation:    slideDown 2.5s 1.0s 1 ease forwards;
      }

     /* #close {
        position: absolute;
        right: 10px;
        top: 9px;
        text-indent: -9999px;
        background: url(images/close.png);
        height: 16px;
        width: 16px;
        cursor: pointer;
      }*/
      .cssanimations.csstransforms #close {
        display: none;
      }
      
      @-webkit-keyframes slideDown {
          0%, 100% { -webkit-transform: translateY(-50px); }
          10%, 90% { -webkit-transform: translateY(0px); }
      }
      @-moz-keyframes slideDown {
          0%, 100% { -moz-transform: translateY(-50px); }
          10%, 90% { -moz-transform: translateY(0px); }
      }
    </style>
	<title>Login_Form</title>
</head>
<body>
<div class="login-wrap">
  <div class="login-html">
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
    <div class="login-form">
      <div class="sign-in-htm">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
          <div class="group">
            <label for="user" class="label">Username</label>
            <input id="user" type="text" class="input" name="username" required="required">
          </div>
          <div class="group">
            <label for="pass" class="label">Password</label>
            <input id="pass" type="password" class="input" data-type="password" name="password" required="required">
          </div>
          <div class="group">
            <input id="check" type="checkbox" class="check" checked>
            <label for="check"><span class="icon"></span> Keep me Signed in</label>
          </div>
          <div class="group">
            <input type="hidden" value="login" name="login">
            <input type="submit" class="button" value="Sign In" name="submit">
          </div>
          <div class="hr"></div>
          <div class="foot-lnk">
            <a href="#forgot">Forgot Password:: Contact Admin!</a>
          </div>
        </form>
      </div>
      <div class="sign-up-htm">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"> 
          <div class="group">
            <label for="user" class="label">Username</label>
            <input id="user" type="text" class="input" name="uid_username" required="required">
          </div>
          <div class="group">
            <label for="pass" class="label">Password</label>
            <input id="pass" type="password" class="input" data-type="password" name="uid_password" required="required">
          </div>
          <div class="group">
            <label for="pass" class="label">Repeat Password</label>
            <input id="pass" type="password" class="input" data-type="password" name="uid_confirm_password" required="required">
          </div>
          <div class="group">
            <input type="hidden" value="signup" name="signup">
            <input type="submit" class="button" value="Sign Up" name="submit">
          </div>
          <div class="hr"></div>
          <div class="foot-lnk">
            <label for="tab-1">Already Member?</a>
          </div>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
<script>
   close = document.getElementById("close");
   close.addEventListener('click', function() {
     note = document.getElementById("note");
     note.style.display = 'none';
   }, false);
</script>
</body>

</html>