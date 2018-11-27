<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Build Empire- Step1</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/bootstrap-datepicker3.min.css">

    <script type="text/javascript" src="/js/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/form.js"> </script>
    <script type="text/javascript" src="/js/bootstrap-datepicker.min.js"></script>

</head>

<body>

<div class="container">

    <form id="register_form" action="/step1" method="post">

        <h1>Step 1 - Add User Info</h1>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="password">Password*</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="email">Email address*</label>
            <input type="email" class="form-control" required id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="phone">Phone number*</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number">
        </div>


        <input type="submit" name="sbt_step1" class="submit btn btn-success" value="Next" />
    </form>
</div>

</body>
</html>
