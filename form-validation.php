<?php 
	$nameError="";
	$emailError="";
	$genderError="";
	$webError="";
	if (isset($_POST['Submit'])) {
		if (empty($_POST['name'])) {
			$nameError="Name is Required!";
		}else{
			$name=test_input($_POST['name']);
			
			if ( ! preg_match("/^[A-Za-z. ]*$/", $name)) {
				$nameError="Only Latter and space are allowed";
			}
		}
		if (empty($_POST['Email'])) {
			$emailError="Email is Required!";
		}else{
			$email=test_input($_POST['Email']);
			
			if ( ! preg_match("/[A-Za-z0-9.-_]{3,}@[A-Za-z0-9.-_]{3,}[.]{1}[A-Za-z0-9.-_]{2,}/", $email)) {
				$emailError="Email is not Valid";
			}
		}
		if (empty($_POST['Gender'])) {
			$genderError="Gender is Required!";
		}else{
			$gender=test_input($_POST['Gender']);
			
		}
		if (empty($_POST['Website'])) {
			$webError="Website is Required!";
		}else{
			$web=test_input($_POST['Website']);
			if (! preg_match("/(http:|https:|ftp)\/\/+[a-zA-Z0-9.\-\_\/\#\$\%\&\`\~\!\?]+\.[a-zA-Z0-9.\-\_\/\#\$\%\&\`\~\!\=\?]*/", $web)) {
				$webError="Invalid website address formet!";
			}
			
		}
		
	}



	function test_input($data){
		return $data;
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Form Validation</title>
	<style type="text/css">
		.one-half {
		    width: 50%;
		    float: left;
		    padding: 1% 0;
		}
		.one-half label, .full label {
		    width: 100%;
		    float: left;
		    font-size: 20px;
		    font-family: cambria;
		    padding: 1% 0;
		}
		.one-half input[type="text"] {
		    width: 90%;
		    float: left;
		    height: 30px;
		    font-size: 16px;
		    background-color: #dadada3d;
		    border: 1px solid #98969647;
		    padding: 0% 5px;
		}
		.full textarea{
			width: 95%;
		    float: left;
		    font-size: 16px;
		    background-color: #dadada3d;
		    border: 1px solid #98969647;
		    padding: 0% 5px;
		}
		.full input[type="Submit"] {
		    font-size: 20px;
		    padding: 1% 5%;
		    margin: 3% 35%;
		    cursor: pointer;
		    background: #24d46a;
		    border: 1px solid #bdaaaa;
		}
		.full input[type="Submit"]:hover{
			background: #ff5068;
		}
		body{
			width: 1150px;
			margin: 0 auto;
		}
		.heading-content {
		    text-align: center;
		}
		.heading-content h1{
		    margin: 5px;
		    color: #1cb128;
		}
		.heading-content legend{
		    padding: 5px;
		    color: #b50505;
		    font-weight: 600;
		}
		span{
			color: red;
		}
		.submit-info {
		    border: 1px solid #7b70702b;
		    padding: 0% 1.5%;
		    margin-bottom: 3%;
		    background: #c5c2be14;
		}
		.submit-info p {
		    font-size: 20px;
		}
		.alarm{
			color: red;
		}
		.footer {
			text-align: center;
			font-size: 20px;
			color: #1cb128;
			font-family: monospace;
		}
	</style>
</head>
<body>
	<div class="heading-content">
		<h1>Form of Validation</h1>
		<legend>*Please Fill up the form with correct information</legend>
	</div>
	
		<?php 
		 if (isset($_POST['Submit'])) {
		 	echo "<div class='submit-info'>";
				if (!empty($_POST['name']) && !empty($_POST['Email']) && !empty($_POST['Gender']) && !empty($_POST['Website'])) {
					if ((preg_match("/^[A-Za-z. ]*$/", $name)==true)&&(preg_match("/[A-Za-z0-9.-_]{3,}@[A-Za-z0-9.-_]{3,}[.]{1}[A-Za-z0-9.-_]{2,}/", $email)==true)&&(preg_match("/(http:|https:|ftp)\/\/+[a-zA-Z0-9.\-\_\/\#\$\%\&\`\~\!\?]+\.[a-zA-Z0-9.\-\_\/\#\$\%\&\`\~\!\=\?]*/", $web)==true)) {
						echo "<h2>Your information</h2><br>";
						echo "<p>Name: {$_POST['name']} <br> Email: {$_POST['Email']} <br> Gender: {$_POST['Gender']} <br> Website: {$_POST['Website']}<br> Comment: {$_POST['Comment']} <br></p>";
							
						$mailto='mr.mmr1998@gmail.com';
						$sub='contact form';
						$content="Name: " . $_POST['name'] . "Email: " . $_POST['Email'] . "Gender: " . $_POST['Gender'] . "Website: " . $_POST['Website'] . "Comment: " . $_POST['Comment'];
						$head='From:mr.mmr1998@gmail.com';
						if (mail($mailto, $sub, $content, $head)) {
							echo "<p class='alarm'>mail has been send sucessfully!</p>";
						}else{
							echo "<p class='alarm'>facing problem to send mail!</p>";
						}


					}else{
						echo "<p class='alarm'>Please Fill up the form with valid information</p>";
					}
			}else{
				echo "<p class='alarm'>Please Fill up all The *Required fields first and then hit the submit button!</p>";
			}
		}
		echo "</div>";
		?>
	
	<form action="form-validation.php" method="POST">
		<fieldset>
			<div class="one-half">
				<label>Name: <span>*<?php echo $nameError; ?></span></label>
					<input type="text" name="name"> 
				
			</div>
			<div class="one-half">
				<label>Email: <span>*<?php echo $emailError; ?></span></label>
					<input type="text" name="Email"> 
				
			</div>
			<div class="one-half">
				<label>Gender: <span>*<?php echo $genderError; ?></span></label>
					<input class="radio" type="radio" name="Gender" value="Male"> Male
					<input class="radio" type="radio" name="Gender" value="FeMale"> FeMale
				 
			</div>
			<div class="one-half">
				<label>Website: <span>*<?php echo $webError; ?></span></label>
					<input type="text" name="Website"> 
				
			</div>
			<div class="full">
				<label>Comment: </label>
					<textarea name="Comment" rows="5" cols="35"></textarea>
				
			</div>
			<div class="full">
				
					<input type="Submit" name="Submit" value="Submit information"> 
				
			</div>
		</fieldset>
	</form>
	<div class="footer"><h3>&copy; MMR1998<h3></div>
</body>
</html>