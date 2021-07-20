<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!---header-->
    <style>
        main {
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(#32dbdb, #17c8e3, #24b6f0, #218cde);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        
        div {

            max-width: 500px;
            height: auto;
            background-color:#b954f7;
            padding: 50px 30px;
            box-shadow: 1px 1px 15px 3px #2d3436;
        }
        
        h1 {
            margin-bottom: 10px;
            text-shadow: 1px 2px 1px white;
            text-transform: capitalize;
            text-align: center;
        }
        lable{
            display: block;
            text-transform: capitalize;
            margin-bottom: 10px;
            max-width: 100px;
        }
        button {
            margin-top: 20px;
            display: block;

        }
    </style>
</head>

<body>
    <form action="Register.php" method="POST">

    <main>
        <div>

            <h1>Register on MYKNOT</h1>
            <lable class="">First name</lable>
            <input type="text" name="fname" placeholder="Enter your first name" required="true">
            <br>
            <lable>Last name </lable>
            <input type="text" name="lname" placeholder="Enter your last name" required="true" >
            <br>
            <lable>Email</lable>
            <input type="text" name="email" placeholder="Email Id" >
            <br>
            <lable>Contact</lable>
            <input type="text" name="phone" placeholder="Contact no." >
            <br>
            <lable>Address</lable>
            <input type="text" name="address" placeholder="Address" ><BR>
            <lable>Company</lable>
            <input type="text" name="company name" placeholder="company name" ><br>

            <button type ="submit">TOTAL</button>
       </div>
    </main>
    </form>
   

</body>


</html>
<?php
    $con =mysqli_connect("localhost","root","","database name")or die (mysqli_error($con));
     if(!isset($_SESSION['email'])){
        session_start();
    } 

    $fname = $_POST['fname'];
    $fname = mysqli_real_escape_string($con , $fname);

     $lname = $_POST['lname'];
    $lname = mysqli_real_escape_string($con , $lname);
 
    $phone = $_POST['phone'];
    $phone = mysqli_real_escape_string($con , $phone);
   
    $email = $_POST['sub_email'];
    $email = mysqli_real_escape_string($con , $email);

    

    $address= $_POST['address'];
    $address = mysqli_real_escape_string($con , $address);
    

     $company_name= $_POST['company_name'];
    $company_name = mysqli_real_escape_string($con , $company_name);

   
    $email_regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
    $contact_regex = "/^[789][0-9]{9}$/";

    //check whether email already exists
    $select_query = "SELECT * from database name WHERE email = '$email'";
    $select_query_result = mysqli_query($con , $select_query) or die(mysqli_error($con));
    $select_rows = mysqli_num_rows($select_query_result);
    if($select_rows!=0){
        $error = "<span class='red'>Email Already Exists</span>";
        header('location:form.php?m2='.$error);
    }///else if(!preg_match($email_regex , $email)){
        //$error = "<span class='red'>Incorrect Email Id</span>";
       // header('location:form.php?m2='.$error);
    //else if(!preg_match($contact_regex , $contact )){
        //$error = "<span class='red'>Incorrect Contact Number</span>";
       // header('location:form.php?m1='.$error);
    
    //if not then add to DB
    else{
        $insert_query = "INSERT INTO table name(fname,lname,email,phone,address ,company_name) VALUES ('$fname','$lname','$email','$phone','$address','$company_name')";
        $inser_query_result = mysqli_query($con , $insert_query) or die(mysqli_error($con));
        $user_id = mysqli_insert_id($con);
        $_SESSION['id'] = $id;
        $_SESSION['email'] = $email;
        header('location:register.php');
    }



?>


