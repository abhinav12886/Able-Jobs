<!DOCTYPE html>
<html lang="en">
<head>
  <title>Job Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Post A Job Opening</h2>
  <form action="job_form.php" method="POST">
    <label for="job_role" class="form-label">Select Job Role*:-</label>
    <select class="form-select" id="job_role" name="job_role">
        <option>Business Development Executive</option>
        <option>Customer Support Voice</option>
        <option>Customer Support Non-Voice</option>
        <option>Inside Sales</option>
        <option>Field Sales</option>
        <option>Content Writing</option>
        <option>Digital Marketing</option>
        <option>Community Management</option>
    </select>
    <div class="form-group">
        <label for="FormControlTextarea1">Job Description*</label>
        <textarea name="job_desc" class="form-control" id="FormControlTextarea1" rows="3" required></textarea>
    </div>
    <div class="form-group">
        <label for="FormControlTextarea1">Address*</label>
        <textarea name="address" class="form-control" id="FormControlTextarea1" rows="3" required></textarea>
    </div>
    <div class="form-group">
        <label for="FormControlTextarea1">Phone No. for coordination*:</label>
        <input class="form-control" id="FormControlTextarea1" type="tel" name="phone" placeholder="Enter 10 digit mobile number" required>
    </div>
    <button type="submit" name="job_subm" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php
    if(isset($_POST['job_subm']))
    {

        $job_role = $_POST['job_role'];
        $job_desc = $_POST['job_desc'];
        $address = $_POST['address'];
        $phone_no = $_POST['phone'];

        $connection = mysqli_connect('localhost','root','','able_jobs');
        if(!$connection){die("Connection Error -> ".mysqli_connect_error());}

        $sql = "INSERT INTO `job_list`(`job_role`,`job_description`,`address`,`phone_no.`) VALUES('$job_role','$job_desc','$address','$phone_no')";
        $result = mysqli_query($connection,$sql);
        if(!$result)
        {
            die("Insertion Error -> ".mysqli_connect_error());
        }
        else
        {
            echo "<script>alert('job posted')</script>";
            echo "<script>location.href='job_posting.php'</script>";
        }
    }
?>

</body>
</html>
