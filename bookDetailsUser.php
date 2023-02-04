<?php 
    $active_page = 'index';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <link rel='stylesheet' href="css/all.min.css">
    <link rel='stylesheet' href="css/bootstrap.min.css">
    <link rel='stylesheet' href="css/navbar.css">
    <link rel='stylesheet' href="css/footer.css">
    <link rel='stylesheet' href="css/bookDetails.css">
</head>
<body>
    <?php require "navbarUser.php" ?>

    <?php
        if(isset($_GET['id'])):
            require 'classes/Table.php';
            $bookTable = new Table('books');
            $librarianTable = new Table('librarians');
            $bookNumber = $_GET['id'];
            $book = $bookTable->getThing('`number`=' . $bookNumber);
            $librarian = $librarianTable->getThing('`email`="' . $book['librarian_email'] . '"');
    ?>
    <div class="container">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="uploads/<?= $book['image'] ?>" class="card-img-top" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2><?= $book['title'] ?> Book</h2>
                        <p class="card-text">Book Number: <?= $book['number'] ?></p>
                        <p class="card-text">Book Title: <?= $book['title'] ?></p>
                        <p class="card-text">Book Owner: <?= $librarian['name'] ?></p>
                        <p class="card-text">Auther Name: <?= $book['auther_name'] ?></p>
                        <p class="card-text">Book Description: <?= $book['description'] ?></p>
                        <p class="card-text">Submission Date: <?= $book['submission_date'] ?></p>
                        <p class="card-text"><small class="text-muted">Last updated <?= $book['edition_date'] ?></small></p>
                        <a href="index.php" class="btn"><i class="fa fa-backward fa-fw"></i> Back To Books List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php

        endif;
    ?>

    <?php require "footerUser.php" ?>

    <script src="js/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>