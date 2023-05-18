<?php
      include '../../dbconfig.php';
    $nm = $_POST['Name'];
    $dgn = $_POST['Designation'];
    $em = $_POST['Email'];
    $ps = $_POST['Password'];
    $cd = $_POST['Idcard'];
    $num = $_POST['Number'];

    $sql_insert = "CALL `addUser`('$nm', '$dgn','$ps', '$em','$cd','$num')";
    if($con -> query($sql_insert))
    {
    header("Location: index.php?success=1 row Added");

    }
    else{
        header("Location: index.php?error=1 row Added");

    }
?>