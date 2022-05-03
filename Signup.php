<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <title>Signup</title>
</head>
<body>
    <form action="Signup.php" style="border:1px solid #ccc" method="POST">
        <div class="container">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <!-- <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" required> -->

            <!-- <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
            </label> -->

            <!-- <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p> -->

            <div class="clearfix">
                <!-- <button type="button" class="cancelbtn">Cancel</button> -->
                <button type="submit" class="signupbtn" name="signup">Sign Up</button>
                <button type="button" class="cancelbtn"><a href="login.php">Already registered? click</a></button>
            </div>
        </div>
    </form>
    <?php 
    if(isset($_POST['signup']))
    {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['psw'];

        if($email=='')  
        {  
            //javascript use for input checking  
            echo"<script>alert('Please enter the name')</script>";  
            exit();//this use if first is not work then other will not show  
        }  
    
        if($username=='')  
        {  
            echo"<script>alert('Please enter the password')</script>";  
            exit();  
        }  
    
        if($password=='')  
        {  
            echo"<script>alert('Please enter the email')</script>";  
            exit();  
        }  

        $connection = mysqli_connect('localhost','root','','able_jobs');
        if(!$connection){die("Connection Error -> ".mysqli_connect_error());}

        $check = "SELECT * FROM `registered_users` WHERE Email = '$email' or Username = '$username'";
        $result = mysqli_query($connection,$check);
        $num = mysqli_num_rows($result);

        if($num>0)
        {
            echo "<script>alert('User already exist in our database, Please try another username or email!')</script>";
        }
        else
        {
            $sql = "INSERT INTO `registered_users`(`Email`,`Username`,`Password`) VALUES('$email','$username','$password')";
            $result = mysqli_query($connection,$sql);
            if(!$result){die("Insertion Error -> ".mysqli_connect_error());}
            else{echo("Successfully Created account"); header("refresh:1; url=login.php");}
        }
    }
?>
        
</body>
</html>