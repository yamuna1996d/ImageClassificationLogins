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
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('.view').click(function(){
    $('.details').addClass('avtive')
  })
  $('.close').click(function(){
    $('.details').removeClass('avtive')
  })
})
</script>

<form method="GET" class="profile">
<img src="prd.jpg" class="profileimg"
        alt="example placeholder">
<a href="#" class="view">View profile</a>

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


            echo "<div class='details'>
            <table class='tableclass='table'>
            <tr><td>Name :</td><td>$names</td></tr>
            <tr><td>Address :</td><td>$addr</td></tr></tr>
            <tr><td>Phone no :</td><td>$phone</td></tr>
            <tr><td>Gender :</td><td>$gender</td></tr>
            <tr><td>Pin :</td><td>$pin</td></tr>
            </table>
            <div class='close'>
            
            </div>
            <img src='closes.png' class='close'
        alt='example placeholder'>
            </div>";
   
}
    }
}

?> 

</form>
</body>
</html>
