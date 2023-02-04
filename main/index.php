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
    <title>Books List</title>
    <link rel='stylesheet' href="../css/all.min.css">
    <link rel='stylesheet' href="../css/bootstrap.min.css">
    <link rel='stylesheet' href="../css/navbar.css">
    <link rel='stylesheet' href="../css/footer.css">
    <link rel='stylesheet' href="../css/booksList.css">
    <link rel='stylesheet' href="../css/form.css">
    <style>
        div.alert{
            width: 250px;
            margin-top: 5px;
            display: none;
            position: absolute;
            left: 130px;
            
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

    <form method='GET'>
        <h1><i class="fa fa-search fa-fw"></i> Search By Book Title</h1>
        <div class="form-item">
            <input type="text" name="search" class="input-field" id="search" placeholder="Enter Book Title To Search">
            <i class="fa fa-magnifying-glass fa-fw"></i>
        </div>
        <div id="submit_div" class="form-item">
            <input type="submit" class="btn submit" value="Search" id="submitsearch">
        </div>
    </form>

    <div class="books">
        <div class="container">
            <h1><i class="fa fa-book fa-fw"></i> Your Books</h1>
            <div class="row">
                <?php 
                    require "../classes/Table.php";
                    $bookTable = new Table('books');
                    $whereCondition = "`librarian_email`='" . $_SESSION['email'] . "'";
                    if (isset($_GET['search'])) {
                        $search = $_GET['search'];
                        $whereCondition .= ' AND `title` LIKE "%' . $search . '%"';
                    }
                    $bookTable->select('books', $whereCondition);
                    $books = $bookTable->fetchAll();
                    foreach($books as $book):
                ?>
                <div class="col-12 col-md-6 col-lg-4 card">
                    <img src="../uploads/<?= $book['image'] ?>" class="card-img-top" alt="<?=$book['image']?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $book['title'] ?></h5>
                        <p class="card-text"><?=$book['description']?></p>
                        <p class="card-text">Auther Name: <?= $book["auther_name"] ?></p>
                        <a href="editBook.php?id=<?= $book['number'] ?>" class="btn"><i class="fa fa-pen-to-square fa-fw"></i> Edit</a>
                        <a class="btn delete-click"><i class="fa fa-trash fa-fw"></i> Delete</a>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <p>Sure For Delete ?!</p>
                            <strong><a href="deleteBook.php?id=<?= $book['number'] ?>">Yes</a></strong>
                        </div>
                    </div>
                    <a href="bookDetails.php?id=<?= $book['number'] ?>" class="btn details"><i class="fa fa-list fa-fw"></i> Show Book Details</a>
                    <div class="card-footer">
                        <small class="text-muted">Last updated <?= $book['edition_date'] ?></small>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

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