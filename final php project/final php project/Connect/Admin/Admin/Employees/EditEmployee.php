<?php
include '../../dbconfig.php';
if (isset($_GET['eid'])) {
     $id= $_GET['eid'];
     $dg= $_GET['dg']; 
     $sql_edit = "CALL `selUser`($id);";
     $sql_edit;
 $result = mysqli_query($con, $sql_edit);

if (mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">
<head>
    <title>LabAuto - Edit Employees</title>
    <link href="../../assets/plugins/DataTables/datatables.min.css" rel="stylesheet"> 
</head>
  <body>
  <?php include 'navbar.php';
      ?>
      <div class="page-container">
      <?php include 'Header.php';?>
                <div class="page-content">
                    <div class="page-info">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="index.php">Employees</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Employees</li>
                            </ol>
                        </nav>
                       
                    </div>
                    <div class="main-wrapper">
                    <div class="row">
                            <div class="col-xl">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="text-center">Edit Employee</h1>
                                        <p class="text-center">Edit Employee From Here For Login.</p>
                                        <form action="editUser.php" method="Post">
                                        <div class="form-row">
                                          <input type="hidden" value="<?php echo $row['e_id'];?>" name="id">
                                                <div class="form-group col-md-6">
                                                    <label for="Name">Name</label>
                                                    <input type="text" value="<?php echo $row['e_name'];?>"class="form-control" id="Name" name="Name" placeholder="John Simth">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="designation">Designation</label>
                                                    <select id="designation" value="<?php echo $row['e_designation'];?>" class="form-control custom-select" name="Designation">
                                                        <option >Choose...</option>
                                                        <option value="1001"<?php if($dg=='Tester'){echo 'selected';} ?>>Tester</option>
                                                        <option value="1002" <?php if($dg=='Product Adder'){echo 'selected';} ?>>Product Adder</option>
                                                    </select>
                                                </div>
                                            </div>
                                        
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="Email">Email</label>
                                                    <input type="email" value="<?php echo $row['e_email'];?>" class="form-control" id="Email" placeholder="john@smith.com" name="Email" value="<?php $row['e_email'];?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="password">Password</label>
                                                    <input type="password" value="<?php echo $row['e_password'];?>" class="form-control" id="password" placeholder="********" name="Password">
                                                </div>
                                            </div>
                                          
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="idNo">Id Card Number</label>
                                                    <input type="number" value="<?php echo $row['e_cnic'];?>" class="form-control" id="idNo" placeholder="42101-1111111-1" name="Idcard">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="num">Number</label>
                                                    <input type="number" class="form-control" value="<?php echo $row['e_contact'];?>" id="num" placeholder="0317-0802260" name="Number">
                                                </div>
                                            </div>
                                            <button type="submit" name="btnsubmit" class="btn btn-primary btn-lg btn-block">Insert Here</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
 




<?php

}
else{

    header("Location: index.php?error=Incorect User Id");


}
}
include 'ExtraNav.php';

?>
