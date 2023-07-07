<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <title>Home</title>
    <?php include_once 'dependencies.php';

    ?>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  </head>
  <body>
<?php 
 require_once 'config.php';
 $carData="SELECT * FROM cars";
 $result = $dbc->query($carData);
  if (!isset($_SESSION['login_sess'])) {  
   header("Location: UserLogin.php");

}

 if(isset($_POST['bookCar'])){
  $avb="available";
$check=$_POST['Bstatus'];
  if(strtolower($avb) == strtolower($check)){
 
    $carid=$_POST['Bid'];
  $make=$_POST['Bmake'];
  $model=$_POST['Bmodel'];
  $rent=$_POST['Brent'];
  $img=$_POST['Bimage'];
  $status="Booked";
  $usermail= $_SESSION["login_email"];
  $selectuser="Select userid FROM userrecord WHERE email = '$usermail'";
  $res = mysqli_query($dbc,$selectuser);
  $row=mysqli_fetch_assoc($res);
  $userid=$row['userid'];
  $BookQuery="INSERT INTO bookings (make, model, rent, status, userid, image)
  VALUES ('$make','$model', '$rent', '$status', '$userid', '$img')";
 mysqli_query($dbc, $BookQuery);
 $updateStatus="UPDATE cars SET status = 'Booked' WHERE id = '$carid'";
  mysqli_query($dbc, $updateStatus);
header("location:home.php");}

else{
  echo "<script> alert('already booked!') </script>";
}
}
?>

    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo2">Ezy Rentals</label>
      <ul>
        <li><a class="active" href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="Bookings.php">Bookings</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="UserLogout.php">Logout</a></li>
      </ul>
    </nav>
    <div class="heading-style container" style="margin-bottom:20px;" >Vehicles<br><hr></div>
    <div class="container" style="margin-top:12px; margin-bottom: 20px;">
    <?php if($carData) {
	while ($row = $result->fetch_assoc()) {
    echo "<form action=home.php method=post>";
      echo  "<div class='card card-post' style='margin-bottom:20px; display: flex; flex: 1 1 auto; border:none;background-color: transparent; flex-direction: row; align-items: center; height: 300px;'>";
      echo  "<img src=" . $row["image"] . " style='width: 30%; height: 100%;border-bottom-right-radius: 5px; object-fit: cover;' class='card-img-top'/>";
      echo  "<div class'card-body' style='margin-left:50px; margin-bottom:20px'>";
      echo  "<h3 class='card-title' style='font-weight: bold;'>Manufacturer: " . $row['make'] . "</h3>";
      echo  "<h4 class='card-title' style=''>Model: " . $row['model'] . "</h4>";
      echo  "<h4 class='card-title' style=''>Rent: " . $row['rent'] . "$</h4>";
      echo  "<h4 class='card-title' style=''>Status: " . $row['status'] . "</h4>";    
      echo "<input type='hidden' name='Bid'  value=" . $row['id'] . "/>";
      echo "<input type='hidden' name='Bmake'  value=" . $row['make'] . "/>";
      echo "<input type='hidden' name='Bmodel'  value=" . $row['model'] . "/>";
      echo "<input type='hidden' name='Brent'  value=" . $row['rent'] . "/>";
      echo "<input type='hidden' name='Bstatus' value=" . $row['status'] . ">";
      echo "<input type='hidden' name='Bimage' value=" . $row['image'] . "/>";
      echo  "<a href=''><button style='width:100px' type='submit' name='bookCar' class='btn btn-read mt-3 ml-0'><b>Book</b></button></a>";
      echo "</div>";
      echo "</div>";
      echo "</form>";
    }}
      ?>
      </div>
  </body>
</html>