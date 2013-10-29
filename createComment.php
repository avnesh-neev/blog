
<?php
    require_once('auth.php');
?>

<?php
    include 'config.php';
    
    session_start();
    
    $blogId = $_SESSION['SESS_BLOG_ID'];
    $use_id = $_SESSION['SESS_USER_ID'];
    $com = $_POST['comment'];
    $com = mysql_real_escape_string($com);
    $dt = date(DATE_W3C);
    $sql = "INSERT INTO comments (comment_text, user_id, blog_id, created_date) VALUES ('$com', $use_id, $blogId, '$dt')";
    
    if (!mysqli_query($con, $sql))
    {
      die('Error: ' . mysqli_error($con));
    }
    echo 'comment has sent...';
    header("location: blogComment.php?id=$blogId");
    
?>
