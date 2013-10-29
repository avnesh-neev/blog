<?php
    require_once('auth.php');
?>


<?php
    include 'config.php';
    
    session_start();
    
    $oldPass = $_POST['oldPassword'];
    $newPass = $_POST['newPasword'];
    $renewPass = $_POST['renewPasword'];
    
    $use_id = $_SESSION['SESS_USER_ID'];
    $tm = date(DATE_W3C);
    
    $sqlQ = "SELECT * FROM users WHERE user_id= $use_id";
    $result = mysqli_query($con, $sqlQ);
    
    if($result)
    {
        if(mysqli_num_rows($result) > 0) 
        {
            session_regenerate_id();
            $member = mysqli_fetch_assoc($result);
            
            if($member['password']==$oldPass)
            {
                $sqlUpdate = "UPDATE users SET password= '$newPass' WHERE user_id= $use_id";
                
                if (!mysqli_query($con, $sqlUpdate))
                {
                  die('Error: ' . mysqli_error($con));
                }
                $mszCor = 'Password is sucsessfully updated....';
                header("location: settings.php?msz=$mszCor");
                exit();
            }
            else
            {
                $mszError = 'Sorry, Old Password is wrong....';
                header("location: settings.php?msz=$mszError");
                exit();
            }
         }
         else
         {
             die('Error: '.mysqli_error($result));
         }
    }
    
?>