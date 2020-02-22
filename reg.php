<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="js/bootstrap.js">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST">
    <table class="table table-borderless">
    <tr>
        <td>Name</td>
        <td><input type="text" name="name" class="inpt"></td>
    </tr>
    <tr>
        <td>Address</td>
        <td><input type="text" name="address" class="inpt"></td>
    </tr>
    <tr>
        <td>Email id</td>
        <td><input type="text" name="email" class="inpt"></td>
    </tr>
    <tr>
        <td>Phone </td>
        <td><input type="number" name="mobile" class="inpt"></td>
    </tr>
    <tr>
        <td>Gender</td>
        <td><input type="text" name="gender" class="inpt"></td>
    </tr>
    <tr>
        <td>Pin code</td>
        <td><input type="number" name="pin" class="inpt"></td>
    </tr>
    <tr>
        <td>District</td>
        <td><input type="text" name="dis" class="inpt"></td>
    </tr>
    <tr>
        <td>Username</td>
        <td><input type="text" name="user" class="inpt"></td>
    </tr>

    <tr>
        <td>Password</td>
        <td><input type="password" name="pass" class="inpt"></td>
    </tr>
    <tr>
        <td>Confirm Password</td>
        <td><input type="password" name="cpass" class="inpt"></td>
    </tr>
    <tr>
        <td>
        <center><button class="btn btn-info" name="sub">Register</button></center>
        </td>
    </tr>
    <tr>
        <td>
            <div><p class="text-center">Already Member? <a href="index.php">Login</a></p></div>
        </td>
    </tr>
    
    </table>
    
    </form>
</body>
</html>

<?php
if(isset($_POST["sub"])){
$n=$_POST["name"];
$a=$_POST["address"];
// $em=$_POST["email"];
$pl=$_POST["mobile"];
$gen=$_POST["gender"];
$pi=$_POST["pin"];
$dis=$_POST["dis"];
$u=$_POST["user"];
$pa=$_POST["pass"];
$cpa=$_POST["cpass"];
if($pa == $cpa){
    $server="localhost";
    $dbusername="root";
    $password="";
    $dbname="satelliteImg";
    $con=new mysqli($server,$dbusername,$password,$dbname);   
    $sql="INSERT INTO `register`(`name`, `address`, `phone`, `gender`, `pin`, `district`, `username`, `Password`) VALUES ('$n','$a',$pl,'$gen',$pi,'$dis','$u','$pa')";
    $result= $con->query($sql);
    if($result===TRUE){
     echo "<script type='text/javascript'>Swal.fire(
        'Successfully Registered!',
        'That thing is still around?',
        'success'
      )</script>";
    }
    else{
     echo "<script type='text/javascript'>
     Swal.fire({
         icon: 'error',
         title: 'Oops...',
         text: 'Something went wrong!',
       })
     </script>".$con->error;
    }
}
else{
    echo "<script type='text/javascript'>Swal.fire(
        'If the passwords are same?',
        'That thing is still around?',
        'question'
      )</script>";
}
}
?>