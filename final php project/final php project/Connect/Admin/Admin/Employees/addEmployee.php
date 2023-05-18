<!doctype html>
<html lang="en">
<head>
    <title>LabAuto - Add Employees Here</title>
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
                                <li class="breadcrumb-item active" aria-current="page">Add Employees</li>
                            </ol>
                        </nav>
                       
                    </div>
                    <div class="main-wrapper">
                    <div class="row">
                            <div class="col-xl">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="text-center">Add Employees</h1>
                                        <p class="text-center">Add New Employees From Here For Login.</p>
                                        <form action="addUser.php" method="Post">
                                        <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="Name">Name</label>
                                                    <input type="text" class="form-control" id="Name" name="Name" placeholder="John Simth">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="designation">Designation</label>
                                                    <select id="designation" class="form-control custom-select" name="Designation">
                                                        <option selected>Choose...</option>
                                                        <option value="1001">Tester</option>
                                                        <option value="1002">Product Adder</option>
                                                    </select>
                                                </div>
                                            </div>
                                        
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="Email">Email</label>
                                                    <input type="email" class="form-control" id="Email" placeholder="john@smith.com" name="Email">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" id="password" placeholder="********" name="Password">
                                                </div>
                                            </div>
                                          
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="idNo">Id Card Number</label>
                                                    <input type="number" class="form-control" id="idNo" placeholder="42101-1111111-1" name="Idcard">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="num">Number</label>
                                                    <input type="number" class="form-control" id="num" placeholder="0317-0802260" name="Number">
                                                </div>
                                            </div>
                                            <button type="submit" name="btnsubmit" class="btn btn-primary btn-lg btn-block">Insert Here</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
 



<?php
include 'ExtraNav.php';

?>
