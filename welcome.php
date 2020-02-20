<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="stylewel.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<nav class="navbar navbar-expand-sm bg-primary navbar-dark justify-content-center sticky-top">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="welcome.php">Check Image</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="userprofile.php">User Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="changepwd.php">Change Password</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.php">Logout</a>
    </li>
    
  </ul>
</nav>


<?php
session_start();

if(!isset($_SESSION['name']))
{

header('Location:index.php');


}
else{
   echo "Welcome            ". $_SESSION['name'];
}



?> 
<!-- <form method="POST" enctype="multipart/form-data" class="form-container"> -->
<!-- <table class="table table-borderless" >
     <tr>
    <td>Welcome User</td>
    </tr> -->
    <!-- <tr>
        <td>Upload</td>
        <td><input type="file" name="upload"></td>
    </tr>
    <br>
    <tr>
        <td>
        <button class="btn btn-danger" type="submit" name="sub">Submit</button>
        </td>
    </tr> -->
 <!-- </table> --> 
 <form class="md-form" method="POST" enctype="multipart/form-data">
  <div class="file-field">
    <div class="z-depth-1-half mb-4">
      <img src="upload.png" class="center"
        alt="example placeholder">
    </div>
    <div class="d-flex justify-content-center">
      <div class="btn btn-mdb-color btn-rounded float-left" >
        <span>Choose file</span>
        <input type="file" name="upload">
      </div>
      <div>
      <button class="btn btn-danger" type="submit" name="sub">Submit</button>
      </div>
    </div>
  </div>
</form>
</body>
</html>

<?php

if(isset($_POST['sub'])){
$target="/opt/lampp/htdocs/log/uploads/";
$targetfile=$target.basename($_FILES["upload"]["name"]);
if(move_uploaded_file($_FILES["upload"]["tmp_name"],$targetfile))
{
  echo "<script>alert('Succerssfully Uploaded')</script>";
}
else{
  echo "<script>alert('Error in uploaded')</script>";
}
}
?>