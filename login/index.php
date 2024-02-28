<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>login page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Employee Register Page</h2>
<div class="container" id="container">
    <div class="form-container sign-in-container">
   

 
        <form method='post'enctype='multipart/form-data'>
        <?php
          //Database Connection
          $con = mysqli_connect("localhost","root","","profile");
          $message = "";
          if(isset($_POST['e_name'])){

            $name = $_POST['e_name'];
            $role = $_POST['e_role'];
            $age = $_POST['e_age'];
            $id = $_POST['e_id'];
            if (strlen($id) == 1) {
              $id = '00' . $id;
    
            } elseif (strlen($id) == 2) {
               $id = '0' . $id;
            }
            $e_id = "E" . ($id);

                //Save image name in database
                $sql ="insert into list(e_name, e_id, e_age, e_role) values ('{$name}','{$e_id}','{$age}','{$role}')";
                if($con->query($sql)){
                    $message = "<div class='alert alert-success'>New Record Created Successfully.</div>";
                }else{
                  $message = "";
                }
              }else{
                $message = "";
              }
        ?>
            <h1>Employee List</h1>
            <input type="text"  name="e_id" placeholder="Employee ID" />
            <input type="text" name="e_name" placeholder="Employee Name" />
            <input type="text" name="e_age" placeholder="Employee Age" />
            <input type="text" name="e_role" placeholder="Employee Role" />
            <button type='submit' name='submit' value='Submit'>Submit</button>
        </form>
        
            </div>
 
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-right">
                <h1>Hello!!</h1>
                <p>View Employee details!!</p>
                <div>
                <form action="http://localhost/task/display/" method="post">
        <button type="submit" id="signUp">Go to view page</button>
    </form>  
            </div>
    </div>
</div>


<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>