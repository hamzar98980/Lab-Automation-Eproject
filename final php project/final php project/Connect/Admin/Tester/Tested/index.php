<!doctype html>
<html lang="en">
<head>
    <title>LabAuto - Tested Products Here</title>
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
                                <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tested Products</li>
                            </ol>
                        </nav>
                       
                    </div>
                    <div class="main-wrapper">
                    <div class="row">
                    <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="text-center">Tested Products</h1>
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
                                    <table id="zero-conf" class="display" style="width:100%">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Product Image</th>
                                                    <th scope="col">Product Name</th>
                                                    <th scope="col">SkU</th>
                                                    <th scope="col">Test Type</th>
                                                    <th scope="col">Test Status</th>
                                                    <th scope="col">Test By</th>
                                                    <th scope="col">Testing Date</th>
                                                    <th scope="col">Description</th>
                                                                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $sql_fetch = "CALL `gettest`();";
                                                $res = $con->query($sql_fetch);

                                                while($row = $res->fetch_array())
                                                {
                                                 
                                                    $nm = $row['p_name'];
                                                    $mg = $row['p_img'];
                                                    $psk = $row['p_sku'];
                                                    $en = $row['e_name'];
                                                    $tsn = $row['ts_name'];
                                                    $ts = $row['t_status'];
                                                    $td = $row['t_date'];
                                                    $tr = $row['t_reason'];                                                   

                                                    ?>
                                                <tr>
                                                    <td><img src="../../uploads/<?php echo $mg; ?>" class="tbl-img"></td>
                                                    <td><?php echo $nm; ?></td>
                                                    <td><?php echo $psk; ?></td>
                                                    <td><?php echo $tsn; ?></td>
                                                    <td><?php echo $ts; ?></td>
                                                    <td><?php echo $en; ?></td>
                                                    <td><?php echo $td; ?></td>
                                                    <td><?php echo $tr; ?></td>
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
                        </div>
 

<?PHP
include 'ExtraNav.php' ?>