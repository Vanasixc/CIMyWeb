<!doctype html>
<html lang="en">

<head>
    <?php 
        if($title == "Login"){
            echo "<title>Login</title>";
        }else if($title == "Register"){
            echo "<title>Register</title>";
        }
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= base_url('templateLoginForm/css/style.css') ?>">

</head>