<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['PatrolID']);
      $mypassword = mysqli_real_escape_string($db,$_POST['Password']); 
      
      $sql = "SELECT PatrolID, Password FROM users WHERE PatrolID = '$myusername' and Password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
    <script src="https://use.typekit.net/ayg4pcz.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
	<link rel="stylesheet" href="css/style.css">
    <div class="container">
    <center><h1 class="welcome text-center">Welcome to <br> Student Patrol</h1></center>
        <div class="card card-container">
        <h2 class='login_title text-center'>Login</h2>
        <hr>

            <form action = "" method = "post" class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <p class="input_title">Patrol ID</p>
                <input type="text" id="inputEmail" class="login_box" name = "PatrolID" placeholder="Patrol ID" required autofocus>
                <p class="input_title">Password</p>
                <input type="password" id="inputPassword" class="login_box" name = "Password" placeholder="" required>
                <div id="remember" class="checkbox">
                    <label>
                        
                    </label>
                </div>
                <button class="btn btn-lg btn-primary" type="submit" value="submit">Login</button>
            </form>
			<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->