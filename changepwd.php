<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="js/bootstrap.js">
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
<div class="container">
<div class="row">
<form method="POST" class="form-container">
    <table class="table table-borderless" >
    <tr>
        <td>Current Password</td>
        <td><input type="password" name="cpass" class="inpt"></td>
    </tr>
    <tr>
        <td>New Password</td>
        <td><input type="password" name="npass" class="inpt"></td>
    </tr>
    <tr>
        <td>Confirm New Password</td>
        <td><input type="password" name="cnpass" class="inpt"></td>
    </tr>
    <tr>
    <td>
    <Button class="btn btn btn-outline-light btn-block" type="submit" name="but">Change</Button>
    
    </td>
    </tr>

    </table>
</form>

</div>
</div>
</body>
</html>
<?php
      session_start();

if(isset($_POST["but"])){

    $cpwd=$_POST['cpass'];
    $npwd=$_POST['npass'];
    $cnpwd=$_POST['cnpass'];
     if($npwd == $cnpwd){
        $ids=$_SESSION['userid'];
        $server="localhost";
        $dbusername="root";
        $password="";
        $dbname="satelliteImg";
        $con=new mysqli($server,$dbusername,$password,$dbname);
        $sql="SELECT `Password` FROM `register` WHERE id=$ids";
        $result= $con->query($sql);
        if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $pass=$row["Password"];
            if($pass == $cpwd){
             $sqls="UPDATE `register` SET `Password`='$npwd' WHERE id=$ids";
             $resu=$con->query($sqls);
             if($resu===TRUE){
              echo "<script>alert('Password Changed Successfully')</script>";
             }
             else{
              echo "<script>alert('Error inUpdation')</script>".$con->error;
             }
             
            }
            else{
              echo "<script>alert('Enter Current Password Correctly ')</script>";
            }
        }
      }
    }

}
?>
