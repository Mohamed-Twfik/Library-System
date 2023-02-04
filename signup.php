<?php
    $active_page = 'signup';
    require "classes/Table.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'):
        session_start();
        $librarians = new Table("librarians");

        $data['email'] = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $data['name'] = trim($_POST['name']);
        $data['password'] = sha1($_POST['password']);

        $librarians->addThing($data);
        $_SESSION['email'] = $data['email'];
        $_SESSION['name'] = $data['name'];
        header('Location: main/');
        exit;
    endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel='stylesheet' href="css/bootstrap.min.css">
    <link rel='stylesheet' href="css/all.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>

    <?php require "navbarUser.php" ?>

    <div class="container">
        <form class="signupform signform" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <h1 class="title text-center">Sign Up</h1>
            <div class="form-item">
                <input id="name" class="input-field name" type="text" name="name" placeholder="Please Enter Name">
                <i class="fa fa-user fa-fw"></i>
                <span class="star">*</span>
                <div class="alert name alert-danger alert-dismissible fade show" role="alert">Please Enter Full Name</div>
            </div>

            <div class="form-item">
                <input id="email" class="input-field email" type="email" name="email" placeholder="Please Enter Email">
                <i class="fa fa-envelope fa-fw"></i>
                <span class="star">*</span>
                <div class="alert email alert-danger alert-dismissible fade show" role="alert">Please Enter Email</div>
            </div>

            <div class="form-item">
                <i class="fa fa-eye-slash fa-fw see show-password show-password-active"></i>
                <i class="fa fa-eye notsee fa-fw show-password"></i>
                <input id="password" class="input-field password" type="password" name="password" placeholder="Please Enter Password">
                <i class="fa fa-key fa-fw"></i>
                <span class="star">*</span>
                <div class="alert password alert-danger alert-dismissible fade show" role="alert">Please Enter Password</div>
            </div>

            <div class="form-item">
                <i class="fa fa-eye-slash fa-fw seec show-password show-password-active"></i>
                <i class="fa fa-eye notseec fa-fw show-password"></i>
                <input id="confirmpassword" class="input-field confirmpassword" type="password" name="confirmpassword" placeholder="Please Enter Password Again">
                <i class="fa fa-key fa-fw"></i>
                <span class="star">*</span>
                <div class="alert confirmpassword alert-danger alert-dismissible fade show" role="alert">Please Enter Same Password</div>
            </div>

            <div class="submit-form-item form-item">
                <div id="submit_div">
                    <input id="submit" class="btn submit" type="submit" value="Sign Up" disabled>
                </div>
            </div>

        </form>
    </div>

    <?php require "footerUser.php" ?>

    <script src="js/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="js/validateSignForm.js"></script>
</body>
</html>