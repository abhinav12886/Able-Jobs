<?php  
session_start();//session starts here  
  
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <title>login</title>
</head>
<body>
<header class="text-gray-600 body-font">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl">Able Jobs</span>
    </a>
    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
      <!-- <a class="mr-5 hover:text-gray-900">First Link</a>
      <a class="mr-5 hover:text-gray-900">Second Link</a>
      <a class="mr-5 hover:text-gray-900">Third Link</a>
      <a class="mr-5 hover:text-gray-900">Fourth Link</a> -->
    </nav>
  </div>
</header>
    <form action="login.php" method="POST">

        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit" name="login">Login</button>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn"><a href="Signup.php">Not yet register? click</a></button>
            
        </div>
    </form>
    
    
<?php
    if(isset($_POST['login']))
    {

        $username = $_POST['uname'];
        $password = $_POST['psw'];

        $connection = mysqli_connect('localhost','root','','able_jobs');
        if(!$connection){die("Connection Error -> ".mysqli_connect_error());}

        $sql = "SELECT * FROM `registered_users` WHERE Username = '$username' && Password = '$password'";
        $result = mysqli_query($connection, $sql);
        $num = mysqli_num_rows($result);
        if($num==1)
        {
            echo "LOGIN SUCCESSFUL";
            header("refresh:1, url=job_posting.php");
        }
        else
        {
            echo "<script>alert('incorrect id or password')</script>";
            echo "<script>location.href='login.php'</script>";
        }
    }
?>
    
</body>
</html>