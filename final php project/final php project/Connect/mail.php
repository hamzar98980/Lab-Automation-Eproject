<?php
      include 'dbconfig.php';
    $em = $_POST['email'];
   
    $sql = "SELECT * from tb_mail where m_email = '$em'";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) === 1) {

        header("Location: index.php?success=Already Subscribed Our Newsletter");;


    }
    else{
        $sql_insert = "INSERT INTO `tb_mail` (`m_email`) VALUES ('$em')";
  
        if($con -> query($sql_insert))
        {
            $to_email = $em;
            $subject = "Thanks For Subscribe Our NewsLetter";
            $body ='';
            $htmlContent = file_get_contents("Mailtemp.html");
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            if (mail($to_email, $subject, $htmlContent, $headers)) {
            header("Location: index.php?error=1 row Added");
            } else {
                header("Location: index.php?success=Email sending failed...");
            } 
    
        }
        else{
            header("Location: index.php?error=1 row Added");
    
        }
    


        header("Location: index.php?success=Thanks For Subscribing Our Newsletter");



    }



?>