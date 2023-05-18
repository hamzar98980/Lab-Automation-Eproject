<?php
include 'dbconfig.php';

session_start(); 


if (isset($_POST['email']) && isset($_POST['pwd'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $email = validate($_POST['email']);

    $pass = validate($_POST['pwd']);

    if (empty($email)) {

        header("Location: index.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: index.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * from tb_emp where e_email = '$email' and e_password = '$pass'";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['e_email'] === $email && $row['e_password'] === $pass) {

                echo "Logged in!";

        if ($row['e_designation'] == 1003) {
            $_SESSION['e_id'] = $row['e_id'];
            $_SESSION['name'] = $row['e_name'];
            $_SESSION['designation'] ='Admin';
            $_SESSION['email'] = $row['e_email'];
            $_SESSION['nic'] = $row['e_nic'];
            $_SESSION['contact'] = $row['e_contact'];
            header("Location: admin");

          
        }
        if ($row['e_designation'] == 1002) {
            $_SESSION['e_id'] = $row['e_id'];
            $_SESSION['name'] = $row['e_name'];
            $_SESSION['designation'] ='Product Adder';
            $_SESSION['email'] = $row['e_email'];
            $_SESSION['nic'] = $row['e_nic'];
            $_SESSION['contact'] = $row['e_contact'];
            header("Location: Adder");

          
        }
        if ($row['e_designation'] == 1001) {
            $_SESSION['e_id'] = $row['e_id'];
            $_SESSION['name'] = $row['e_name'];
            $_SESSION['designation'] ='tester';
            $_SESSION['email'] = $row['e_email'];
            $_SESSION['nic'] = $row['e_nic'];
            $_SESSION['contact'] = $row['e_contact'];
            header("Location: Tester");

          
        }
        exit();


            }
            else{

                header("Location: index.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: index.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: index.php");

    exit();

}

?>
