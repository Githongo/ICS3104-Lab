<?php
include_once "DBConnector.php";
include_once "user.php";


if(isset($_POST['btn-save'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $city = $_POST['city_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $user = new User ($first_name, $last_name, $city, $email, $phone);
    $res = $user->save();

    if($res){
        echo "save operation was successful";
    }
    else{
        echo "An error occured";
    }
}

?>                    
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>ICS 3104: IAP - Lab</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Form" name="keywords">
  <meta content="" name="description">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>                    
                    
                    
    <body>              
                    
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Sample Form</h3></div>
                        <div class="card-body">
                            <form  method="post">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName">First Name</label><input class="form-control py-4" id="inputFirstName" name="first_name" type="text" placeholder="Enter First name" required="true" /></div>
                                        </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="small mb-1" for="inputLastName">Last Name</label><input class="form-control py-4" id="inputLastName" name="last_name" type="text" placeholder="Enter Last name" required="true" /></div>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" id="inputEmailAddress" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" required="true" /></div>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="form-group"><label class="small mb-1" for="inputCity">City</label><input class="form-control py-4" id="inputCity" name="city_name" type="text" placeholder="Enter City" required="true" /></div>
                                    </div>
                                    
                                    <div class="col-md-8">
                                        <div class="form-group"><label class="small mb-1" for="inputPhone">Phone</label><input class="form-control py-4" id="inputPhone" name="phone" type="text" placeholder="e.g 0722334455" required="true" /></div>
                                    </div>
                                </div>
                                
                                <div class="form-group mt-4 mb-0"><button class="btn btn-info btn-block my-4" type="submit" name = "btn-save" value = "btn-save" >Sign up</button></div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </body>
</html>