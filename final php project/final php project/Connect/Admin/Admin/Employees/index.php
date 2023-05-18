<!doctype html>
<html lang="en">
<head>
    <title>LabAuto - CheckOut Our Employees</title>
    <link href="../../assets/plugins/DataTables/datatables.min.css" rel="stylesheet"> 
</head>
  <body>
      <?php include 'navbar.php';
      include '../../dbconfig.php';
      ?>
      <div class="page-container">
      <?php include 'Header.php';?>
                <div class="page-content">
                    <div class="page-info">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Employees</li>
                            </ol>
                        </nav>
                       
                    </div>
                    <div class="main-wrapper">
                    <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="text-center">Employees Tables</h1>
                                        <p class="text-center"><a href="addEmployee.php" class="btn btn-primary">Add Employees</a>
                                        <?php if (isset($_GET['success'])) { ?>
                                        <div class="alert alert-success" role="alert">
                                        <?php echo $_GET['success']; ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['error'])) { ?>
                                        <div class="alert alert-danger" role="alert">
                                        <?php echo $_GET['error']; ?>
                                        </div>
                                    <?php } ?>
                                </p>
                                        <table id="zero-conf" class="display" style="width:100%">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Email</th>
                                                    <th>Password</th>
                                                    
                                                    <th>Id Card Number</th>
                                                    <th>Contact</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            


                                            
                                            <tbody>
                                               <?php

                                                $sql_fetch = "CALL `getUser`();";
                                                $res = $con->query($sql_fetch);

                                                while($row = $res->fetch_array())
                                                {
                                                    $name = $row['e_name'];
                                                    $desg = $row['e_designation'];
                                                    $email = $row['e_email'];
                                                    $pass = $row['e_password'];
                                                    $nic = $row['e_cnic'];
                                                    $con = $row['e_contact'];
                                                    $id = $row['e_id'];
                                                    

                                                ?>
                                                <tr>
                                                    <td><?php echo $name ?></td>
                                                    <td><?php echo $desg ?></td>
                                                    <td><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></td>
                                                    <td><?php echo $pass ?></td>
                                                    <td><?php echo $nic ?></td>
                                                    <td><a href="tel:0<?php echo $con ?>">0<?php echo $con ?></a></td>
                                                    <td><a href="EditEmployee.php?eid=<?php echo $id; ?>&dg=<?php echo $desg; ?>" class="btn btn-info btn-xs">Edit</a><a href="delUser.php?id=<?php echo $id ?>" class="btn btn-danger btn-xs ml-2">Delete</a></td>
                                                </tr>
                                                <?php	
                                                }
                                                ?>
                                               
                                                

                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
 

<?PHP
include 'ExtraNav.php' ?>