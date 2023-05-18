<?php
      include '../../dbconfig.php';
    
      $eid = $_POST['eid'];
      $pid = $_POST['pid'];   
    $test = $_POST['tsttyp'];
    $date = $_POST['pdate'];
    $status = $_POST['stat'];
    $desc = $_POST['tdesc'];
 
    $sql_insert = "INSERT into tb_tester(t_prod,t_status,t_test,t_date,t_reason,t_emp) 
    values('$pid','$status','$test','$date','$desc','$eid')";
    if($con -> query($sql_insert))
    {
        header("Location: index.php?success=1 row Added");

    }
    else{
        header("Location: index.php?error=1 row Added");

    }

?>