
<?php
      include '../../dbconfig.php';
      $eid = $_POST['pid'];
      $nm = $_POST['pname'];
      $pd = $_POST['pdate'];
      $pi = $_FILES['pimage']['name'];
      $tmp_name = $_FILES['pimage']['tmp_name'];
      $psku = $_POST['psku'];
      $pdesc = $_POST['pdesc'];
      $path="../../uploads/".$pi;
      
      if($pi==""){
        $sql_insert = "UPDATE `tb_prd` SET p_name = '$nm', p_manufacture  = '$pd', `p_description` = '$pdesc', `p_sku` = '$psku' WHERE   tb_prd.P_ID= '$eid'";
        if($con -> query($sql_insert))
        {
          header("Location: index.php?success=1 row Added");
    
        }
        else{
            header("Location: index.php?error=1 row Added");
    
        }  
    }
      else{
      move_uploaded_file($tmp_name,$path);   
      $sql_insert = "UPDATE `tb_prd` SET p_name = '$nm', p_manufacture  = '$pd', `p_description` = '$pdesc', `p_img` = '$pi', `p_sku` = '$psku' WHERE   tb_prd.P_ID= '$eid'";
      if($con -> query($sql_insert))
      {
        header("Location: index.php?success=1 row Added");
  
      }
      else{
          header("Location: index.php?error=1 row Added");
  
      }}
  ?>
