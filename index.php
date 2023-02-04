<?php 
    $active_page = 'index';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel='stylesheet' href="css/all.min.css">
    <link rel='stylesheet' href="css/bootstrap.min.css">
    <link rel='stylesheet' href="css/navbar.css">
    <link rel='stylesheet' href="css/footer.css">
    <link rel='stylesheet' href="css/form.css">
    <link rel='stylesheet' href="css/booksList.css">
</head>
<body>
    <?php require "navbarUser.php" ?>

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
            <h1><i class="fa fa-book fa-fw"></i> Books List</h1>
            <div class="row">
                <?php 
                    require "classes/Table.php";
                    $booksTable = new Table('books');
                    $librariansTable = new Table('librarians');
                    $whereCondition = 1;
                    if (isset($_GET['search'])) {
                        $search = $_GET['search'];
                        $whereCondition = '`title` LIKE "%' . $search . '%"';
                    }
                    // $books = $booksTable->getAllThings();
                    $booksTable->select('books', $whereCondition);
                    $books = $booksTable->fetchAll();
                    
                    foreach($books as $book):
                        $librarian = $librariansTable->getThing("email='" . $book['librarian_email'] . "'")
                ?>
                <div class="col-12 col-md-6 col-lg-4 card">
                    <img src="uploads/<?= $book['image'] ?>" class="card-img-top" alt="<?= $book['title'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $book['title'] ?></h5>
                        <p class="card-text"><?=$book['description']?></p>
                        <p class="card-text">Book Owner: <?= $librarian['name'] ?></p>
                        <a href="bookDetailsUser.php?id=<?= $book['number'] ?>" class="btn"><i class="fa fa-list fa-fw"></i> Show Book Details</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated <?= $book["edition_date"] ?></small>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>

    

    <?php require "footerUser.php" ?>

    <script src="js/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>