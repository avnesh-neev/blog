<?php
    require_once('auth.php');
?>


<?php
    include 'config.php';
    
    session_start();
    
    $blogName = $_POST['blogName'];
    $description = $_POST['desc'];
    $description = mysql_real_escape_string($description);
    $use_id = $_SESSION['SESS_USER_ID'];
    $tm = date(DATE_W3C);
    
    $sql = "INSERT INTO user_blogs(blogs_name, description, user_id, created_time) VALUES('$blogName', '$description', $use_id,'$tm')";
    if (!mysqli_query($con, $sql))
    {
      die('Error: ' . mysqli_error($con));
    }
    echo 'blog has sucsessfully created....';
    echo $blogName."AND".$description;
    header("location: blogName.php");
?>
