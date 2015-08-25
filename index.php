<?php
/* changed your if block that writes to csv to function then used your redirect if block to run function */
$raw_file = 'registration.csv';
$message = '';
// $errors = array();
$firstname = $lastname = $email = $phone = $dob = $favoritebrand = $username = $password = "";
if(isset($_POST['george'])){
	$submitted = true;
	// echo "checking errors";
	//check to see if first name exists
	if(empty($_POST['first_name'])){
		$errors['first_name']="First name is required";
	} else {
		$firstname = checkData($_POST["first_name"]);
	} 
	if(empty($_POST['last_name'])){
		$errors['last_name']="Last name is required";
	} else {
		$lastname = checkData($_POST["last_name"]);
	}
	if(empty($_POST["email_address"])){
		$errors['email_address'] = "Email is required";
	} else {
		$email = checkEmail($_POST["email_address"]);
	}
	if(empty($_POST['phone'])){
		$errors['phone']="Phone number is required";
	} else {
		$phone = checkData($_POST["phone"]);
	}
	if(empty($_POST['dob'])){
		$errors['dob']="Date of Birth is required";
	} else {
		$dob = checkData($_POST["dob"]);
	}
	if(empty($_POST['favorite_brand'])){
		$errors['favorite_brand']="Favorite brand is required";
	} else {
		$favoritebrand = checkData($_POST["favorite_brand"]);
	}
	if(empty($_POST['username'])){
		$errors['username']="Username is required";
	} else {
		$username = checkData($_POST["username"]);
	}
	if(empty($_POST['password'])){
		$errors['password']="Password is required";
	} else {
		$password = checkData($_POST["password"]);
	}
	$firstname = checkData($_POST["first_name"]);
	$lastname = checkData($_POST["last_name"]);
	$email = checkEmail($_POST["email_address"]);
	$phone = checkData($_POST["phone"]);
	$dob = checkData($_POST["dob"]);
	$favoritebrand = checkData($_POST["favorite_brand"]);
	$username = checkData($_POST["username"]);
	$password = checkData($_POST["password"]);
  //if valid then redirect
	//changed here too -- added the errors thing and then run writeEntry function if there are not errors
if($submitted && empty($errors)){
   header('Location: confirmation.php');
   // exit();
   writeEntry();
 }
}
function checkData($string){
	$string = trim($string);
	$string = stripcslashes($string);
	$string = htmlspecialchars($string);
	return $string;
	
}
function checkEmail($email){
	global $errors;
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	 $errors['email_address'] = "Invalid email format"; 
	}
	return checkData($email);
}
function checkError($fieldname){
	global $errors;
	if(isset($errors) && isset($errors[$fieldname])){
		return "<div class='error'>".$errors[$fieldname]."</div>";
	} 
	
}
//turned this into a function -- you have plenty of if statements
function writeEntry(){
//if(isset($_POST['submitted'])) {
	global $raw_file;
	$new_line = "\n";
	$new_line .= $_POST['first_name'];
	$new_line .= ",";
	$new_line .= $_POST['last_name'];
	$new_line .= ",";
	$new_line .= $_POST['email_address'];
	$new_line .= ",";
	$new_line .= $_POST['phone'];
	$new_line .= ",";
	$new_line .= $_POST['dob'];
	$new_line .= ",";
	$new_line .= $_POST['favorite_brand'];
	$new_line .= ",";
	$new_line .= $_POST['cigar_strength'];
	$new_line .= ",";
	$new_line .= $_POST['username'];
	$new_line .= ",";
	$new_line .= $_POST['password'];
	// $new_line .= ",";
	file_put_contents($raw_file, $new_line, FILE_APPEND);
}
$file = file_get_contents($raw_file);
$details = str_getcsv($file, "\n");
array_splice($details, 0, 1);
// print_r($_POST);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Club Application</title>
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/mystyle.css">
		<script>
		window.onload = function() {
			document.register.first_name.focus();
		}
		</script>
	</head>
<body>
	<div id="container">
		<div class="reg_form" class="registration">
			<form name="register" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" >
				<h1>Give Us Your Details</h1>
				<input type="hidden" name="george">
				<span class="message"><?php echo $message; ?></span>
				<input type="text" name="first_name" value="<?php echo $firstname;?>" placeholder="First Name*" /><?php echo checkError("first_name"); ?>
				<input type="text" name="last_name" value="<?php echo $lastname;?>" placeholder="Last Name*"/><?php echo checkError("last_name"); ?>
				<input type="text" name="email_address" value="<?php echo $email;?>"  placeholder="Email*"/><?php echo checkError("email_address"); ?>
				<input type="text" name="phone" value="<?php echo $phone;?>"  placeholder="Phone Number*"/><?php echo checkError("phone"); ?>
				<input placeholder="Date Of Birth" name="dob" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date"><?php echo checkError("dob"); ?>
				<input type="text" name="favorite_brand" value="<?php echo $favoritebrand;?>"  placeholder="Favorite Brand*"/><?php echo checkError("favorite_brand"); ?>
				<div id="selectpicker">
					<select name="cigar_strength">
						<option value="Preferred Cigar Strength">Preferred Cigar Strength</option>
						<option value="Mild">Mild</option>
						<option value="Mild-Medium">Mild-Medium</option>
						<option value="Medium">Medium</option>
						<option value="Medium-Full">Medium-Full</option>
						<option value="Full">Full</option>
					</select>
				</div>
				<input type="text" name="username" value="<?php echo $username;?>"  placeholder="User Name*"/><?php echo checkError("username"); ?>
				<input type="text" name="password" value="<?php echo $password;?>"  placeholder="Password*"/><?php echo checkError("password"); ?>
				<input class="submit" type="submit" name="create_account" />
		</div>
	</div>
	
</body>	
</html>
