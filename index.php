<?php 

$valid = true;

function validatestrings($str, $required = true){
  global $valid;
  //convert possiblr malicious code to safe code
  $str=htmlspecialchars($str);
  //trim empty spaces start and end
  $str=trim($str);

  if (empty($str) && $required){
    $valid = false;
  }
  return $str;
}

function check_box_value($str) {
  global $valid;
  if(empty($str)) {
    return "no";
  } elseif($str == "yes") {
    return $str;
  } else {
    $valid = false;
    return "";
  }
}


// print_r($_POST);
if ($_SERVER["REQUEST_METHOD"]=="POST"){
  $email=validatestrings($_POST["email"]);
  $allow_email=check_box_value(validatestrings($_POST["allow_email"], false));
  $first_name=validatestrings($_POST["first_name"]);
  $last_name=validatestrings($_POST["last_name"]);
  $address1=validatestrings($_POST["address1"]);
  $address2=validatestrings($_POST["address2"], false);
  $city=validatestrings($_POST["city"]);
  $state=validatestrings($_POST["state"]);
  $zip_code=validatestrings($_POST["zip_code"]);
  $country=validatestrings($_POST["country"]);
  $phone=validatestrings($_POST["phone"]);
  $is_biz_addr= check_box_value(validatestrings($_POST["is_biz_addr"], false));
  $style=validatestrings($_POST["style"]);
  $level=validatestrings($_POST["level"]);
  $color=validatestrings($_POST["color"]);
if ($valid){
  $new_line="\n";
  $new_line.="$email, $allow_email, $first_name, $last_name, $address1, $address2, $city, $state, $zip_code, $country, $phone, $is_biz_addr, $style, $level, $color";

  file_put_contents("clubList.csv", $new_line, FILE_APPEND);
}
  
}
$file = file_get_contents("clubList.csv");
$quilt_rows = str_getcsv($file, "\n");
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <main>
            <header>
            </header>
            <?php 
              if (!$valid){
                echo "<h3>Please check the information</h3>";
              }
            ?>
            <h1>Block of the month club</h1>
              <form action="" method="POST">
                <div class="col-md-6">
                  <div class="col-md-12">
                      <fieldset id="personalinformation">
                        <h2>Personal information</h2>

                        <div>
                          <label class="col-md-12">Email</label>
                          <input type="email" name="email" class="col-md-8 col-sm-8 col-lg-8" placeholder="Enter email" required="true" />
                        </div>

                        <div class="col-md-12">
                          <input type="checkbox" class="checkbox-inline large" name="allow_email" value="yes" />
                          <label >Please email me back</label>
                        </div>

                        <div >
                          <label class="col-md-12">First Name</label>
                          <input type="text" name="first_name" class="col-md-8 col-sm-8 col-lg-8" placeholder="Enter first name" required="true" />
                        </div>

                        <div>
                          <label class="col-md-12">Last Name</label>
                          <input type="text" name="last_name" class="col-md-8 col-sm-8 col-lg-8" placeholder="Enter last name" required="true" />
                        </div>
                      </fieldset>
                      
                    </div>
                  <div class="col-md-6">
                      <fieldset id="prefences">
                      <h2>Preferences</h2>
                      <label class="col-md-12" >Style</label>
                        <input type="radio" class="radio-inline" name="style" value="traditional" checked >Traditional
                        <input type="radio" class="radio-inline" name="style" value="modern" checked>Modern
                      </br>
                      <label class="col-md-12" >Expertise level</label>
                        <input type="radio" class="radio-inline" name="level" value="newbie" checked>Newbie
                        <input type="radio" class="radio-inline" name="level" value="skilled" checked>Skilled
                        <input type="radio" class="radio-inline" name="level" value="advanced" checked>Advanced
                      </br>
                      <label class="col-md-12" >Color scheme</label>
                        <input type="radio" class="radio-inline" name="color" value="prairie" checked>Prairie
                        <input type="radio" class="radio-inline" name="color" value="mountain" checked>Mountain
                        <input type="radio" class="radio-inline" name="color" value="sea" checked>Sea shore
                      </fieldset><br>
                  </div>
                </div>
                <fieldset id="adress" class="col-md-6-offset-0">
                  <div class="col-md-12">
                      <h2>Shipping Information</h2>
                       <div>
                        <label class="col-md-12" >Address 1</label>
                        <input type="text" name="address1" class="col-md-8 col-sm-8 col-lg-8" placeholder="Enter address" required="true" />
                      </div>

                      <div>
                        <label class="col-md-12">Address 2</label>
                        <input type="text" name="address2" class="col-md-8 col-sm-8 col-lg-8" placeholder="Enter address" />
                      </div>

                      <div>
                        <label class="col-md-12">City</label>
                        <input type="text" class="col-md-8 col-sm-8 col-lg-8" name="city" placeholder="Enter your city" required="true" />
                      </div>

                        <label class="col-md-12" >Select a State</label>
                      <div class="col-md-8 col-sm-8 col-lg-8 col-lg-8 col-sm-8">
                        <select class="form-control" name="state">
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
                      </div>

                      <div>
                        <label class="col-md-12" >Zip/Postal Code</label>
                          <input type="text" class="col-md-8 col-sm-8 col-lg-8" name="zip_code" placeholder="Enter Zip/Postal Code" required="true" />
                      </div>
                      <div>
                        <label class="col-md-12" >Country</label>
                        <input type="text" class="col-md-8 col-sm-8 col-lg-8" name="country" placeholder="Enter Country" required="true" />
                      </div>
                      <div>
                        <label class="col-md-12" >Daytime Phone</label>
                        <input type="text" class="col-md-8 col-sm-8 col-lg-8" name="phone" placeholder="Enter a daytime phone" required="true" />
                      </div>
                      <div class="col-md-12">
                        <input type="checkbox" class="checkbox-inline large" name="is_biz_addr" value="yes" />
                        <label>This is a business address</label>
                      </div>
                    </div>
                  </fieldset>
                  <div class="col-md-6">
                    <div class="col-md-8">
                      <input class="btn btn-large" type="submit" class="checkoutButton" value="Submit"/>
                    </div>
                  </div>
            </form>

            <div class="bs-example">
    <!-- Trigger Button HTML -->
    <input type="button" class="btn btn-primary" data-toggle="collapse" data-target="#toggleDemo" value="DATA">
    <!-- Collapsible Element HTML -->
    <div id="toggleDemo" class="collapse in">


            <div class="list col-lg-12 col-md-12">
              <table class="info">
                <tr>
                  <td>email</td>
                  <td>allow_email</td>
                  <td>first_name</td>
                  <td>last_name</td>
                  <td>address1</td>
                  <td>address2</td>
                  <td>city</td>
                  <td>state</td>
                  <td>zip_code</td>
                  <td>country</td>
                  <td>phone</td>
                  <td>is_biz_addr</td>
                  <td>style</td>
                  <td>level</td>
                  <td>color</td>
                </tr>
    </div>
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
    </div>
  </body>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>