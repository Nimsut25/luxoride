<?php
    session_start();
    error_reporting(0);
    include 'includes/config.php';
    if (strlen($_SESSION['alogin']) == 0) {
        header('location:index.php');
    } else {

        if (isset($_POST['submit'])) {
            $vehicletitle       = trim($_POST['vehicletitle']);
            $brand              = trim($_POST['brandname']);
            $vehicleoverview    = trim($_POST['vehicalorcview']);
            $priceperday        = trim($_POST['priceperday']);
            $fueltype           = trim($_POST['fueltype']);
            $modelyear          = trim($_POST['modelyear']);
            $seatingcapacity    = trim($_POST['seatingcapacity']);
            $airconditioner     = trim($_POST['airconditioner']);
            $powerdoorlocks     = trim($_POST['powerdoorlocks']);
            $antilockbrakingsys = trim($_POST['antilockbrakingsys']);
            $brakeassist        = trim($_POST['brakeassist']);
            $powersteering      = trim($_POST['powersteering']);
            $driverairbag       = trim($_POST['driverairbag']);
            $passengerairbag    = trim($_POST['passengerairbag']);
            $powerwindow        = trim($_POST['powerwindow']);
            $cdplayer           = trim($_POST['cdplayer']);
            $centrallocking     = trim($_POST['centrallocking']);
            $crashcensor        = trim($_POST['crashcensor']);
            $leatherseats       = trim($_POST['leatherseats']);
            $id                 = intval($_GET['id']);

            // Check for duplicate vehicle
            $sql_check   = "SELECT id FROM tblvehicles WHERE VehiclesTitle=:vehicletitle AND VehiclesBrand=:brand AND ModelYear=:modelyear AND SeatingCapacity=:seatingcapacity AND id != :id";
            $query_check = $dbh->prepare($sql_check);
            $query_check->bindParam(':vehicletitle', $vehicletitle, PDO::PARAM_STR);
            $query_check->bindParam(':brand', $brand, PDO::PARAM_STR);
            $query_check->bindParam(':modelyear', $modelyear, PDO::PARAM_STR);
            $query_check->bindParam(':seatingcapacity', $seatingcapacity, PDO::PARAM_STR);
            $query_check->bindParam(':id', $id, PDO::PARAM_INT);
            $query_check->execute();

            if ($query_check->rowCount() > 0) {
                $error = "This vehicle has already been posted.";
            } else {
                // Proceed with the update
                $sql   = "UPDATE tblvehicles SET VehiclesTitle=:vehicletitle, VehiclesBrand=:brand, VehiclesOverview=:vehicleoverview, PricePerDay=:priceperday, FuelType=:fueltype, ModelYear=:modelyear, SeatingCapacity=:seatingcapacity, AirConditioner=:airconditioner, PowerDoorLocks=:powerdoorlocks, AntiLockBrakingSystem=:antilockbrakingsys, BrakeAssist=:brakeassist, PowerSteering=:powersteering, DriverAirbag=:driverairbag, PassengerAirbag=:passengerairbag, PowerWindows=:powerwindow, CDPlayer=:cdplayer, CentralLocking=:centrallocking, CrashSensor=:crashcensor, LeatherSeats=:leatherseats WHERE id=:id";
                $query = $dbh->prepare($sql);
                $query->bindParam(':vehicletitle', $vehicletitle, PDO::PARAM_STR);
                $query->bindParam(':brand', $brand, PDO::PARAM_STR);
                $query->bindParam(':vehicleoverview', $vehicleoverview, PDO::PARAM_STR);
                $query->bindParam(':priceperday', $priceperday, PDO::PARAM_STR);
                $query->bindParam(':fueltype', $fueltype, PDO::PARAM_STR);
                $query->bindParam(':modelyear', $modelyear, PDO::PARAM_STR);
                $query->bindParam(':seatingcapacity', $seatingcapacity, PDO::PARAM_STR);
                $query->bindParam(':airconditioner', $airconditioner, PDO::PARAM_STR);
                $query->bindParam(':powerdoorlocks', $powerdoorlocks, PDO::PARAM_STR);
                $query->bindParam(':antilockbrakingsys', $antilockbrakingsys, PDO::PARAM_STR);
                $query->bindParam(':brakeassist', $brakeassist, PDO::PARAM_STR);
                $query->bindParam(':powersteering', $powersteering, PDO::PARAM_STR);
                $query->bindParam(':driverairbag', $driverairbag, PDO::PARAM_STR);
                $query->bindParam(':passengerairbag', $passengerairbag, PDO::PARAM_STR);
                $query->bindParam(':powerwindow', $powerwindow, PDO::PARAM_STR);
                $query->bindParam(':cdplayer', $cdplayer, PDO::PARAM_STR);
                $query->bindParam(':centrallocking', $centrallocking, PDO::PARAM_STR);
                $query->bindParam(':crashcensor', $crashcensor, PDO::PARAM_STR);
                $query->bindParam(':leatherseats', $leatherseats, PDO::PARAM_STR);
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();

                $msg = "Data updated successfully";
            }
        }
    }
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>Car Rental Portal | Admin Edit Vehicle Info</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>

<body>
	<?php include 'includes/header.php'; ?>
	<div class="ts-main-content">
	<?php include 'includes/leftbar.php'; ?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Edit Vehicle</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
									<div class="panel-body">
<?php if ($msg) {?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<?php
    $id    = intval($_GET['id']);
    $sql   = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt     = 1;
    if ($query->rowCount() > 0) {
    foreach ($results as $result) {?>

<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Vehicle Title<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="vehicletitle" class="form-control" value="<?php echo htmlentities($result->VehiclesTitle) ?>" required>
</div>
<label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="brandname" required>
<option value="<?php echo htmlentities($result->bid); ?>"><?php echo htmlentities($bdname = $result->BrandName); ?> </option>
<?php $ret = "select id,BrandName from tblbrands";
            $query     = $dbh->prepare($ret);
            //$query->bindParam(':id',$id, PDO::PARAM_STR);
            $query->execute();
            $resultss = $query->fetchAll(PDO::FETCH_OBJ);
            if ($query->rowCount() > 0) {
                foreach ($resultss as $results) {
                    if ($results->BrandName == $bdname) {
                        continue;
                    } else {
                    ?>
<option value="<?php echo htmlentities($results->id); ?>"><?php echo htmlentities($results->BrandName); ?></option>
<?php }
                }
        }?>

</select>
</div>
</div>

<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Vehical Overview<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="vehicalorcview" rows="3" required><?php echo htmlentities($result->VehiclesOverview); ?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Price Per Day(in USD)<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="priceperday" class="form-control" value="<?php echo htmlentities($result->PricePerDay); ?>" required>
</div>
<label class="col-sm-2 control-label">Select Fuel Type<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="fueltype" required>
<option value="<?php echo htmlentities($result->FuelType); ?>"><?php echo htmlentities($result->FuelType); ?> </option>

<option value="Petrol">Petrol</option>
<option value="Diesel">Diesel</option>
<option value="CNG">CNG</option>
</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Model Year<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="modelyear" class="form-control" value="<?php echo htmlentities($result->ModelYear); ?>" required>
</div>
<label class="col-sm-2 control-label">Seating Capacity<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="seatingcapacity" class="form-control" value="<?php echo htmlentities($result->SeatingCapacity); ?>" required>
</div>
</div>
<div class="hr-dashed"></div>
<div class="form-group">
<div class="col-sm-12">
<h4><b>Vehicle Images</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 1 <img src="../assets/images/carimages/<?php echo htmlentities($result->Vimage1); ?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage1.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 1</a>
</div>
<div class="col-sm-4">
Image 2<img src="../assets/images/carimages/<?php echo htmlentities($result->Vimage2); ?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage2.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 2</a>
</div>
<div class="col-sm-4">
Image 3<img src="../assets/images/carimages/<?php echo htmlentities($result->Vimage3); ?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage3.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 3</a>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 4<img src="../assets/images/carimages/<?php echo htmlentities($result->Vimage4); ?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage4.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 4</a>
</div>
<div class="col-sm-4">
Image 5
<?php if ($result->Vimage5 == "") {
                echo htmlentities("File not available");
        } else {?>
<img src="../assets/images/carimages/<?php echo htmlentities($result->Vimage5); ?>" width="300" height="200" style="border:solid 1px #000">
<a href="changeimage5.php?imgid=<?php echo htmlentities($result->id) ?>">Change Image 5</a>
<?php }?>
</div>

</div>
<div class="hr-dashed"></div>
</div>
</div>
</div>
</div>



<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Accessories</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="airconditioner" name="airconditioner" value="1"                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo($result->AirConditioner == 1) ? 'checked' : ''; ?>>
                            <label for="airconditioner"> Air Conditioner </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="powerdoorlocks" name="powerdoorlocks" value="1"                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo($result->PowerDoorLocks == 1) ? 'checked' : ''; ?>>
                            <label for="powerdoorlocks"> Power Door Locks </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="antilockbrakingsys" name="antilockbrakingsys" value="1"                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo($result->AntiLockBrakingSystem == 1) ? 'checked' : ''; ?>>
                            <label for="antilockbrakingsys"> AntiLock Braking System </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="brakeassist" name="brakeassist" value="1"                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo($result->BrakeAssist == 1) ? 'checked' : ''; ?>>
                            <label for="brakeassist"> Brake Assist </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="powersteering" name="powersteering" value="1"                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo($result->PowerSteering == 1) ? 'checked' : ''; ?>>
                            <label for="powersteering"> Power Steering </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="driverairbag" name="driverairbag" value="1"                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo($result->DriverAirbag == 1) ? 'checked' : ''; ?>>
                            <label for="driverairbag"> Driver Airbag </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="passengerairbag" name="passengerairbag" value="1"                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo($result->PassengerAirbag == 1) ? 'checked' : ''; ?>>
                            <label for="passengerairbag"> Passenger Airbag </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="powerwindow" name="powerwindow" value="1"                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo($result->PowerWindows == 1) ? 'checked' : ''; ?>>
                            <label for="powerwindow"> Power Windows </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="cdplayer" name="cdplayer" value="1"                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo($result->CDPlayer == 1) ? 'checked' : ''; ?>>
                            <label for="cdplayer"> CD Player </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="centrallocking" name="centrallocking" value="1"                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo($result->CentralLocking == 1) ? 'checked' : ''; ?>>
                            <label for="centrallocking"> Central Locking </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="crashcensor" name="crashcensor" value="1"                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo($result->CrashSensor == 1) ? 'checked' : ''; ?>>
                            <label for="crashcensor"> Crash Sensor </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="leatherseats" name="leatherseats" value="1"                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <?php echo($result->LeatherSeats == 1) ? 'checked' : ''; ?>>
                            <label for="leatherseats"> Leather Seats </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
}?>


											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2" >

<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Save changes</button>
												</div>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>



					</div>
				</div>



			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
