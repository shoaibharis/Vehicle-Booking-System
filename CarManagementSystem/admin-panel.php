<!DOCTYPE html>
<html>
<head>
	<title>Account</title>
	<?php include_once 'dependencies.php';?>

<script type='text/javascript'>
function confirmDelete()
{
   return confirm("Are you sure you want to delete this?");
}
</script>

<body>
<?php
require_once("config.php");
$name = $model = $year = $description = '';


if (!isset($_SESSION['login_sess'])) {
	header("Location: login.php");
}
if (isset($_POST['add_car'])) {

	$make = $_POST['make'];
	$model = $_POST['model'];
	$rent = $_POST['rent'];
	$status=$_POST['status'];
	$image=$_POST['img'];
	$AddQuery = "INSERT INTO cars (make, model, rent, status,image)
    VALUES ('$make','$model', '$rent', '$status','$image')";
	mysqli_query($dbc, $AddQuery);
	header("Location: admin-panel.php");
}
;

$select_car = "SELECT * FROM cars";
$result = $dbc->query($select_car);

if (isset($_POST['delete_car'])) {
	$hidden = $_POST['hidden'];
	$DeleteQuery = "DELETE FROM cars WHERE
    id='$hidden'";
	mysqli_query($dbc, $DeleteQuery);
	header("Location: admin-panel.php");
}

$select_book="Select * from bookings";
$result2=$dbc->query($select_book);
?>

<nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo2">Ezy Rentals</label>
      <ul>
        <li><a href="Logout.php">Logout</a></li>
      </ul>
    </nav>
	<div class="row" style="display: flex; flex: 1 1 auto;">
  <table class="col-6"><caption><h3>Total Cars</h3><hr style="width:20%; border:1px solid #1e90ff ; border-radius:2px "></caption>
   <tr>
     <th>Car ID</th>
     <th>Make</th>
     <th>Model</th>
	 <th>Rent</th>
     <th>Status</th>
     </tr>
<?php
 if ($select_car) {
	while ($row = $result->fetch_assoc()) {
		echo "<form action=admin-panel.php method=post>";
		echo "<tr>";
		echo "<td name>" . $row['id'] . " </td>";
		echo "<td>" . $row['make'] . " </td>";
		echo "<td>" . $row["model"] . " </td>";
		echo "<td>" . $row["rent"] . " </td>";
		echo "<td>" . $row["status"] . " </td>";
		echo "<input type='hidden' name='hidden'  value=" . $row["id"] . " </td>";
		echo "<td>" . "<input type=submit name=delete_car value='Delete Car' onclick='return confirmDelete()' " . " </td>";
		echo "</tr>";
		echo "</form>";
	}}
?>
</table>

<table class="col-lg-6"><caption><h3>Booking Details</h3><hr style="width:29%; border:1px solid #1e90ff ; border-radius:2px "></caption>
   <tr>
     <th>Make</th>
     <th>Model</th>
	 <th>Rent</th>
     <th>Status</th>
	 <th>UserID</th>
     </tr>
<?php
if ($select_book) {
	while ($row = $result2->fetch_assoc()) {
		echo "<tr>";
		echo "<td>" . $row['make'] . " </td>";
		echo "<td>" . $row["model"] . " </td>";
		echo "<td>" . $row["rent"] . " </td>";
		echo "<td>" . $row["status"] . " </td>";
		echo "<td name>" . $row['userid'] . " </td>";
		echo "</tr>";
	}}
?>
</table>

</div>
<br>
<div class="container">
<hr style="width:80%; margin-left:100px;  border: 2px solid #1e90ff ; border-radius:3px"><br>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    	<form role="form" name="form" id="form" method="POST" >
    	<br>
			<h2>Add Cars </h2>
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="make" id="name" class="form-control input-lg" placeholder="Manufacturer" tabindex="1" required="true">
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="model" id="model" class="form-control input-lg" placeholder="Model" tabindex="2" required="true">
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="text" name="rent" id="year" class="form-control input-lg" placeholder="rent $"  required="true">
			</div> 
			<div class="form-group">
				<input type="text" name="img" id="img" class="form-control input-lg" placeholder="imageURL"  required="true">
			</div>
			<div class="form-group">
				<input type="text" name="status" id="status" class="form-control input-lg" placeholder="Booking Status"  required="true">
			</div>
				</div>
			<div class="container" >
				<div style="margin-left:280px" class="col-xs-6 col-sm-6 col-md-6 form-group">
				<input type="submit" name="add_car" id="add"  value="Add Car" class="btn add_car btn-primary" style="width:200px;"></div>
			</div>
		</form>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>