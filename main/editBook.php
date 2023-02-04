<?php
    $active_page = 'home';

    session_start();
    if(!isset($_SESSION['email'])) {
        header('Location: ../signin.php');
        exit;
    }

    require '../classes/Table.php';
    $id = $_GET['id'];
    $booksTable = new Table("books");
    $book = $booksTable->getThing("number=" . $id);
    if ($_SERVER['REQUEST_METHOD'] == 'POST'):
        $data['auther_name'] = trim($_POST['auther_name']);
        $data['title'] = trim($_POST['title']);
        $data['description'] = trim($_POST['description']);
        $data['submission_date'] = $book['submission_date'];
        $data["edition_date"] = date("Y-m-d H:i:s");
        $data['librarian_email'] = $book['librarian_email'];
        
        $booksTable->updateThing($data, $id);
        header("Location: index.php");
        exit;
    endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel='stylesheet' href="../css/all.min.css">
    <link rel='stylesheet' href="../css/bootstrap.min.css">
    <link rel='stylesheet' href="../css/navbar.css">
    <link rel='stylesheet' href="../css/footer.css">
    <link rel='stylesheet' href="../css/form.css">
</head>
<body>
    <?php require "navbar.php" ?>

    <div class="container">
        <form class="addBookForm" method="POST">

            <h1 class="title text-center">Edit Book</h1>
            
            <div class="form-item">
                <input id="authername" class="input-field auther-name" type="text" name="auther_name" placeholder="Please Enter Auther Name" value="<?= $book['auther_name'] ?>">
                <i class="fa fa-user fa-fw"></i>
                <span class="star" style="display: none;">*</span>
                <div class="alert authername alert-danger alert-dismissible fade show" role="alert">Please Enter Auther Name</div>
            </div>

            <div class="form-item">
                <input id="title" class="input-field title" type="text" name="title" placeholder="Please Enter Book Title" value="<?= $book['title'] ?>">
                <i class="fa fa-bookmark fa-fw"></i>
                <span class="star" style="display: none;">*</span>
                <div class="alert title alert-danger alert-dismissible fade show" role="alert">Please Enter Book Title</div>
            </div>

            <div class="form-item">
                <textarea style="height: 250px;" id="description" class="input-field description" name="description" placeholder="Please Enter Book Description"><?=$book['description']?></textarea>
                <i class="fa fa-audio-description fa-fw"></i>
                <span class="star" style="display: none;">*</span>
                <div class="alert image alert-danger alert-dismissible fade show description" role="alert">Please Enter Book Description From 30 to 200 Characters</div>
            </div>

            <div id="submit_div" class="submit-form-item form-item">
                <input id="submit" class="btn submit" type="submit" value="Save">
            </div>
        </form>
    </div>

    <?php require "../footerUser.php" ?>

    <script src="../js/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="../js/validateEditBookForm.js"></script>
</body>
</html>