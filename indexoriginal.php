<?php 

$valid = true;

function validatestrings($str){
	global $valid;
	//convert possiblr malicious code to safe code
	$str=htmlspecialchars($str);
	//trim empty spaces start and end
	$str=trim($str);

	if (empty($str)){
		$valid = false;
	}
	return $str;
}

		

// print_r($_POST);
if ($_SERVER["REQUEST_METHOD"]=="POST"){
	$email=validatestrings($_POST["email"]);
	$first_name=validatestrings($_POST["first_name"]);
	$last_name=validatestrings($_POST["last_name"]);
	$address1=validatestrings($_POST["address1"]);
	$address2=validatestrings($_POST["address2"]);
	$city=validatestrings($_POST["city"]);
	$state=validatestrings($_POST["state"]);
	$zip_code=validatestrings($_POST["zip_code"]);
	$country=validatestrings($_POST["country"]);
	$phone=validatestrings($_POST["phone"]);
	$allow=validatestrings($_POST["allow"]);
	$style=validatestrings($_POST["style"]);
	$level=validatestrings($_POST["level"]);
	$color=validatestrings($_POST["color"]);
if ($valid){
	$new_line="\n";
	$new_line.="$email, $first_name, $last_name, $address1, $address2, $city, $state, $zip_code, $country, $phone, $allow, $style, $level, $color";

	file_put_contents("clubList.csv", $new_line, FILE_APPEND);
}
	
}
$file = file_get_contents("clubList.csv");
$quilt_rows = str_getcsv($file, "\n");
?>
<!DOCTYPE html>
<html>
	<head>
		<metacharset="utf-8" />
		<title>Form Block of the Month Aplication</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
		<link href="css/custom.css" rel="stylesheet" type="text/css" />	
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="span12">
				<main>
					<header>
					</header>
					<?php 
						if (!$valid){

							echo "<h3>Please check the information</h3>";
						}

					?>

						<form action="" method="POST">
							<fieldset id="personalinformation">
								<h2>Personal information</h2>
								<label>Email:</label>
									<input type="email" name="email" placeholder="Enter email" required="true" />
								<label>Can we email you back? 
									<input type="checkbox" class="large" name:"allow" value="yes" /></label>
								<label>First Name:</label>
									<input type="text" name="first_name" placeholder="Enter first name" required="true" />
								<label>Last Name:</label>
									<input type="text" name="last_name" placeholder="Enter last name" required="true" />
								<label>Address 1:</label>
									<input type="text" name="address1" placeholder="Enter address" required="true" />
								<label>Address 2:</label>
									<input type="text" name="address2" placeholder="Enter address" />
								<label>City:</label>
									<input type="text" name="city" placeholder="Enter your city" required="true" />
								<label>Select a State</label>
									<select name="state">
										<option value="AL">Alabama</option>
										<option value="AK">Alaska</option>
										<option value="AZ">Arizona</option>
										<option value="AR">Arkansas</option>
										<option value="CA">California</option>
										<option value="CO">Colorado</option>
										<option value="CT">Connecticut</option>
										<option value="DE">Delaware</option>
										<option value="DC">District Of Columbia</option>
										<option value="FL">Florida</option>
										<option value="GA">Georgia</option>
										<option value="HI">Hawaii</option>
										<option value="ID">Idaho</option>
										<option value="IL">Illinois</option>
										<option value="IN">Indiana</option>
										<option value="IA">Iowa</option>
										<option value="KS">Kansas</option>
										<option value="KY">Kentucky</option>
										<option value="LA">Louisiana</option>
										<option value="ME">Maine</option>
										<option value="MD">Maryland</option>
										<option value="MA">Massachusetts</option>
										<option value="MI">Michigan</option>
										<option value="MN">Minnesota</option>
										<option value="MS">Mississippi</option>
										<option value="MO">Missouri</option>
										<option value="MT">Montana</option>
										<option value="NE">Nebraska</option>
										<option value="NV">Nevada</option>
										<option value="NH">New Hampshire</option>
										<option value="NJ">New Jersey</option>
										<option value="NM">New Mexico</option>
										<option value="NY">New York</option>
										<option value="NC">North Carolina</option>
										<option value="ND">North Dakota</option>
										<option value="OH">Ohio</option>
										<option value="OK">Oklahoma</option>
										<option value="OR">Oregon</option>
										<option value="PA">Pennsylvania</option>
										<option value="RI">Rhode Island</option>
										<option value="SC">South Carolina</option>
										<option value="SD">South Dakota</option>
										<option value="TN">Tennessee</option>
										<option value="TX">Texas</option>
										<option value="UT">Utah</option>
										<option value="VT">Vermont</option>
										<option value="VA">Virginia</option>
										<option value="WA">Washington</option>
										<option value="WV">West Virginia</option>
										<option value="WI">Wisconsin</option>
										<option value="WY">Wyoming</option>
									</select>
								<label>Zip/Postal Code:</label>
									<input type="text" name="zip_code" placeholder="Enter Zip/Postal Code" required="true" />
								<label>Country:</label>
									<input type="text" name="country" placeholder="Enter Country" required="true" />
								<label>Daytime Phone:</label>
									<input type="text" name="phone" placeholder="Enter a daytime phone" required="true" />
								<label>This is a business address 
									<input type="checkbox" name:"allow" value="yes" /></label>
							</fieldset></br>
							<fieldset id="prefences">
							<h2>Preferences</h2>
							<label>style:</label>
								<input type="radio" name="style" value="traditional" checked>Traditional
								<input type="radio" name="style" value="modern" checked>Modern
							<label>Expertise level:</label>
								<input type="radio" name="level" value="newbie" checked>Newbie
								<input type="radio" name="level" value="skilled" checked>Skilled
								<input type="radio" name="level" value="advanced" checked>Advanced
							<label>Color scheme:</label>
								<input type="radio" name="color" value="prairie" checked>Prairie
								<input type="radio" name="color" value="mountain" checked>Mountain
								<input type="radio" name="color" value="sea" checked>Sea shore
							</fieldset><br>
								<input type="submit" class="checkoutButton" value="Sign In"/>
					</form>
					<div class="list">
						<table>
							<tr>
								<td>email</td>
								<td>first_name</td>
								<td>last_name</td>
								<td>address1</td>
								<td>address2</td>
								<td>city</td>
								<td>state</td>
								<td>zip_code</td>
								<td>country</td>
								<td>phone</td>
								<td>allow</td>
								<td>style</td>
								<td>level</td>
								<td>color</td>
							</tr>
							<?php
								// loop through all the rows
								foreach ($quilt_rows as  $row) {
									$parts = explode(',', $row);
									echo "<tr>";
									// loop thru each part
									foreach ($parts as $element) {
										echo "<td>".$element."</td>";
									}
									echo "</tr>";
								}
								?>
						</table>
					</div>
				</main>
			</div>
		</div>
	</body>
</html>