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
            .wrapper1 {
                text-align: right;
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
            .glow {
            text-shadow:-1px 0px 20px #0a008f;
            color:white;
            }
        </style>
        <script type="text/javascript">
            function validateComment()
            {
              if( document.createCom.comment.value == "" )
              {
                alert( "First Comment something..");
                document.createCom.comment.focus();
                return false;
              }
            }
        </script>
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
                    <div class="onlycssmenu clearfix" style="margin-top:30px;">
                      <ul class="clearfix">
                        <li><a href="blogName.php" class="active"><span>Home</span></a></li>
                        <li><a href="blogName.php"><span>Blog List</span></a></li>
                        <li><a href="#"><span>saa saa</span></a></li>
                        <li><a href="settings.php"><span>settings</span></a></li>
                        <li><a href="blogger.php"><span>Create Blog</span></a></li>
                        <li class="nopipe"><a href="logout.php"><span>Logout</span></a></li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container" style="margin-bottom:20px;">
            <div class="row">
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-6 topMAr">
                    <h2 class="glow" style="text-align:center;">Welcome in Blog: <?php $sql = "SELECT * FROM user_blogs WHERE blogs_id= $_GET[id]";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);
                    echo $row['blogs_name'];
                    ?></h2>
                </div>
                <div class="col-md-3">
                    
                </div>
           </div>
      </div>
        
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-6 topMAr menu12">
                    <div>
                        <form method="POST" action="createComment.php" name="createCom" onsubmit="return(validateComment());">
                            <textarea class="form-control" rows="2" name="comment" id="comment" placeholder="Comment here...." style="margin-bottom:10px;"></textarea>
                            <div class="wrapper1 topMAr">
                                <button class="btn btn-primary" type="submit" style="">comment</button>
                            </div>
                        </form>
                    </div>
                    <?php
                            $Id = $_GET[id];
                            $_SESSION['SESS_BLOG_ID'] = $Id;
                            
                            $sql = "SELECT * FROM comments WHERE blog_id = $Id ORDER BY created_date DESC";
                            $result = mysqli_query($con, $sql);
                            while($row = mysqli_fetch_array($result))
                            {
                                echo "<div class='horLine'>";
                                echo "<div><h5 style='color: #87CEFA;'>".$row['comment_text']."</h4></div>";
                                $cmname = $row[comment_id];
                                
                                $next1 = "SELECT * FROM user_blogs WHERE blogs_id=$row[blog_id]";
                                $result122 = mysqli_query($con, $next1);
                                $row122 = mysqli_fetch_array($result122);
                                echo "<div style='display:inline-block;'><p style='margin-left:5px;' class=''>".$row122['blogs_name']."</p></div>";
                                
                                $next = "SELECT * FROM users WHERE user_id=$row[user_id]";
                                $result12 = mysqli_query($con, $next);
                                $row12 = mysqli_fetch_array($result12);
                                echo "<div style='display:inline-block;'><a href='#' style='margin-left:5px;' class=''>".$row12['usename']."</a></div>";
                                
                                if($row[user_id] == $_SESSION['SESS_USER_ID'])
                                {
                                    echo "<div style='display:inline-block;'><a class='glyphicon glyphicon-trash' href='' style='margin-left:5px;' id=$cmname  onclick = return(cmId(this.id))></a></div>";
                                }
                                echo "<div style='margin-left:65px; display:inline-block;'>Post on: ".substr($row['created_date'],0,10)."</div>";
                                echo "</div>";
                            }
                            
                            
                            
                            
                            
//                            echo "<div class='horLine' style='margin-bottom:20px;'>";
//                        $bgname = $row[blogs_id];
//                        echo "<div style='margin-left:5px;'><h3><a id=$bgname href='#' onclick = return(blogId(this.id)); >".$row['blogs_name']."</a></h3></div>";
//                        echo "<div style='margin-left:5px;'><h4 style='margin-left:15px;'>".$row['description']."</h4></div>";
//                        
//                        $next = "SELECT * FROM users WHERE user_id=$row[user_id]";
//                        $result12 = mysqli_query($con, $next);
//                        $row12 = mysqli_fetch_array($result12);
//                        echo "<div style='display:inline-block;'><h5  style='margin-left:5px; text-align:right;'><a href='#'>".$row12['usename']."</a></h5></div>";
//                        if($row[user_id] == $_SESSION['SESS_USER_ID'])
//                        {
//                            echo "<div style='display:inline-block;'><h5 style='margin-left:5px;'><a class='glyphicon glyphicon-trash' id=$bgname href='#' onclick = return(delId(this.id))></a></h5></div>";
//                        }
//                        echo '</div>';
                    ?>
                    
                </div>
                <div class="col-md-3">
                    
                </div>
            </div>
        </div>
        <script type='text/javascript'>
            function cmId(bgid)
            { 
                top.location.href = './deleteComment.php?idc='+bgid;
            }
        </script>
        <script type="text/javascript" src="/blog/assets/js/jquery.js"></script>
        <script type="text/javascript" src="/blog/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/blog/assets/js/holder.js"></script>
    </body>
</html>
