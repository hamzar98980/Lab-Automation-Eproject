<!doctype html>
<html lang="en">
<head>
    <title>LabAuto - Add Your Product Here</title>
    <link href="../../assets/plugins/DataTables/datatables.min.css" rel="stylesheet"> 
    <link href="../../assets/css/uploadimage.css"  rel="stylesheet">
    <script src="../../assets/js/uploadimage.js"></script>
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
                                <li class="breadcrumb-item"><a href="index.php">Products</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                            </ol>
                        </nav>
                       
                    </div>
                    <div class="main-wrapper">
                    <div class="row justify-content-md-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="text-center">Add Products</h1>
                                        <p class="text-center">Add Products For Product Testing.</p>
                                        <form action="additem.php" method="Post" enctype="multipart/form-data">

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="form-input">
                                                                <label for="file-ip-1">Upload</label>
                                                                <input type="file" id="file-ip-1" accept="image/*" name="pimage" class="form-control" onchange="showPreview(event);">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                        
                                                                    <img class="ml-5" id="file-ip-1-preview" src="https://rlv.zcache.com/create_your_own_photo_print-r7881a010b313447b82044d4b2d1875bc_ncud_8byvr_324.jpg" width="150px">
                                                                </div>
                                                        
                                                    
                                            </div>
                                        <!-- <div class="form-row">
                                        <div class="form-group col-md-6">
                                                    <label for="Image">Product Image</label>
                                                    <input type="file"  required class="form-control" name="pimage" id="file-ip-1"
                                                    onchange="showPreview(event);">
                                                </div>
                                       
                                       
                                       
                                            </div> -->
                                        <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="Name">Product Name</label>
                                                    <input type="text"  required class="form-control" id="Name" name="pname" placeholder="Product Name">
                                                </div>
                                        </div>
                                        <div class="form-row">
                                               <div class="form-group col-md-6">
                                                    <label for="Manufacture">Product Manufacture Date</label>
                                                    <input type="date"  required class="form-control" id="Manufacture" name="pdate">
                                                </div>
                                    
                                                <div class="form-group col-md-6">
                                                    <label for="Sku">Product Sku</label>
                                                    <input type="text"  required class="form-control" id="Sku" placeholder="blb-0000" name="psku">
                                                </div>
                                        </div>

                                            <div class="form-row">
                                          
                                                <div class="form-group col-md-12">
                                                    <label for="Description">Product Description</label>
                                                    <textarea required class="form-control" id="Description" rows="3" placeholder="Write Something About The Product..." name="pdesc"></textarea>
                                                             </div>
                                              
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
