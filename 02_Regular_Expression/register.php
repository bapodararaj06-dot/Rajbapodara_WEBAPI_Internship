<?php

$fnameErr = $mnameErr = $lnameErr = $cityErr = "";
$emailErr = $contactErr = $genderErr = $aadharErr = "";
$panErr = $usernameErr = $passwordErr = $cpasswordErr = "";
$success = "";

if(isset($_POST['submit']))
{
    $fname = trim($_POST['fname']);
    $mname = trim($_POST['mname']);
    $lname = trim($_POST['lname']);
    $city = trim($_POST['city']);
    $email = trim($_POST['email']);
    $contact = trim($_POST['contact']);
    $gender = $_POST['gender'] ?? '';
    $aadhar = trim($_POST['aadhar']);
    $pan = strtoupper(trim($_POST['pan']));
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if(!preg_match("/^[A-Za-z]{2,20}$/",$fname))
        $fnameErr = "Invalid First Name";

    if(!preg_match("/^[A-Za-z]{2,20}$/",$mname))
        $mnameErr = "Invalid Middle Name";

    if(!preg_match("/^[A-Za-z]{2,20}$/",$lname))
        $lnameErr = "Invalid Last Name";

    if(!preg_match("/^[A-Za-z ]{2,30}$/",$city))
        $cityErr = "Invalid City";

    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        $emailErr = "Invalid Email";

    if(!preg_match("/^[0-9]{10}$/",$contact))
        $contactErr = "Invalid Contact Number";

    if(empty($gender))
        $genderErr = "Select Gender";

    if(!preg_match("/^[0-9]{12}$/",$aadhar))
        $aadharErr = "Invalid Aadhaar Number";

    if(!preg_match("/^[A-Z]{5}[0-9]{4}[A-Z]$/",$pan))
        $panErr = "Invalid PAN Number";

    if(!preg_match("/^[A-Za-z0-9_]{5,15}$/",$username))
        $usernameErr = "Invalid Username";

    if(!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{8,}$/",$password))
        $passwordErr = "Password must contain Uppercase, Lowercase, Number and minimum 8 characters";

    if($password != $cpassword)
        $cpasswordErr = "Passwords do not match";

    if(
        empty($fnameErr) &&
        empty($mnameErr) &&
        empty($lnameErr) &&
        empty($cityErr) &&
        empty($emailErr) &&
        empty($contactErr) &&
        empty($genderErr) &&
        empty($aadharErr) &&
        empty($panErr) &&
        empty($usernameErr) &&
        empty($passwordErr) &&
        empty($cpasswordErr)
    )
    {
        $success = "Registration Successful";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Registration Form</title>

<style>

body{
    font-family:Arial;
    background:#1409e1;
}

.container{
    width:500px;
    margin:20px auto;
    background:white;
    padding:20px;
    border-radius:10px;
}

input[type=text],
input[type=password]{
    width:100%;
    padding:10px;
    margin-top:5px;
    border:1px solid #ccc;
    border-radius:5px;
    box-sizing:border-box;
}

.btn{
    width:100%;
    padding:10px;
    background:#1409e1;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

.error{
    color:red;
    font-size:14px;
    margin-bottom:10px;
}

.success{
    color:green;
    font-weight:bold;
    text-align:center;
    margin-bottom:15px;
}

</style>
</head>
<body>

<div class="container">

<h2 align="center">Registration Form</h2>

<?php
if($success!="")
{
    echo "<div class='success'>$success</div>";
}
?>

<form method="post">

First Name
<input type="text" name="fname" value="<?php echo $_POST['fname'] ?? ''; ?>">
<div class="error"><?php echo $fnameErr; ?></div>

Middle Name
<input type="text" name="mname" value="<?php echo $_POST['mname'] ?? ''; ?>">
<div class="error"><?php echo $mnameErr; ?></div>

Last Name
<input type="text" name="lname" value="<?php echo $_POST['lname'] ?? ''; ?>">
<div class="error"><?php echo $lnameErr; ?></div>

City
<input type="text" name="city" value="<?php echo $_POST['city'] ?? ''; ?>">
<div class="error"><?php echo $cityErr; ?></div>

Email
<input type="text" name="email" value="<?php echo $_POST['email'] ?? ''; ?>">
<div class="error"><?php echo $emailErr; ?></div>

Contact
<input type="text" name="contact" value="<?php echo $_POST['contact'] ?? ''; ?>">
<div class="error"><?php echo $contactErr; ?></div>

Gender<br>
<input type="radio" name="gender" value="Male"> Male
<input type="radio" name="gender" value="Female"> Female
<div class="error"><?php echo $genderErr; ?></div>

Aadhaar
<input type="text" name="aadhar" value="<?php echo $_POST['aadhar'] ?? ''; ?>">
<div class="error"><?php echo $aadharErr; ?></div>

PAN
<input type="text" name="pan" value="<?php echo $_POST['pan'] ?? ''; ?>">
<div class="error"><?php echo $panErr; ?></div>

Username
<input type="text" name="username" value="<?php echo $_POST['username'] ?? ''; ?>">
<div class="error"><?php echo $usernameErr; ?></div>

Password
<input type="password" name="password">
<div class="error"><?php echo $passwordErr; ?></div>

Confirm Password
<input type="password" name="cpassword">
<div class="error"><?php echo $cpasswordErr; ?></div>

<input type="submit" name="submit" value="Register" class="btn">

</form>

</div>

</body>
</html>
