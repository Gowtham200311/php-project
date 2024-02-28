<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:th="http://www.thymeleaf.org">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/cosmo/bootstrap.min.css" />
    <script src= "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>
    <style>
        body{
            background-image: url("http://localhost/task/image/hero-img.jpg");
            background-position: center;
            background-size: cover;
            position: relative;

            padding: 90px 20px;
            align-items: center;
        }
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            /*border-collapse: collapse;*/
            width: 100%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 3px solid rgba(255,255,255,0.1);
            box-shadow: 0 0 40px rgba(8,7,16,0.6);

        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){color: #f2f2f2}
        #customers tr:nth-child(odd){color: #f2f2f2}


        #customers tr:hover {background-color: #ddd;color: #000000}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
        h2 {
            color: #fff;
            font-size: 3rem;
            max-width: 630px;
            line-height: 65px;
        }
        h3 {
            color: #04AA6D;
            font-size: 3rem;
            max-width: 630px;
            line-height: 65px;
        }
    </style>
</head>
<body >

<div align="center">
    <br>
    <h2 > Expense You Payed</h2>
    <br>
    <br>
    <tr>

        <div class="col-sm-5" align = "center">
            <div class="panel-body" align = "center">
                <table id="customers">
                    <thead class="thead-dark">
                    <tr>
                        <th>S No.</th>
                        <th>Employee Id</th>
                        <th>Employee Name</th>
                        <th>Employee age</th>
                        <th>Employee Role</th>
                        
                    </tr>
                    </thead>
                    <?php
                 // Database connection
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "profile";


                  $conn = new mysqli($servername, $username, $password, $dbname);

                   if ($conn->connect_error) {
                   die("Connection failed: " . $conn->connect_error);
                   }

                   // Retrieve image data from the database
                    $sql = "SELECT * FROM list";
                    $result = $conn->query($sql);
                    ?>

                <?php
                  // Display images
   
                if ($result->num_rows > 0) {
        
       
                 while ($row = $result->fetch_assoc()) {
                 ?>
                    <tbody>
                        <?php  echo" <td >{$row['id']}</td>";?>
                        <?php  echo"  <td >{$row['e_id']}</td>";?>
                        <?php  echo" <td >{$row['e_name']}</td>";?>
                        <?php  echo"  <td >{$row['e_age']}</td>";?>
                        <?php  echo"  <td >{$row['e_role']}</td>";?>
                    </tr>
                    </tbody>
                    <?php
                          }
      
           } else {
            echo "No images found";
            }                                                                                     
             // Close database connection
               $conn->close();
               ?>
                </table>

            </div>

        </div>

    </tr>

    </tbody>
    </table>
    <form action="http://localhost/task/excel.php" method="post">
        <button type="submit" id="signUp">Go to view page in excel</button>
    </form>
    <form action="http://localhost/task/pdf.php" method="post">
        <button type="submit" id="signUp">Go to view page in pdf</button>
    </form>
</div>
</body>

</html>