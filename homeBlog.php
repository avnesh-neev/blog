
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
                    <div class="onlycssmenu clearfix" style="margin-top:30px;">
                      <ul class="clearfix">
                        <li><a href="index.php" class="active"><span>Home</span></a></li>
                        <li><a href="homeBlog.php"><span>Blogs</span></a></li>
                        <li><a href="aboutBlog.php"><span>About Us</span></a></li>
                        <li><a href="#"><span>fdd</span></a></li>
                        <li class="nopipe"><a href="contactBlog.php"><span>Contact Us</span></a></li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-6 topMAr menu12">
                    <?php
                    $sql = "SELECT * FROM user_blogs";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($result))
                    {
                        $bgname = $row[blogs_id];
                        echo "<div class=' horLine' style='margin-bottom:5px;'>";
                        echo "<div><h3 id=$bgname><font style='size:12;'><u><b>".$row['blogs_name']."</b></u></font></h3></div>";
                        echo "<div>".$row['description']."</div>";
                        echo "<div style='color: #87CEFA; text-align:right; margin-left:5px;'>Created on: ".substr($row['created_time'],0,10)."</div>";
                        echo '</div>';
                    }
                    ?>
                    
                </div>
                <div class="col-md-3">
                   
                    
                </div>
            </div>
        </div>
        <script type="text/javascript" src="/blog/assets/js/jquery.js"></script>
        <script type="text/javascript" src="/blog/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/blog/assets/js/holder.js"></script>
    </body>
</html>
