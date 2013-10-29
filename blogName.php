<?php
    require_once('auth.php');
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="/blog/assets/ico/favicon.png">
        <link href="/blog/eternicode-bootstrap/css/datepicker.css" rel="stylesheet">
        
        <title>BLOG</title>
        <link href="/blog/dist/css/bootstrap.css" rel="stylesheet">
        <link href="/blog/eternicode-bootstrap/css/datepicker.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <style type="text/css">
            .leftcol{ float:left }
            .topMAr{margin-top: 5px;}
            html, body {
                height: 100%;
                min-height: 100%;
            }
            .wrapper {
                text-align: center;
            }
            .button {
                position: absolute;
                top: 50%;
            }
            .menu12
            {
                border-left: 1px solid #B0C4DE;
                border-right: 1px solid #B0C4DE;
            }
            .horLine
            {
                border-top: 1px solid #87CEFA;
            }
            .ulBullet
            {
              list-style-type: none;
              padding:0;
              margin:0;
            }
/*            .glyphicon-trash{color:;}*/
        </style>
    </head>
    <body>
        <?php
            include 'config.php';
        ?> 
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                    <img src="logo1.jpg" class="img-responsive" style="height:100px; width: 100px;">
                </div>
                <div class="col-md-11">
                    <div class="onlycssmenu clearfix sticky" style="margin-top:30px;">
                      <ul class="clearfix">
                        <li><a href="blogName.php" class="active"><span>Home</span></a></li>
                        <li><a href="blogName.php"><span>Blog List</span></a></li>
                        <li><a href="#"><span>saa aas</span></a></li>
                        <li><a href="settings.php"><span>Settings</span></a></li>
                        <li><a href="blogger.php"><span>Create Blog</span></a></li>
                        <li class="nopipe"><a href="logout.php"><span>Logout</span></a></li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container" style="margin-top:20px;">
            <div class="row">
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-6 topMAr menu12">
                    <?php
                    $sql = "SELECT * FROM user_blogs ORDER BY created_time DESC";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<div class='horLine' style='margin-bottom:20px;'>";
                        $bgname = $row[blogs_id];
                        echo "<div style='margin-left:5px;'><h3><a id=$bgname href='#' onclick = return(blogId(this.id)); >".$row['blogs_name']."</a></h3></div>";
                        echo "<div style='margin-left:5px;'><h4 style='margin-left:15px;'>".$row['description']."</h4></div>";
                        
                        $next = "SELECT * FROM users WHERE user_id=$row[user_id]";
                        $result12 = mysqli_query($con, $next);
                        $row12 = mysqli_fetch_array($result12);
                        echo "<div style='display:inline-block;'><h5  style='margin-left:5px; text-align:right;'><a href='#'>".$row12['usename']."</a></h5></div>";
                        if($row[user_id] == $_SESSION['SESS_USER_ID'])
                        {
                            echo "<div style='display:inline-block;'><h5 style='margin-left:5px;'><a class='glyphicon glyphicon-trash' id=$bgname href='#' onclick = return(delId(this.id))></a></h5></div>";
                        }
                        echo '</div>';
                    }
                    ?>
                    
                </div>
                <div class="col-md-3">
                    
                    
                </div>
            </div>
        </div>
        <script type='text/javascript'>
            function blogId(bgid)
            {
                top.location.href = './blogComment.php?id='+bgid;
            }
            function delId(bgid)
            { 
                top.location.href = './deleteBlog.php?ids='+bgid;
            }
        </script>
        
        <p align="center" class="style1">Login successfully </p>
        <script type="text/javascript" src="/blog/assets/js/jquery.js"></script>
        <script type="text/javascript" src="/blog/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/blog/assets/js/holder.js"></script>
    </body>
</html>
