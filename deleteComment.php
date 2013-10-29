<?php
    require_once('auth.php');
?>

<?php
    include 'config.php';
    
    session_start();
    $bID = $_GET[idc];
    $uid = $_SESSION['SESS_USER_ID'];
    
    $sql = "DELETE FROM comments WHERE comment_id = $bID AND user_id = $uid";
    if (!mysqli_query($con, $sql))
    {
      die('Error: ' . mysqli_error($con));
    }
    echo 'Blog has deleted...';
    header("location: blogName.php?");
    
?>