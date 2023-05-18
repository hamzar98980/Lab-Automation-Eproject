
     <?php include 'Header.php';?>
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
    <title>LabAuto - Testing Product</title>
    <link href="../../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">
    <link href="../../assets/css/uploadimage.css"  rel="stylesheet">
    <script src="../../assets/js/uploadimage.js"></script>
 
</head>
  <body>
      <?php include 'navbar.php';
      include '../../dbconfig.php';
      ?>

      <div class="page-container">
 
       <div class="page-content">
                    <div class="page-info">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="index.php">Test Product</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Texting Product</li>
                            </ol>
                        </nav>
                       
                    </div>
                    <div class="main-wrapper">
                        
                    <div class="row justify-content-md-center">
                            <div class="col-10">
                                <div class="card">
                                    <div class="card-body">
                                      <h1 class="text-center">Test Products</h1>
                                        <p class="text-center">Product Testing.</p>
                                        <div class="row">
                                            <div class="col-7 mt-5">
                              <table class="table">
                                            <tr>
                                                <td class="bold">Name:</td>
                                                <td><?php echo $row['p_name'];?></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Sku:</td>
                                                <td><?php echo $row['p_sku'];?></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Manufacture Date</td>
                                                <td><?php echo $row['p_manufacture'];?></td>
                                            </tr>
                                            <tr>
                                                <td class="bold">Description Date</td>
                                                <td><?php echo $row['p_description'];?></td>
                                            </tr>
                                        </table>
                                        </div>
                                        <div class="col-4">
                                            <img class="ml-5" src="../../uploads/<?php echo $row['p_img'];?>" width="100%">
                                        </div>
                                        </div>
                                        <h1 class="text-center mt-5">Testing Details</h1>
                                        <p class="text-center">Enter Testing Details.</p>






                                        <form action="testitem.php" method="Post">
                                        
                                        <div class="form-row">
                                                <div class="form-group col-md-12">
                                                
                                                <input type="hidden" value="<?php echo $_SESSION['e_id']; ?>" name="eid">    
                                                


                                                <input type="hidden" value="<?php echo $row['p_id'];?>" name="pid">    
                                            
                                            
                                            
                                            
                                                <label for="testtype">Test Type</label>
                                                <select id="testtype" class="form-control custom-select" name="tsttyp">
                                                  
                                                    <?php             
                                                        $get_data = "SELECT * from tb_testcategory";
                                                        $res = $con->query($get_data);
                                                        while($r = $res->fetch_array()){                                         
                                                    ?>                                           
                                                        <option value="<?php echo $r['ts_id'] ?>"> <?php echo $r['ts_name'] ?>  </option>
                                                        <?php 
                                                         }
                                                        ?>
                                                </select>  
                                                    
                                                
                                                </div>






                                        </div>
                                        <div class="form-row">
                                               <div class="form-group col-md-6">
                                                    <label for="date">Test Date</label>
                                                    <input type="date" required class="form-control" id="date" name="pdate">
                                                </div>
                                    
                                                <div class="form-group col-md-6 mt-3">
                                                    <label for="stat">Test Status</label>
                                                    <div class="mt-2 ml-2">
                                                    <input type="radio" class="ml-2" name="stat" id="Passed" value="Passed">
                                                    <label class="ml-2" for="Passed">Passed</label>
                                                    <input class="ml-2" type="radio" name="stat" id="Failed" value="Failed">
                                                    <label class="ml-2" for="Failed">Failed</label></div>
                                                </div>
                                        </div>

                                            <div class="form-row">
                                          
                                                <div class="form-group col-md-12">
                                                    <label for="Description">Test Description</label>
                                                    <textarea required class="form-control" id="Description" rows="3" placeholder="Write Something About The Product..." name="tdesc"></textarea>
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
