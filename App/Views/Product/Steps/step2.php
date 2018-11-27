<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Build Empire- Step2</title>

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

    <form id="register_form" action="/step2" method="post">

        <h1>Step 2 - Add product</h1>
        <div class="form-group">
            <label for="product_type_id">Product type</label>
            <select class="form-control" name="product_type_id" id="product_type_id"></select>
        </div>

        <div class="form-group">
            <label for="product_id">Product</label>
            <select class="form-control" name="product_id" id="product_id"></select>
        </div>

        <div class="form-group" id="quantity_input" style="display: none;">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" name="quantity" id="quantity" placeholder="1">
        </div>

        <div class="form-group" id="start_date_input" style="display: none;">
            <label for="start_date">Start date</label>
            <input class="form-control datepicker" name="start_date" id="start_date" >
        </div>

        <div class="form-group" id="end_date_input" style="display: none;">
            <label for="end_date">End date</label>
            <input class="form-control datepicker" name="end_date" id="end_date" >
        </div>

        <div class="form-group"  id="hours_input" style="display: none;">

            <div class="row" >
               <div class="col-md-4">
                   <label for="day_of_the_week">Day of the week</label>
                   <select class="form-control" name="day_of_the_week" id="day_of_the_week">
                       <option value="1">Monday</option>
                       <option value="2">Tues</option>
                   </select>
               </div>
               <div class="col-md-4">
                   <label for="from_time">From time</label>
                   <select class="form-control" name="from_time" id="from_time">
                       <option value="12">12:00</option>
                       <option value="20">20:00</option>
                   </select>
               </div>
               <div class="col-md-4">
                   <label for="to_time">To time</label>
                   <select class="form-control" name="to_time" id="to_time">
                       <option value="12">12:00</option>
                       <option value="20">20:00</option>
                   </select>
               </div>
            </div>

            <div class="row" >
                <div class="col-md-6">
                    <label for="num_of_weeks">Num of weeks</label>
                    <input type="number" class="form-control" name="num_of_weeks" id="num_of_weeks" placeholder="1">
                </div>

                <div class="col-md-6">
                    <label for="recurring">Recurring</label>
                    <select class="form-control" name="recurring" id="recurring">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
        </div>


        <input type="submit" name="sbt_step2" class="submit btn btn-success" value="Add product" />
    </form>
</div>

</body>
</html>
