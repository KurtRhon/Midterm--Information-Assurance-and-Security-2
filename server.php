<script type="text/javascript">

function customAlert(m,func){
  var d=document, 
      c=d.createElement('div'),
      e=d.createElement('div'), 
      f=d.createElement('div'),
      a=d.createElement('button');
      c.style.cssText = 'background: rgba(41,42,45);color:#9aa0a6;width:400px;height:120px;position:absolute;z-index:999;top:0%;left:35%;font:13px Malgun Gothic;';
      e.style.cssText = 'background:rgba(41,42,45);padding-top:20px;padding-left:20px;color:white;font:14px Malgun Gothic;';
      f.style.cssText = 'text-align:left;padding-left:20px;padding-top:10px;';
      a.style.cssText = 'color:black;background:#799dd7;display:block;margin:0 auto;position:absolute; right:5%;top:60%;height:30px;width:60px;border: 1px;border-radius:5px;';
      a.innerText = 'OKAY';
      a.onclick = function(){
        d.body.removeChild(c);
        func();
      }
      e.innerHTML = '<b><center> Kurt realty Inc. </center></b>';
      f.innerHTML = m;
      c.appendChild(e);
      c.appendChild(f);
      c.appendChild(a);
      d.body.appendChild(c);
      return false;
}
</script>
<button style="opacity: 0;" id="alertcodeinvalid" onclick="customAlert(' Your code has been expired!',function(){

                  location.href='login.php';

            })"></button>
<button style="opacity: 0;" id="passchange" onclick="customAlert('Password successfully changed',function(){

                  location.href='index.php';

            })"></button>


<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($_POST['email'])){
			 array_push($errors, "Email is required"); 
		} 
        elseif (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {   // check if e-mail address syntax is valid
		       
		        array_push($errors, "You Entered An Invalid Email Format");
	    }
	    
	    //Password validation
		if (empty($password_1)) { 
			array_push($errors, "Password is required"); 
	    }
	    elseif (strlen($_POST['password_1']) <= '8') {
	    	array_push($errors, "Your Password Must Contain At Least 8 Characters!");
	    }
	    elseif(!preg_match("#[0-9]+#",$password_1)) {
	    	array_push($errors, "Your Password Must Contain At Least 1 Number!");
	    }
	    elseif(!preg_match("#[A-Z]+#",$password_1)) {
	    	array_push($errors, "Your Password Must Contain At Least 1 Capital Letter!");
	    }
	    elseif(!preg_match("#[a-z]+#",$password_1)) {
	    	array_push($errors, "Your Password Must Contain At Least 1 Lowercase Letter!");
	    }
	    elseif(!preg_match('/[^a-z0-9 _]+/i',$password_1)) {
	    	array_push($errors, "Your Password Must Contain At Least 1 Special Character!");
	    }
		elseif ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			//$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password) 
					  VALUES('$username', '$email', '$password_1')";
			mysqli_query($db, $query); 

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		date_default_timezone_set('Asia/Taipei');
        $time = date("h:i:s");     
        $currentDate = strtotime($time);
        $expireDate = date('Y-m-d H:i:s', strtotime("+1 day"));
        $futureDate = $currentDate+(10);                
        $formatDate = date("Y-m-d", $futureDate);
        $user_id = $_POST['username'];

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			
			$query1 = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query1);

			if (mysqli_num_rows($results) == 1) {
				$code = rand(100000,999999);
				$date = date("Y-m-d H:i:s");
				$cenvertedTime = date('Y-m-d H:i:s',strtotime('+7 hour +5 minutes',strtotime($date)));


				$query2 = "INSERT INTO authentication (user_id, code, created_at, expiration) VALUES('$username', '$code', now(),'$cenvertedTime')";
			    mysqli_query($db, $query2); 
				
				$message = "LOGIN";
                $query3 = "INSERT INTO activity_lag (Username, Activity, Time, Date) VALUES ('$user_id','$message','$time','$formatDate')";
                mysqli_query($db, $query3);

				$_SESSION['username'] = $username; 
				$_SESSION['success'] = $code;
				header('location: code.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
	//LOGOUT
	if (isset($_POST['Logout'])) {
	

		date_default_timezone_set('Asia/Taipei');
       $time = date("h:i:s");    
       $currentDate = strtotime($time);
       $futureDate = $currentDate+(10);                
       $formatDate = date("Y-m-d", $futureDate);
       $user_id = $_POST['username']??"kurt";
       $message2 = "LOGOUT";

          $query = "INSERT INTO activity_lag (Username,`Activity`,`Time`,`Date`) VALUES ('$user_id','$message2','$time','$formatDate')";
          $result = mysqli_query($db,$query);
			
				header('location: login.php');
			

	}

	// submit authentication code
	if (isset($_POST['Submit'])) {
		
        $code = mysqli_real_escape_string($db, $_POST['code']);
       
		if (empty($code)) {
			array_push($errors, "Please enter the code");
		}
		if (count($errors) == 0) {
			
			$query = "SELECT created_at, expiration FROM authentication WHERE code='$code'";
		    $results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {

				if ($results->num_rows > 0) {
					  // output data of each row
					  while($row = $results->fetch_assoc()) {
					  	$created = $row['created_at'];
					  	$expiration = $row['expiration']; 

					  	$date = date("Y-m-d H:i:s");
				        $cenvertedTime = date('Y-m-d H:i:s',strtotime('+7 hour',strtotime($date)));


					  	if($cenvertedTime < $expiration){
					  		$_SESSION['username'] = $username;
							$_SESSION['success'] = "Login successfully";
							header('location: index.php');
					  	}else{
					  		echo "<script type='text/javascript'>document.getElementById('alertcodeinvalid').click(); </script>";
					  	}	    
						
					  }
				} else {
				  echo "0 results";
				}
				$db->close();
				
				
			}else {
				array_push($errors, "Wrong Code combination");
			}
		}
		
	}



	// REGISTER USER
	if (isset($_POST['reset_pass'])) {

		  date_default_timezone_set('Asia/Taipei');
		  $time = date("h:i:s");    
		  $currentDate = strtotime($time);
		  $futureDate = $currentDate+(10);                
		  $formatDate = date("Y-m-d", $futureDate);
		

		// receive all input values from the form
		$user_id = mysqli_real_escape_string($db, $_POST['username']);
		//$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($user_id )) {
		    array_push($errors, "Username is required");
	    }
		if (empty($_POST['password_2'])){
			 array_push($errors, "Old password is required"); 
		} 	    
	    //Password validation
		if (empty($password_1)) { 
			array_push($errors, "Enter your new password"); 
	    }
	    elseif (strlen($_POST['password_1']) <= '8') {
	    	array_push($errors, "Your Password Must Contain At Least 8 Characters!");
	    }
	    elseif(!preg_match("#[0-9]+#",$password_1)) {
	    	array_push($errors, "Your Password Must Contain At Least 1 Number!");
	    }
	    elseif(!preg_match("#[A-Z]+#",$password_1)) {
	    	array_push($errors, "Your Password Must Contain At Least 1 Capital Letter!");
	    }
	    elseif(!preg_match("#[a-z]+#",$password_1)) {
	    	array_push($errors, "Your Password Must Contain At Least 1 Lowercase Letter!");
	    }
	    elseif(!preg_match('/[^a-z0-9 _]+/i',$password_1)) {
	    	array_push($errors, "Your Password Must Contain At Least 1 Special Character!");
	    }
		elseif ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {

			$message = "PASSWORD CHANGED";
            $query = "INSERT INTO activity_lag (Username,`Activity`,`Time`,`Date`) VALUES ('$user_id','$message','$time','$formatDate')";
            $result = mysqli_query($db,$query);

            $updatesql = "UPDATE users set password ='" . $_POST["password_2"] . "' WHERE username='" . $user_id . "'";
            $result2 = mysqli_query($db,$updatesql);
			
		    echo "<script type='text/javascript'>document.getElementById('passchange').click(); </script>";

			//header('location: index.php');
		}

	}

	if (isset($_POST['Reset_Password'])) {

        header('location: resetpassword.php');

	}

?>