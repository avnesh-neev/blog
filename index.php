
<?php
session_start();
include 'config.php';
if(isset($_SESSION['SESS_FIRST_NAME']) && isset($_SESSION['SESS_LAST_NAME']))
{
    
    $username = $_SESSION['SESS_FIRST_NAME'];
    $password = $_SESSION['SESS_LAST_NAME'];
    $query = "SELECT * FROM users WHERE usename = '$username' AND password = '$password'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $member = mysqli_fetch_assoc($result);
        $_SESSION['SESS_USER_ID'] = $member['user_id'];
        $_SESSION['SESS_FIRST_NAME'] = $member['usename'];
        $_SESSION['SESS_LAST_NAME'] = $member['password'];
        // Set the session 'loggedin' to 1 and forward the user to the admin page
        header('Location: blogName.php');
        exit();
    }
}
?>

<?php
session_start();
include 'config.php';
if(isset($_COOKIE['avneshCookUser']) && isset($_COOKIE['avneshCookPass']))
// If the cookie 'Joe2Torials is set, do the following;
{
    
    $username = $_COOKIE['avneshCookUser'];
    // Select the username from the cookie
    $password = $_COOKIE['avneshCookPass'];
    // Select the password from the cookie
}
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
        <link href="justified-nav.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script type="text/javascript">
            $(function()
            {
                $('#dp3').datepicker();
            });
        </script>
        <script type=text/javascript>
            function validateForm()
            {
              var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
              var email = document.getElementById('email');
              if( document.myForm.name.value == "" )
              {
                alert( "Please Enter your name!");
                document.myForm.name.focus();
                return false;
              }
              if(/^([a­zA­Z ])+$/.test(document.myForm.name.value))
              {
                alert('Name should be alphanumeric');
                document.myForm.name.focus();
                return false;
              }
              if((document.myForm.name.value).length>20)
              {
                alert("Name should be <=20 character");
                return false;
              }
              if( document.myForm.dob.value == "" )
              {
                alert( "Please Enter your D.O.B.!");
                document.myForm.dob.focus();
                return false;
              }
              if (!filter.test(email.value))
              {
                alert('Please provide a valid email address');
                email.focus;
                return false;
              }
              
              if( document.myForm.userName.value == "" )
              {
                alert( "Please enter your User Name!");
                document.myForm.userName.focus();
                return false;
              }
              if(/^([a­zA­Z0­9])+$/.test(document.myForm.userName.value))
              {
                alert('User Name should be alphanumeric');
                document.myForm.userName.focus();
                return false;
              }
              if((document.myForm.userName.value).length>20)
              {
                alert("User Name should be <=20 character");
                return false;
              }
              if( document.myForm.pasword.value == "" )
              {
                alert( "Please enter your password!");
                document.myForm.pasword.focus();
                return false;
              }
              if( document.myForm.repasword.value == "" )
              {
                alert( "Please re-enter your password!");
                document.myForm.repasword.focus();
                return false;
              }
              if( document.myForm.pasword.value != document.myForm.repasword.value)
              {
                alert( "your passwords do not match");
                document.myForm.pasword.focus();
                return false;
              }
            }
            
            
            function validateSignForm()
            {
              if( document.mySignForm.userName.value == "" )
              {
                alert( "Please enter your User Name!");
                document.mySignForm.userName.focus();
                return false;
              }
              if( document.mySignForm.pasword.value == "" )
              {
                alert( "Please enter your password!");
                document.mySignForm.pasword.focus();
                return false;
              }
            }
        </script>
        <style type="text/css">
            .span2{width: 126px;}
            .glyphicon-calendar{width: 400px; height: 200px;}
            .ulBullet
            {
              list-style-type: none;
              padding:0;
              margin:0;
            }
            .leftcol{ float:left }
            .topMAr{margin-top: 5px;}
            
            #RegistrationForm {
            display:none;
           
        }
        .rightborder {
        
        }
        .vr {
            width: 10px;
            background-color: #000;
           
            top: 0;
            bottom: 0;
            left: 150px;
        }
        .glow {
            text-shadow:-1px 0px 20px #0a008f;
            color:white;
        }
        .dead {
         text-shadow:-1px 0px 20px #575454;
         color:white;
        }
        .btn-primary{background-color:#DA70D6;}
        .btn-primary:hover{background-color: #FFBBFF;}
        .glyphicon-calendar{color: #DA70D6;}
        </style>
    </head>
    <body style="">
       <div class="container">
        </div>
        
        
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                    <img src="logo1.jpg" class="img-responsive" style="height:100px; width: 100px;">
                </div>
                <div class="col-md-11">
                    <div class="onlycssmenu clearfix" style="margin-top:30px;">
                      <ul class="clearfix">
                        <li><a href="#" class="active"><span>Home</span></a></li>
                        <li><a href="homeBlog.php"><span>Blogs</span></a></li>
                        <li><a href="aboutBlog.php"><span>About Us</span></a></li>
                        <li><a href="#"><span>fdd</span></a></li>
                        <li class="nopipe"><a href="contactBlog.php"><span>Contact Us</span></a></li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row">
            <img src="images/logo15.png" class="img-responsive" style="height:300px; width: 1400px;">
        </div>
        
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4" id="RegistrationForm">
                <form class="form-signin" method="POST" action="checkMail.php" name="myForm" onsubmit="return(validateForm());">
                    <h2 class="form-signin-heading glow"  style ="color:#B452CD;">Create Account:</h2>
                    <input type="text" class="form-control" name="name" placeholder="Full Name" autofocus>
                    
                        <div class="input-append date" id="dp3" data-date-format="dd-mm-yyyy">
                            <ul class="ulBullet"><li class="leftcol"><input class="form-control span2" name="dob" size="16" type="text" readonly placeholder="Date Of birth"></li><li class="leftcol" style="margin-left: 10px; margin-top: 8px;"><span class="add-on"><i class="glyphicon glyphicon-calendar" style="float: right;"></i></span></li></ul>
                        </div>
                    
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email address" autofocus>
                
                    <div class="radio-inline">
                      <label>
                        <input type="radio" name="optionsRadios" id="male" value="male" checked>
                        Male
                      </label>
                    </div>
                    
                    <div class="radio-inline">
                      <label>
                        <input type="radio" name="optionsRadios" id="female" value="female">
                        Female
                      </label>
                    </div>
                    <input type="text" class="form-control" name="userName" placeholder="User Name" autofocus>
                    <input type="password" class="form-control" id="pasword" name="pasword" placeholder="Password">
                    <input type="password" class="form-control" id="repasword" name="repasword" placeholder="Re-enter Password">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Register Me</button>
                </form>
            </div>
            
            
            <div class="col-md-4" id="SignIn">
                <form  class="form-signin" method="POST" action="signProcess.php" name="mySignForm" onsubmit="return(validateSignForm());">
                    <h2 class="form-signin-heading glow" style ="color:#B452CD;">Please sign in</h2>
                    <input type="text" class="form-control" name="userName" placeholder="User Name" autofocus value="<?php echo $username; ?>">
                    <input type="password" class="form-control" name="pasword" placeholder="Password" value="<?php echo $password; ?>">
                    <label class="checkbox">
                      <input type="checkbox" name="remember" value="remember"> Remember me
                    </label>
                    <button id="BtSignIn" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                    <a id="NewUser" href="#"><h3 class="glow" style="color:#E066FF">Are you New User?</h3></a>
                    
                </form>
                <div id="addmsz"><p id='mszz1'><?php echo $mszz; ?></p> </div>
            </div>
            
            
            
        </div>

    </div>
        <script type="text/javascript">
            $(document).ready(function () {
            $("#NewUser").click(function () {
               

                $("#RegistrationForm").show("slow", function () {
                    $("#SignIn input").attr("disabled", true);
<!--                    $("#SignIn #Label5").removeClass("glow").addClass("dead");-->
                    $("#SignIn #BtSignIn").removeClass("btn-success").addClass("btn-active");
                    $("#NewUser").unbind('click');

                });
                $("#SignIn").hide('slow');
                
                
            });


            
        });

            setTimeout(function(){
              $('#mszz1').remove();
            }, 5000);

        </script>
<!--        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>-->
        <script type="text/javascript" src="/blog/assets/js/jquery.js"></script>
        <script type="text/javascript" src="/blog/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/blog/assets/js/holder.js"></script>
        <script type="text/javascript" src="/blog/eternicode-bootstrap/js/bootstrap-datepicker.js"></script>
    </body>
</html>
