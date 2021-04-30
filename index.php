<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>My Online Shop</title>
	<link rel="stylesheet" type="text/css" href="styling.css" media="all"/>
</head>
<body>
	<!--Menubar starts here-->
	<div class="menu-bar">
		<div class="logo">
			<img src="images/Logo.jpg" width="150" height="100">
		</div>
		<div class="menu">
			<ul>
				<li><a class="active" href="#">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Services</a></li>
				<li><a href="#">Contact</a></li>
				<li><a href="#">Buy Listings</a></li>
			</ul>
		</div>
		<div class="search-box">
			<input type="text" class="tbox" placeholder="Search..">
			<button class="btn">Search</button>
		</div>
		
	</div>
	<!--Menubar ends here-->
	<div class="banner">
		<img src="images/banner.png" width="1200" height="660">
	</div>

	
<div class="left">
	<div class="table">
		<fieldset class="category">
			<legend><h3>CATEGORY</h3></legend>
			<table class="categorytable">
				<?php 
				   $conn = mysqli_connect("localhost","root","","ecommerce");
				        if($conn-> connect_error){
				        	die("Connection failed: ". $conn-> connect_error);
				        }
				   $sql = "SELECT cat_id, cat_title from category";
				   $result =$conn->query($sql);

				        if($result-> num_rows > 0){
				        	while($row=$result->fetch_assoc()){
				        		$cat_title=$row['cat_title'];
				        		echo "<tr><td><a href>{$cat_title}</a></tr></td>";
				        	}
				        }
				        else{
				        	echo "0 result";
				        }
				        $conn->close();
				?>
			</table>
		</fieldset>
        <br>
		<fieldset class="brands">
			<legend><h3>BRANDS</h3></legend>
			<table class="brandstable">
				<?php 
				   $conn = mysqli_connect("localhost","root","","ecommerce");
				        if($conn-> connect_error){
				        	die("Connection failed: ". $conn-> connect_error);
				        }
				   $sql = "SELECT brand_id, brand_title from brands";
				   $result =$conn->query($sql);

				        if($result-> num_rows > 0){
				        	while($row=$result->fetch_assoc()){
				        		$brand_title=$row['brand_title'];
				        		echo "<tr><td><a href>{$brand_title}</a></tr></td>";
				        	}
				        }
				        else{
				        	echo "0 result";
				        }
				        $conn->close();
				?>
			</table>
		</fieldset>
        <form method="post" action="index.php">
		<div class="buttons">
			<button type="submit" name="Logout">Logout</button>
			<button type="submit" name="Reset_Password">Reset Password</button>
	    </div>
	</form>
</div>       
        <table class="activitylogtable" style="height:90%;">

			<tr>
			    <th><h2><u>ACTIVITY LOG</u></h2></th>
			</tr>

			<?php
			$conn = mysqli_connect("localhost", "root", "", "registration"); //Database name 
			    if ($conn-> connect_error){
			        die("Connection failed:". $conn-> connect_error);
			    }

			$sql = "SELECT * from activity_lag"; //Table Category Name
			$result = $conn-> query($sql);

			    if ($result-> num_rows > 0){
			        while ($row = $result-> fetch_assoc()){

			                $Username = $row['Username']; 
			                $Activity = $row['Activity'];
			                $Time = $row['Time'];
			                $Date = $row['Date'];
								echo "<tr><td>{$Username}</td>
									<td>{$Activity}</td>
									<td>{$Time}</td>
									<td>{$Date}</td></tr>";
			        }
			    }
			    
			    else {
			        echo "0 result";
			    }

			    $conn-> close();
			    
			?>
        </table>
	</div>
	

</body>