
<?php
      include '../../dbconfig.php';
     $id = $_POST['id'];
    $nm = $_POST['Name'];
    $dgn = $_POST['Designation'];
    $em = $_POST['Email'];
    $ps = $_POST['Password'];
    $cd = $_POST['Idcard'];
    $num = $_POST['Number'];

    $sql_insert = "UPDATE tb_emp  SET e_name='$nm' , e_designation='$dgn' , e_password='$ps' , e_email='$em' , e_cnic='$cd' , e_contact='$num' WHERE tb_emp.e_id = $id";
    if($con -> query($sql_insert))
    {
    header("Location: index.php?success=1 row Added $nm");

    }
    else{
        header("Location: index.php?error=1 row Added");

    }
?>
