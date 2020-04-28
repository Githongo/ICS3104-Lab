<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location:login.php");
    }
?>

<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>ICS 3104: IAP - Lab</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

 

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>                    
                    
                    
    <body>
    <div class="container">
        
            <p>This is a private page</p>
            <p>We want to protect it....</p><br><br>

            <p><a href="logout.php">Logout</a></p><br><br>
        <p>Lab one task:</p>
        <div class="table-responsive m-4" id="readAllTable">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">City</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include_once "DBConnector.php";
                        include_once "user.php";
                        $res = user::readAll();
                        
                        while ($row = mysqli_fetch_array($res)){
                            echo "
                                <tr>
                                    <td>".$row['id']."</td>
                                    <td>".$row['first_name']."</td>
                                    <td>".$row['last_name']."</td>
                                    <td>".$row['user_city']."</td>
                                    <td>".$row['user_email']."</td>
                                    <td>".$row['user_phone']."</td>
                                      
                                </tr>
                                ";
                        
                        
                        }
                    ?>
                    </tbody>
                </table>
                </div>
            
        </div>
    
    </body>


</html>