
<?php
    require_once "Mail.php";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gen = $_POST['optionsRadios'];
    $username = $_POST['userName'];
    $pass = $_POST['pasword'];

    include 'config.php';
    

    $sql ="INSERT INTO users (user_name, email, date_of_birth, gender, password, usename) VALUES('$name','$email','$dob','$gen','$pass','$username')";

    if (!mysqli_query($con, $sql))
    {
      die('Error: ' . mysqli_error($con));
    }
    echo 'Information is sucsessfully updated....';


    

    $from = '<bloggshakya@gmail.com>';
    $to = "<$email>";
    $subject = 'Welcome Message';
    $body = "Hi $name, welcome in my Blog sites.......";

    $headers = array(
        'From' => $from,
        'To' => $to,
        'Subject' => $subject
    );

    $smtp = Mail::factory('smtp', array(
            'host' => 'ssl://smtp.gmail.com',
            'port' => '465',
            'auth' => true,
            'username' => 'bloggshakya@gmail.com',
            'password' => 'shakya1234'
        ));

    $mail = $smtp->send($to, $headers, $body);

    if (PEAR::isError($mail)) {
        echo('<p>' . $mail->getMessage() . '</p>');
    } else {
        echo('<p>Message successfully sent!</p>');
    }





    header("location: index.php");
    mysqli_close($con);
?>


