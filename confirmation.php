<?php
$raw_file = 'registration.csv';

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
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Club Application</title>
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	</head>
<body>
<div class="lit-details">
		<h1>Thank you for creating an account, you will receive a confirmation email soon.</h1><br>
		<table>
			<tr>
				<td width="8%"><b>First Name</b></td>
				<td width="8%"><b>Last Name</b></td>
				<td width="18%"><b>Email Address</b></td>
				<td width="11%"><b>Phone Number</b></td>
				<td width="9%"><b>Date of Birth</b></td>
				<td width="11%"><b>Favorite Brand</b></td>
				<td width="12%"><b>Preferred Cigar Strength</b></td>
				<td width="12%"><b>Username</b></td>
				<td width="14%"><b>Password</b></td>
			</tr>
			<?php
			foreach ($details as $row) {
				$parts = explode(',', $row);
				echo "<tr>";
				foreach ($parts as $element) {
					echo "<td>".$element."</td>";
				}
				echo "</tr>";
			}
			?>
		</table>
	</div>
</body>
</html>