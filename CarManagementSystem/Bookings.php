
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
//session_start();
require_once 'config.php';
if(!isset($_SESSION['login_sess'])){
        
      header("location:UserLogin.php");
}

    $usermail= $_SESSION["login_email"];
    $selectuser="Select userid FROM userrecord WHERE email = '$usermail'";
    $res = mysqli_query($dbc,$selectuser);
    $row=mysqli_fetch_assoc($res);
    $userid=$row['userid'];
   $BookData="SELECT make, image,  model, rent, status FROM Bookings WHERE Bookings.userid='$userid'";
   $result=mysqli_query($dbc,$BookData);
?>
<nav>
<input type="checkbox" id="check">
<label for="check" class="checkbtn">
  <i class="fas fa-bars"></i>
</label>
<label class="logo2">Ezy Rentals</label>
<ul>
  <li><a class="active" href="home.php">Home</a></li>
  <li><a href="#">About</a></li>
  <li><a href="Bookings.php">Bookings</a></li>
  <li><a href="#">Contact</a></li>
  <li><a href="UserLogout.php">Logout</a></li>
</ul>
</nav>
<div class="heading-style container" style="margin-bottom:20px;" >Your Bookings<br><hr></div>
<div class="container" style="margin-top:12px; margin-bottom: 20px;">
    <?php if($BookData) {
	while ($row = $result->fetch_assoc()) {
      echo  "<div class='card card-post' style='display: flex; flex: 1 1 auto; border:none;background-color: transparent; flex-direction: row; align-items: center; height: 300px;'>";
      echo  "<img src=" . $row["image"] . " style='width: 30%; height: 100%;border-bottom-right-radius: 5px; object-fit: cover;' class='card-img-top'/>";
      echo  "<div class'card-body' style='margin-left:50px; margin-bottom:20px'>";
      echo  "<h3 class='card-title' style='font-weight: bold;'>Manufacturer: " . $row['make'] . "</h3>";
      echo  "<h4 class='card-title' style=''>Model: " . $row['model'] . "</h4>";
      echo  "<h4 class='card-title' style=''>Rent: " . $row['rent'] . "$</h4>";
      echo  "<h4 class='card-title' style=''>Status: " . $row['status'] . "</h4>";    
      echo "</div>";
      echo "</div>";
    }}
      ?>
      </div>
</body>
</html>