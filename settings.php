<?php
    require_once('auth.php');
?>

<?php $mszz = $_GET['msz']; ?>


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
            .glow {
            text-shadow:-1px 0px 20px #0a008f;
            color:white;
        }
/*            .glyphicon-trash{color:;}*/
        </style>
        
        <script type="text/javascript">
            validatePassForm
            
            function validatePassForm()
            {
              if( document.passForm.oldPassword.value == "" )
              {
                alert( "Please enter your Old password!");
                document.passForm.oldPassword.focus();
                return false;
              }
              if( document.passForm.newPasword.value == "" )
              {
                alert( "Please enter your new password!");
                document.passForm.newPasword.focus();
                return false;
              }
              if( document.passForm.renewPasword.value == "" )
              {
                alert( "Please re-enter your new password!");
                document.passForm.renewPasword.focus();
                return false;
              }
              
              if(document.passForm.newPasword.value != document.passForm.renewPasword.value)
              {
                alert( "Please enter again your new password!");
                document.passForm.newPasword.focus();
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
                <div class="col-md-4" id=""></div>
                
                <div class="col-md-4" id="SignIn">
                <form  class="form-signin" method="POST" action="changePassword.php" name="passForm" onsubmit="return(validatePassForm());">
                    <h3 class="form-signin-heading glow" style ="color:#B452CD;">Change Password</h3>
                    <input style="margin-bottom:5px;" type="password" class="form-control" name="oldPassword" placeholder="Old Password" autofocus value="">
                    <input style="margin-bottom:5px;" type="password" class="form-control" name="newPasword" placeholder="New Password" value="">
                    <input style="margin-bottom:5px;" type="password" class="form-control" name="renewPasword" placeholder="Re-Enter New Password" value="">
                    
                    <button id="BtSignIn" class="btn btn-primary btn-block" type="submit">Sign in</button>
                    
                    <div id="addmsz"><p id='mszz1'><?php echo $mszz; ?></p> </div>
                </form>
                </div>
                
                <div class="col-md-4" id=""></div>
                
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
            
            setTimeout(function(){
              $('#mszz1').remove();
            }, 5000);
        </script>
        <script type="text/javascript" src="/blog/assets/js/jquery.js"></script>
        <script type="text/javascript" src="/blog/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/blog/assets/js/holder.js"></script>
    </body>
</html>
