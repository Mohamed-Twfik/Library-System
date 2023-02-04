<?php 
    $active_page = 'addBook';
    session_start();
    if(!isset($_SESSION['email'])) {
        header('Location: ../signin.php');
        exit;
    }
    require "../classes/Table.php";
    $image_error = "";
    if($_SERVER['REQUEST_METHOD'] == "POST"):

        if(isset($_FILES['image'])):
            
            $books = new Table('books');
            $data['auther_name'] = trim($_POST['auther_name']);
            $data['title'] = trim($_POST['title']);
            $data['description'] = trim($_POST['description']);
            $data["submission_date"] = date("Y-m-d H:i:s");
            $data["edition_date"] = date("Y-m-d H:i:s");
            $data["librarian_email"] = $_SESSION['email'];
    
            $uploads_dir = '../uploads/';
            $image='';
            if($_FILES['image']['error'] == UPLOAD_ERR_OK):
                $tmp_name = $_FILES['image']['tmp_name'];
                $image = basename($_FILES['image']['name']);
                move_uploaded_file($tmp_name, $uploads_dir.$image);
            else:
                echo "File Can't Be Uploaded";
                exit;
            endif;
    
            $data['image'] = $image;
            
            $books->insert('books', $data);
            header('Location: index.php');
            exit;

        else:
            $image_error = 'display:block';

        endif;
    endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel='stylesheet' href="../css/all.min.css">
    <link rel='stylesheet' href="../css/bootstrap.min.css">
    <link rel='stylesheet' href="../css/navbar.css">
    <link rel='stylesheet' href="../css/footer.css">
    <link rel='stylesheet' href="../css/form.css">
</head>
<body>
    <?php require "navbar.php" ?>

    <div class="container">
        <form enctype="multipart/form-data" class="addBookForm" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

            <h1 class="title text-center">Add New Book</h1>
            
            <div class="form-item">
                <input id="authername" class="input-field auther-name" type="text" name="auther_name" placeholder="Please Enter Auther Name">
                <i class="fa fa-user fa-fw"></i>
                <span class="star">*</span>
                <div class="alert authername alert-danger alert-dismissible fade show" role="alert">Please Enter Auther Name</div>
            </div>

            <div class="form-item">
                <input id="title" class="input-field title" type="text" name="title" placeholder="Please Enter Book Title">
                <i class="fa fa-bookmark fa-fw"></i>
                <span class="star">*</span>
                <div class="alert title alert-danger alert-dismissible fade show" role="alert">Please Enter Book Title</div>
            </div>

            <div class="form-item">
                <input id="image" class="input-field image" type="file" name="image" placeholder="Please Enter Book Image">
                <i class="fa fa-image fa-fw"></i>
                <span class="star">*</span>
                <div style='<?=$image_error?>' class="alert image alert-danger alert-dismissible fade show" role="alert">Please Enter Book Image</div>
            </div>

            <div class="form-item">
                <textarea style="height: 250px;" id="description" class="input-field description" name="description" placeholder="Please Enter Book Description"></textarea>
                <i class="fa fa-audio-description fa-fw"></i>
                <span class="star">*</span>
                <div class="alert image alert-danger alert-dismissible fade show description" role="alert">Please Enter Book Description From 30 to 200 Characters</div>
            </div>

            <div id="submit_div" class="submit-form-item form-item">
                <input id="submit" class="btn submit" type="submit" value="Add Book" disabled>
            </div>
        </form>
    </div>

    <?php require "../footerUser.php" ?>

    <script src="../js/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="../js/validateAddBookForm.js"></script>
</body>
</html>