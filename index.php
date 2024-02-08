<?php
 
 include("config.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action = "<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method = "post">
    <h2>Registration Form</h2>
    name:<br>
    <input type="text" name="name"><br>
    email:<br>
    <input type = "text" name ="email"><br>
    password:<br>
    <input type ="password" name="password"><br>
    <input type = "submit" name="submit" value="register"> 
</form>
</body>
</html>
<?php 
   
   if($_SERVER["REQUEST_METHOD" ] == "POST"){

    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($name)){
        echo "Please enter a name";
    }
    elseif(empty($email)){
        echo "Please enter a valid email";
    }
    elseif(empty($password)){
        echo "please enter a password";
    }
    else{
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO info (name, email, password) VALUES ('$name', '$email', '$hash') ";
        
        try {
            mysqli_query($conn, $sql);
            echo "Successfully registered";
        } catch (mysqli_sql_exception) {
            echo "The email already exists";
        }
    }
   }
mysqli_close($conn);
?>