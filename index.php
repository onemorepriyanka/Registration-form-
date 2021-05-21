<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
$server = "localhost";
$username = "root";
$password = "";


// Creat a database connection
$con = mysqli_connect($server, $username, $password);
 
// Check for connection success
if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}

// collect post variables
$name=$_POST['name'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$desc=$_POST['desc'];
$sql = "INSERT INTO `laddakhtrip`.`laddakhtrip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name',
'$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
//echo $sql;
// execute the query

if($con->query($sql)== true){
    //echo"Successfully inserted ";

    // flag for successful insertion
    $insert=true;
}
else{
    echo "ERROR: $sql <br> $con->error";
    //$not_insert = true;
}
 
// close the database connection
$con->close();
}
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@1,200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="clg.jpg" alt="NIT Srinagar">
    <div class="container">
        <h2>Welcome to NIT Srinagar Laddakh Trip form</h2><br>
        <h4>Enter your details and submit this form to confirm your participation in the trip <h4><br>
        <?php
        if($insert==true){
            echo" <p class='submitMsg'>Thanks for submitting your form.We are happy to see you joining us for the Laddakh
                    trip
                  <p>";
        }
        ?>

                <form action="index.php" method="post">
                    <input type="text" name="name" id="name" placeholder="Enter your name">
                    <input type="text" name="age" id="age" placeholder="Enter your age">
                    <input type="text" name="gender" id="gender" placeholder="Enter your gender ">
                    <input type="email" name="email" id="email" placeholder="Enter your email">
                    <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
                    <textarea name="desc" id="desc" cols="30" rows="10"
                        placeholder="Enter any other information here"></textarea>
                    <button class="btn">Submit</button>


                </form>
    </div>
    <script src="index.js"></script>
    

</body>

</html>