
<?php
    include 'config.php';
    
    session_start();
    $bID = $_GET[ids];
    $uid = $_SESSION['SESS_USER_ID'];
    
    $sql = "DELETE FROM user_blogs WHERE blogs_id = $bID AND user_id = $uid";
    if (!mysqli_query($con, $sql))
    {
      die('Error: ' . mysqli_error($con));
    }
    echo 'Blog has deleted...';
    header("location: blogName.php?");
    
?>
