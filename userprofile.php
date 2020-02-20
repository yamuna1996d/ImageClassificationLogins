<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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

if(isset($_SESSION['userid'])){
    $ids=$_SESSION['userid'];
    $server="localhost";
    $dbusername="root";
    $password="";
    $dbname="satelliteImg";
    $con=new mysqli($server,$dbusername,$password,$dbname);
    $sql="SELECT `id`, `name`, `address`, `phone`, `gender`, `pin`, `district`, `username`, `Password` FROM `register` WHERE `id`=$ids";
    $result= $con->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $id=$row["id"];
            $names=$row["name"];
            $addr=$row["address"];
            $phone=$row["phone"];
            $gender=$row['gender'];
            $pin=$row['pin'];


            echo "<table class='tableclass='table table-borderless'><tr><td>Name :</td><td>$names</td></tr>
            <tr><td>Address :</td><td>$addr</td></tr></tr>
            <tr><td>Phone no :</td><td>$phone</td></tr>
            <tr><td>Gender :</td><td>$gender</td></tr>
            <tr><td>Pin :</td><td>$pin</td></tr>

            </table>";
   
}
    }
}

?> 

</body>
</html>
