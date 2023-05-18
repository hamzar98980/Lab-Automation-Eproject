<!doctype html>
<html lang="en">
<head>
    <title>LabAuto - Add Products Here</title>
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
                                <li class="breadcrumb-item active" aria-current="page">Products</li>
                            </ol>
                        </nav>
                       
                    </div>
                    <div class="main-wrapper">
                    <div class="row">
                    <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="text-center">Products Tables</h1>
                                        <p class="text-center"><a href="addProduct.php" class="btn btn-primary">Add Product</a></p>
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
                                                    <th scope="col">Manufacture Date</th>
                                                    <th scope="col">Actions</th>
                                                                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $sql_fetch ="CALL `getItem`();";
                                                $res = $con->query($sql_fetch);

                                                while($row = $res->fetch_array())
                                                {
                                                    $pid=$row['p_id'];
                                                    $nm = $row['p_name'];
                                                    $pm = $row['p_manufacture'];
                                                    $pd = $row['p_description'];
                                                    $mg = $row['p_img'];
                                                    $psk = $row['p_sku'];

                                                    ?>
                                                <tr>
                                                    <td><img src="../../uploads/<?php echo $mg; ?>" class="tbl-img"></td>
                                                    <td><?php echo $nm; ?></td>
                                                    <td><?php echo $psk; ?></td>
                                                    <td><?php echo $pm; ?></td>
                                                    <td><a href="editProduct.php?eid=<?php echo $pid; ?>" class="btn btn-info btn-xs">Edit</a><a href="delItem.php?id=<?php echo $pid; ?>" class="btn btn-danger btn-xs ml-2">Delete</a></td>
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