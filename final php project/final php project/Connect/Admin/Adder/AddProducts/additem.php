<?php
      include '../../dbconfig.php';
    $nm = $_POST['pname'];
    $pd = $_POST['pdate'];
    $pi = $_FILES['pimage']['name'];
    $tmp_name = $_FILES['pimage']['tmp_name'];
    $psku = $_POST['psku'];
    $pdesc = $_POST['pdesc'];
    $path="../../uploads/".$pi;
    move_uploaded_file($tmp_name,$path);   
    $sql_insert = "INSERT INTO `tb_prd` (`p_name`, `p_manufacture`, `p_description`, `p_img`, `p_sku`) VALUES ('$nm', '$pd','$pdesc', '$pi','$psku')";
    if($con -> query($sql_insert))
    {
        header("Location: index.php?success=1 row Added");

    }
    else{
        header("Location: index.php?error=1 row Added");

    }

?>