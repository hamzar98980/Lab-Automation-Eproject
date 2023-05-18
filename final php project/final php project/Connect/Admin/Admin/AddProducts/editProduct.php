<?php
include '../../dbconfig.php';
if (isset($_GET['eid'])) {
     $id= $_GET['eid']; 
     $sql_edit = "select * from tb_prd where tb_prd.p_id=".$id;
     $sql_edit;
 $result = mysqli_query($con, $sql_edit);

if (mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">
<head>
    <title>LabAuto - Edit Product Here</title>
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
                                <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                            </ol>
                        </nav>
                       
                    </div>
                    <div class="main-wrapper">
                    <div class="row justify-content-md-center">
                            <div class="col-10">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="text-center">Edit Products</h1>
                                        <p class="text-center">Edit Products For Product Testing.</p>
                                        <form action="edititem.php" method="Post" enctype="multipart/form-data">
                                        
                                        <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="form-input">
                                                                <label for="file-ip-1">Upload</label>
                                                                <input type="file" id="file-ip-1" accept="image/*" name="pimage" class="form-control" onchange="showPreview(event);">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                        
                                                                    <img class="ml-5" id="file-ip-1-preview" src="../../uploads/<?php echo $row['p_img'];?>" width="150px" name="pimage">
                                                                </div>
                                                        
                                                    
                                            </div>
                                        <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="Name">Product Name</label>
                                                    <input type="text"  required  value="<?php echo $row['p_name'];?>" class="form-control" id="Name" name="pname" placeholder="Product Name">
                                                    <input type="hidden" value="<?php echo $row['p_id'];?>" name="pid">
                                                </div>
                                        </div>
                                        <div class="form-row">
                                               <div class="form-group col-md-6">
                                                    <label for="Manufacture">Product Manufacture Date</label>
                                                    <input type="date" value="<?php echo $row['p_manufacture'];?>" required class="form-control" id="Manufacture" name="pdate">
                                                </div>
                                    
                                                <div class="form-group col-md-6">
                                                    <label for="Sku">Product Sku</label>
                                                    <input type="text" value="<?php echo $row['p_sku'];?>" required class="form-control" id="Sku" placeholder="blb-0000" name="psku">
                                                </div>
                                        </div>

                                            <div class="form-row">
                                          
                                                <div class="form-group col-md-12">
                                                    <label for="Description">Product Description</label>
                                                    <textarea required class="form-control" id="Description" rows="3" placeholder="Write Something About The Product..." name="pdesc"><?php echo $row['p_description'];?></textarea>
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

}
else{

    header("Location: index.php?error=Incorect User Id");


}
}
include 'ExtraNav.php';
?>
