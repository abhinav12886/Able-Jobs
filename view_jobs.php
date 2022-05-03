<!DOCTYPE html>
<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> <!--css file link in bootstrap folder-->  
    <title>View Jobs</title>  
</head>  
<style>  
    .login-panel {  
        margin-top: 150px;  
    }  
    .table {  
        margin-top: 50px;  
     }  
</style>  
  
<body>  
  
<div class="table-scrol">  
    <h1 align="center">All the Openings</h1>  
  
    <div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
        <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
            <thead>  
    
            <tr>  
    
                <th>Job Role</th>  
                <th>Job Description</th>
                <th>Address</th>  
                <th>Contact No.</th>    
            </tr>  
            </thead>  
    
            <?php  
            
            $connection = mysqli_connect('localhost','root','','able_jobs');
            if(!$connection){die("Connection Error -> ".mysqli_connect_error());}

            $view_users_query="select * from job_list";//select query for viewing users.  
            $run=mysqli_query($connection,$view_users_query);//here run the sql query.  
    
            while($row=mysqli_fetch_array($run))//while loop to fetch the result and store in an array $row.  
            {  
                $job_role=$row[0];  
                $job_desc=$row[1];
                $address = $row[2];    
                $contact=$row[3];    
    
            ?>  
    
            <tr>  
    <!--here showing results in the table -->  
                <td><?php echo $job_role;  ?></td>  
                <td><?php echo $job_desc;  ?></td>  
                <td><?php echo $address;  ?></td>      
                <td><?php echo $contact;  ?></td>
            </tr>  
    
            <?php } ?>  
    
        </table>  
    </div>  
</div>  
</body>  
  
</html>  
