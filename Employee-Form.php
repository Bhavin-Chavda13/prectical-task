<?php
//define variables and set to empty values
$nameErr = $emailErr =   $phonErr = $ageErr = $expErr = "";
$name = $email = $phon =  $age = $exp="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }


  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["age"])) {
    $ageErr = "Age Required";
  } 
    
 if (empty($_POST["exp"])) {
    $expErr = "Experince is required";
  }
}// test_input function 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee-Form</title>
    <!-- Css Files -->
    <meta charset="utf-8">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Form.css">
</head>
<body>
     <div class="jumbotron">
        
     <p align="center" style="color: white;font-size: 40px;">Employee-Form</p>
     <form method="post" action="Employee-process.php" enctype="multipart/form-data">
        <input type="text" class="form-control" name="name" placeholder="Name" required="">
        <span class="error">* <?php echo $nameErr;?></span>
        <input type="text" class="form-control" name="mobno" placeholder="Mobile No" required="">
        <span class="error">* <?php echo $phonErr;?></span>
        <input type="email" class="form-control" name="email" placeholder="Email" required="">
        <span class="error">* <?php echo $emailErr;?></span>
        <input type="text" class="form-control" name="age" placeholder="Age" required="">
        <span class="error">* <?php echo $ageErr;?></span>
        <input type="text" class="form-control" name="exp" placeholder="Experience" required="">
        <span class="error">* <?php echo $expErr;?></span> 
        <select multiple="multiple" name="formskill">
            <option value="Php">Php</option>
            <option value="Php">java</option>
            <option value="Html">Html</option>
            <option value="css">css</option>
            <option value="Ajax">Ajax</option>
        </select>
        <input type="file" class="form-control" name="fname" value="" required="">
        <span class="error">*</span>
        <center><input type="submit" value="Upload" name="upload"></center>
    </form>
</div>
<script type="text/javascript">
  $(document).ready(function() {
        $('#ingredients').multiselect();
    });
</script>
</body>
</html>

 