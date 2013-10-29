
<?php

include('config.php');

// Passkey that got from link 
$passkey=$_GET['passkey'];

// Retrieve data from table where row that match this passkey 
$sql1="SELECT * FROM verifyMail WHERE confirm_code ='$passkey'";
$result1=mysqli_query($con, $sql1);

// If successfully queried 
if($result1)
{

    // Count how many row has this passkey
    $count=mysqli_num_rows($result1);

    // if found this passkey in our database, retrieve data from table "temp_members_db"
    if($count==1)
    {

        $rows = mysqli_fetch_array($result1);

        $name = $rows['user_name'];
        $email = $rows['email'];
        $dob = $rows['date_of_birth']; 
        $gen = $rows['gender'];
        $pass = $rows['password'];
        $username = $rows['usename'];

        // Insert data that retrieves from "temp_members_db" into table "registered_members" 
        $sql2="INSERT INTO users(user_name, email, date_of_birth, gender, password, usename) VALUES('$name','$email','$dob','$gen','$pass','$username')";
        $result2=mysqli_query($sql2);

        if (!mysqli_query($con, $sql2))
        {
          die('Error: ' . mysqli_error($con));
        }
        $msz = "Hurry, Your account has been activate.";
        header("location: index.php?msz=$msz");
        exit ();
    }
    else
    {
        $ms = "Wrong Confirmation code";
        header("location: index.php?msz=$ms");
    }

}
?>