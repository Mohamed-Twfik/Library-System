<?php
    $active_page = 'signin';
    require "classes/Table.php";
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST'):
        $librarians = new Table("librarians");
        $data['email'] = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $data['password'] = sha1(trim($_POST['password']));
        $librarian = $librarians->getThing("email='" . $data['email'] . "' and password='" . $data['password'] . "'");
        if($librarian):
            $_SESSION['email'] = $librarian['email'];
            $_SESSION['name'] = $librarian['name'];
            header('Location: main/');
            exit;
        else:
            $sign_in_error = '<p style="color:red">Invalid Email</p>';
        endif;
    endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>

    <link rel='stylesheet' href="css/bootstrap.min.css">
    <link rel='stylesheet' href="css/all.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>

    <?php require "navbarUser.php" ?>

    <div class="container">
        <form class="signinform signform" action="<?= $_SERVER['PHP_SELF']?>" method="POST">
            <h1 class="title text-center">Sign In</h1>
            <div class="form-item">
                <input type="email" id="email" name="email" class="input-field email" placeholder="Please Enter Email">
                <i class="fa fa-envelope fa-fw"></i>
                <span class="star">*</span>
                <div class="alert email alert-danger alert-dismissible fade show" role="alert">Please Enter Email</div>
            </div>
            <div class="form-item">
                <i class="fa fa-eye-slash fa-fw see show-password show-password-active"></i>
                <i class="fa fa-eye notsee fa-fw show-password"></i>
                <input type="password" id="password" name="password" class="input-field password signin-password" placeholder="Please Enter Password">
                <i class="fa fa-key fa-fw"></i>
                <span class="star">*</span>
                <div class="alert password alert-danger alert-dismissible fade show" role="alert">Please Enter Password</div>
            </div>
            <div class="form-item">
                <div id="submit_div">
                    <input class="btn submit" id="submit" type="submit" value="Login" disabled>
                </div>
                <span class="register">I Don't Have Account And Want To <a class="signup-link" href="signup.php">Sign Up</a></span>
                <span><?= isset($sign_in_error)?$sign_in_error:'' ?></span>
            </div>
        </form>
    </div>

    <?php require "footerUser.php" ?>

    <script src="js/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="js/validateSignForm.js"></script>
</body>
</html>