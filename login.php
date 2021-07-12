<?php

    $conn = mysqli_connect("localhost","root","","confirm");


    if(isset($_POST['btnSign'])){
        $firstName = trim(htmlspecialchars(stripcslashes($_POST['firstName'])));
        $lastName = trim(htmlspecialchars(stripcslashes($_POST['lastName'])));
        $userName = trim(htmlspecialchars(stripcslashes($_POST['userName'])));
        $password = trim(htmlspecialchars(stripcslashes($_POST['password'])));

        $firstName = mysqli_real_escape_string($conn,$firstName);
        $lastName = mysqli_real_escape_string($conn,$lastName);
        $userName = mysqli_real_escape_string($conn,$userName);
        $password = mysqli_real_escape_string($conn,$password);

        $query = mysqli_query($conn,"INSERT INTO users (first_name,last_name,user_name,`password`) VALUES ('$firstName','$lastName','$userName','$password')");
        if(!$query){
            exit(mysqli_error($conn));
        }else{
            header("location:inserted.php?ins=$userName");
        }

    }



    if(isset($_POST['btnLog'])){
      
        $userName = trim(htmlspecialchars(stripcslashes($_POST['userName'])));
        $password = trim(htmlspecialchars(stripcslashes($_POST['password'])));

      
        $userName = mysqli_real_escape_string($conn,$userName);
        $password = mysqli_real_escape_string($conn,$password);

        $query = mysqli_query($conn,"SELECT * FROM users WHERE user_name = '$userName' AND `password` = '$password'");
        if(mysqli_num_rows($query) == 0){
            exit("no such user");
        }else{
            header("location:logged.php?logged=$userName");
        }

    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./bs4/css/bootstrap.css">
</head>
<body>
    <div class="row m-3 mt-5">
       <div class="log col-md-6 shadow-sm rounded p-4">
        <form action="" class=" " id="access" method="post">
            <h3>Login</h3>

            <div class="form-group mt-4">
              <label for="" class="font-weight-bold">*UserName</label>
              <input type="text"
                class="form-control" name="userName" id="" aria-describedby="helpId" placeholder="UserName">
            </div>
            <div class="form-group mt-4">
                <label for="" class="font-weight-bold">*Password</label>
                <input type="password"
                  class="form-control" name="password" id="" aria-describedby="helpId" placeholder="Password">
              </div>
              <div class="form-group mt-4">
                <input type="checkbox"> Show Password
              </div>
             
        </form>
        <button data-toggle="modal" data-target="#login" class="btn btn-primary btn-block rounded">Login</button><br>
        <h6><a href="#">Forgotten Password?</a></h6>
       </div>



      <div class="reg col-md-6 shadow-sm rounded m- p-4">
        <form action="" class=" " id="create" method="post">
            <h3>SignUp</h3>

            <div class="form-group mt-4">
              <label for="" class="font-weight-bold">*First Name</label>
              <input type="text"
                class="form-control" name="firstName" id="" aria-describedby="helpId" placeholder="First Name">
            </div>
            <div class="form-group mt-4">
                <label for="" class="font-weight-bold">*Last Name</label>
                <input type="text"
                  class="form-control" name="lastName" id="" aria-describedby="helpId" placeholder="Last Name">
              </div>
              <div class="form-group mt-4">
                <label for="" class="font-weight-bold">*UserName</label>
                <input type="text"
                  class="form-control" name="userName" id="" aria-describedby="helpId" placeholder="UserName">
              </div>
            <div class="form-group mt-4">
                <label for="" class="font-weight-bold">*Password</label>
                <input type="password"
                  class="form-control" name="password" id="" aria-describedby="helpId" placeholder="Password">
              </div>
              <div class="form-group mt-4">
                <input type="checkbox"> Show Password
              </div>
             
        </form>
        <button data-toggle="modal" data-target="#signUp" class="btn btn-primary btn-block rounded">SignUp</button><br>
        <h6><a href="#">Forgotten Password?</a></h6>
      </div>
    </div>


    
    <!--SIGN UP Modal STARTS -->
    <div class="modal fade" id="signUp" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to sign up?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" name="btnSign" class="btn btn-primary" form="create">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- SIGNUP MODAL ENDS -->

    <!-- LOGIN MODAL STARTS -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to login?

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" name="btnLog" class="btn btn-primary" form="access">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGIN MODAL ENDS -->

    <script src="./bs4/js/jquery-3.5.1.min.js"></script>
    <script src="./bs4/js/bootstrap.js"></script>
</body>
</html>