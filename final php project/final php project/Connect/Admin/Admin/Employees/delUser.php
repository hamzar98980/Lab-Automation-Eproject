<?php
include '../../dbconfig.php';
if (isset($_GET['id'])) {
     $id= $_GET['id']; 
     $sql_del = "CALL `delUser`($id);";
     if($con -> query($sql_del))
     {
     header("Location: index.php?success=1 row Affected");

     }}
else{
    header("Location: index.php?error=invalid User Id");


} ?>