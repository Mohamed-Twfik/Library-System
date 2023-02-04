<?php 
    $active_page = 'home';
    session_start();
    if(!isset($_SESSION['email'])) {
        header('Location: ../signin.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <link rel='stylesheet' href="../css/all.min.css">
    <link rel='stylesheet' href="../css/bootstrap.min.css">
    <link rel='stylesheet' href="../css/navbar.css">
    <link rel='stylesheet' href="../css/footer.css">
    <link rel='stylesheet' href="../css/bookDetails.css">
    <style>
        div.alert{
            width: 250px;
            margin-top: 5px;
            display: none;
            position: absolute;
            left: 90px;
            bottom: 35px;
        }

        div.alert span{
            position: absolute;
            top: -4px;
            right: 1px;
        }

        div.alert strong a{
            color: #6e0000!important;
            transition: all .5s ease-in-out;
        }

        div.alert strong a:hover{
            color: #d90000!important;
        }

        .delete-click{
            cursor: pointer;
            margin: 0 10px;
            color: #CAF0F8;
        }
    </style>
</head>
<body>
    <?php require "navbar.php" ?>
    <?php
        if(isset($_GET['id'])):
            require '../classes/Table.php';
            $bookTable = new Table('books');
            $librarianTable = new Table('librarians');
            $bookNumber = $_GET['id'];
            $book = $bookTable->getThing('`number`=' . $bookNumber);
            $librarian = $librarianTable->getThing('`email`="' . $book['librarian_email'] . '"');
    ?>
    <div class="container">
        <div class="card">
            <div class="row no-gutters">
                <div class="image col-md-4">
                    <img src="../uploads/<?= $book['image'] ?>" class="card-img-top" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body" style="position:relative">
                        <h2><?= $book['title'] ?> Book</h2>
                        <p class="card-text">Book Number: <?= $book['number'] ?></p>
                        <p class="card-text">Book Title: <?= $book['title'] ?></p>
                        <p class="card-text">Book Owner: <?= $librarian['name'] ?></p>
                        <p class="card-text">Auther Name: <?= $book['auther_name'] ?></p>
                        <p class="card-text">Book Description: <?= $book['description'] ?></p>
                        <p class="card-text">Submission Date: <?= $book['submission_date'] ?></p>
                        <p class="card-text"><small class="text-muted">Last updated <?= $book['edition_date'] ?></small></p>
                        <a href="editBook.php?id=<?= $book['number'] ?>" class="btn"><i class="fa fa-pen-to-square fa-fw"></i> Edit</a>
                        <a class="btn delete-click"><i class="fa fa-trash fa-fw"></i> Delete</a>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <p>Sure For Delete ?!</p>
                            <strong><a href="deleteBook.php?id=<?= $book['number'] ?>">Yes</a></strong>
                        </div>
                        <a href="index.php" class="btn"><i class="fa fa-backward fa-fw"></i> Back To Books List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php
        endif;
    ?>
    <?php require "../footerUser.php" ?>

    <script src="../js/jquery-3.6.0.js"></script>
    <script>
        $(function(){
            'use strict'
            $('a.delete-click').on('click', function(){
                $(this).next().slideToggle(500)
                console.log($(this).next())
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>