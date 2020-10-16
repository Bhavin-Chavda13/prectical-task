<?php
include("Databse/connection.php");

if(isset($_POST["upload"])) 
{
  $Name = $_POST['name'];
  $Email = $_POST['email'];
  $Mobile_no = $_POST['mobno']; 
  $Age = $_POST['age'];
  $Experience = $_POST['exp'];
  $Skills = $_POST['formskill'];
  $maxsize = 2048; // 200mb
  $name = $_FILES["file"]["fname"];
  $target_dir = "Resume/";

  $target_file = $target_dir. $_FILES["file"]["fname"]; 

// Select file type
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Valid file extensions
$file_extensions_arr = array('docx','doc','pdf');
// Check extension


if( !in_array($FileType,$file_extensions_arr ) )
{
    echo "Invalid file extension.";
}   
if (isset($_SESSION["filedone"])) 
{  
      // Check file size
      if(($_FILES["file"]["size"] >= $maxsize) || ($_FILES["file"]["size"] == 0)) 
      {
      echo "File too large. File must be less than 2MB.";
      }
     else
      {
      // Upload
              if( move_uploaded_file($_FILES["file"]["tmp_name"], $target_file) 
              {
              // Insert record
              $query = "INSERT INTO employee(Name,Mobileno,Email,Age,Skills,Resume ) VALUES('$Name','$Mobile_no','$Email','$Age','$Experience','$Skills','$target_file')";

              // echo $query;
                   $result = mysqli_query($conn,$query);
                    if($result)
                    {
                     echo "Upload successfully.";
                    
                    }  
              }
      }

      }

}

?>