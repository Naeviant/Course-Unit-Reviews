<?php if (count(get_included_files()) == 1) die("Direct access to this file is not permitted."); ?>
<?php if (session_status() == 1) session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="static/css/style.css">
    <title>UoM CS Course Unit Reviews</title>
</head>
<body>
<nav class="navbar navbar-expand navbar-dark bg-primary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="terms">Terms of Use</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search_reviews">Search Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="submit_review">Submit Review</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php
                    if (!empty($_SESSION["username"])) {
                        echo('
                            <li class="nav-item">
                                <a class="nav-link" href="my_reviews">My Reviews</a>
                            </li>
                        ');
                    }
                ?>
                <li class="nav-item">
                    <?php 
                        if (empty($_SESSION["username"])) {
                            echo('<a class="nav-link" href="auth/login">Login via SSO</a>');
                        }
                        else {
                            echo('<a class="nav-link" href="auth/logout">Logout</a>');
                        }
                    ?>
                    
                </li>
            </ul>
        </div>
    </div>
</nav>