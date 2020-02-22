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
<div class="container">
<div class="row">
<div class="col-md-4 col-sm-offset-2 col-sm-6">
<h1 class="text-center">EFLAS</h1>
</div>

<h1 class="text-center">Emergency Flight Lander Assistant System</h1>
<form method="POST" class="form-container">
    <table class="table table-borderless" >
    <tr>
        <td>User Name</td>
        <td><input type="text" name="name" class="inpt"></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="password" name="pass" class="inpt"></td>
    </tr>
    <tr>
    <td>
        <!-- <a href="#"><div class="btn btn-danger" name="but">Login</div></a> -->
    <Button class="btn btn-outline-success btn-block" type="submit" name="but">Login</Button>
    
    </td>
    </tr>
    <tr>
        <td>
            <div><p class="text-center">Not a Member? <a href="reg.php">Register</a></p></div>
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
    $use=$_POST["name"];
    $pass=$_POST["pass"];
    $server="localhost";
    $dbusername="root";
    $password="";
    $dbname="satelliteImg";
    $con=new mysqli($server,$dbusername,$password,$dbname);
    $sql="SELECT `id`,`name`, `address`, `phone`, `gender`, `pin` FROM `register` WHERE `username`='$use' and `Password`='$pass'";
    $result= $con->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $id=$row["id"];
             $name=$row["name"];
             $roll=$row["address"];
             $admno=$row["phone"];
             $coll=$row["gender"];
             $pin=$row["pin"];
             $_SESSION['userid']=$id;
             $_SESSION['name']=$name;

            // echo "<table class='table'><tr><td>Name :</td><td>$name</td></tr>
            // <tr><td>Roll no :</td><td>$roll</td></tr></tr>
            // <tr><td>Admission no :</td><td>$admno</td></tr>
            // <tr><td>College :</td><td>$coll</td></tr>
            // </table>";
            header('Location:welcome.php');
     }
    }
    else{
        echo "<script type='text/javascript'>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
          })
        </script>";;
    }
}
?>