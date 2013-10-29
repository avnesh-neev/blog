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
                border-left: 1px solid black;
                border-right: 1px solid black;
            }
        </style>
        <script type="text/javascript">
            function blogFunc()
            {
              if( document.blogForm.blogName.value == "" )
              {
                alert( "Please enter Blog Name!");
                document.blogForm.blogName.focus();
                return false;
              }
              if( document.blogForm.desc.value == "" )
              {
                alert( "Please write some description!");
                document.blogForm.desc.focus();
                return false;
              }
            }
        </script>
    </head>
    <body>
        
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
                        <li><a href="#"><span>saa aas</span></a></li>
                        <li><a href="settings.php"><span>Settings</span></a></li>
                        <li><a href="blogger.php"><span>Create Blog</span></a></li>
                        <li class="nopipe"><a href="logout.php"><span>Logout</span></a></li>
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
                    <form class="form-signin" method="POST" action="createblog.php" name="blogForm" onsubmit="return(blogFunc());">
                        <h2 class="form-signin-heading">Create a Blog:</h2>
                        <input type="text" class="form-control" name="blogName" id="blogName" placeholder="Blog Name" autofocus>
                        <textarea class="form-control" rows="3" name="desc" id="desc" placeholder="Description"></textarea>
                        <div class="wrapper topMAr">
                            <button class="btn btn-primary" type="submit">create</button>
                        </div>
                    </form>
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
